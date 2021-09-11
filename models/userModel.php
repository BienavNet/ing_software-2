<?php
    class UserModel extends Model{

        private $id;
        private $fname;
        private $lname;
        private $username;
        private $email;
        private $phone;
        private $password;
        private $rol;

        private static $DATA_SCHEME = [
            ':id'=> '',
            ':first_name'=> '',
            ':last_name'=> '',
            ':username'=> '',
            ':email'=> '',
            ':phone'=> '',
            ':pass'=> '',
            ':rol'=> ''
        ];

        function __construct($id="")
        {
            parent::__construct();

            if(!empty($id)){
                $user = $this->get($id);
                if($user!=null){
                    $this->id = $id;
                    $this->fname = $user['first_name'];
                    $this->lname = $user['last_name'];
                    $this->username = $user['username'];
                    $this->email = $user['email'];
                    $this->phone = $user['phone'];
                    $this->password = $user['pass'];
                    $this->rol = $user['rol'];
                }
            }
        }

        public function fromUserToArray(){
            $data = [
                ':id'=> $this->getId(),
                ':first_name'=> $this->getFirstName(),
                ':last_name'=> $this->getLastName(),
                ':username'=> $this->getUsername(),
                ':email'=> $this->getEmail(),
                ':phone'=> $this->getPhone(),
                ':pass'=> $this->getPassword(),
                ':rol'=> $this->getRol()
            ];

            return $data;
        }



        public function get($id)
        {
            try {
                $strquery = 'SELECT * FROM usuario WHERE id=:id';

                $statement = $this->database->prepare($strquery);

                $statement->execute([':id'=>$id]);

                $user = $statement->fetch(PDO::FETCH_ASSOC);

                return (!empty($user))?$user:null;
                
            } catch (PDOException $e) {
                error_log("userModel->get: No se pudo obtener el usuario para: $id " . $e->getMessage());
                return null;
            }
        
        }

        public function getAll()
        {

            try {

                $strquery = "SELECT * FROM usuario";

                $statement = $this->database->prepare($strquery);

                $statement->execute();

                $users = $statement->fetchAll(PDO::FETCH_ASSOC);

                error_log("UserModel->getAll : Se ha realizado la consulta a la base de datos");

                return $users;
                
            } catch (PDOException $ex) {

                error_log("UserModel->getAll : No se pudieron obtener los datos ". $ex->getMessage());
                return null;
                
            }

        }

        public function delete($id)
        {
            
        }

        public function update($id)
        {

            try {
                $data = $this->setScheme($id);

                $strquery = "UPDATE usuario SET first_name=:first_name, last_name=:last_name, username=:username, email=:email, phone=:phone, pass=:pass, rol=:rol WHERE id=:id";
                
                $statement = $this->database->prepare($strquery);

                $statement->bindParam(':id', $data[':id']);
                $statement->bindParam(':first_name', $data[':first_name']);
                $statement->bindParam(':last_name', $data[':last_name']);
                $statement->bindParam(':username', $data[':username']);
                $statement->bindParam(':email', $data[':email']);
                $statement->bindParam(':phone', $data[':phone']);
                $statement->bindParam(':pass', $data[':pass']);
                $statement->bindParam(':rol', $data[':rol']);


                return $statement->execute();

            } catch (PDOException $e) {
                error_log("UserModel->update : No se pudo actualizar el usuario ". $e->getMessage());
                return false;
            }
            
        }

        /*public function update()
        {
            try {
                $strquery = "UPDATE usuario SET username=:username, pass=:pass, rol=:rol, _name=:_name WHERE id=:id";

                $statement = $this->database->prepare($strquery);

                $statement->bindParam(':id', $this->getId());
                $statement->bindParam(':username', $this->getUsername());
                $statement->bindParam(':pass', $this->getPassword());
                $statement->bindParam(':rol', $this->getrol());
                $statement->bindParam(':_name', $this->getName());
                
                return $statement->execute();

            } catch (PDOException $th) {
                error_log("UserModel->update : No se pudo actualizar el usuario ". $th->getMessage());
                return false;
            }

            
        }*/

        public function save($user)
        {

            try {

                $last_id = $this->getLastId() + 1;
                array_unshift($user, $last_id);

                $data = $this->setScheme($user);

                $strquery = 'INSERT INTO `usuario`(`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `pass`, `rol`) VALUES (:id, :first_name, :last_name, :username, :email, :phone, :pass, :rol)';

                $statement = $this->database->prepare($strquery);


                $statement->bindParam(':id', $data[':id']);
                $statement->bindParam(':first_name', $data[':first_name']);
                $statement->bindParam(':last_name', $data[':last_name']);
                $statement->bindParam(':username', $data[':username']);
                $statement->bindParam(':email', $data[':email']);
                $statement->bindParam(':phone', $data[':phone']);
                $statement->bindParam(':pass', $data[':pass']);
                $statement->bindParam(':rol', $data[':rol']);


                
                error_log("UserModel->save : Nuevo usuario almacenado con id $last_id");
                if ($statement->execute())return true;
                else return false;

            } catch (PDOException $ex) {
                error_log("UserModel->save : No se pudo guardar el usuario ". $ex->getMessage());
                return false;
            }

            
        }

        public function preparedQuery($query, $params){

            try {

                $statement = $this->database->prepare($query);
                $statement->execute($params);

                $result = $statement->fetch(PDO::FETCH_ASSOC);

                return $result;
                

            } catch (PDOException $ex) {
                error_log("UserModel->preparedQuery : No se pudo realizar la consulta");
                return null;
            }

        }

        public function getLastId(){

            $users = $this->getAll();
            $user = '';


            if(count($users) == 1)
                $user = $users[0];
            else
                $user = array_pop($users);

            error_log("UserModel->getLastId : Obteniendo el ultimo ID ");

            return $user['id'];
            
        }

        private function setScheme($user){
            $scheme = UserModel::$DATA_SCHEME;

            foreach ($scheme as $key => $value) {
                $scheme[$key] = array_shift($user);
            }

            error_log("UserModel->setScheme : Esquema de datos establecido");

            return $scheme;

        }

        public function getRol(){
            return $this->rol;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getName(){
            return $this->_name;
        }

        public function getId(){
            return $this->id;
        }

        public function getFirstName(){
            return $this->fname;
        }

        public function getLastName(){
            return $this->lname;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setrol($rol){
            $this->rol = $rol;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function setPassword($pass){
            $this->password = $pass;
        }

        public function setName($name){
            $this->_name = $name;
        }





    }



?>