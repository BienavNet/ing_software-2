<?php

class ClienteModel extends Model{

    private $id;
    private $nombres;
    private $apellidos;
    private $usuario;
    private $email;
    private $telefono;

    private static $DATA_SCHEME = [
        ':code'=> '',
        ':nombres'=> '',
        ':apellidos'=> '',
        ':usuario'=> '',
        ':email'=> '',
        ':telefono'=> ''
    ];



    //Getters
    public function getId(){return $this->id;}
    public function getNombres(){return $this->nombres;}
    public function getApellidos(){return $this->apellidos;}
    public function getUsuario(){return $this->usuario;}
    public function getEmail(){return $this->email;}
    public function getTelefono(){return $this->telefono;}

    //Setters
    public function setNombres($param){$this->nombres = $param;}
    public function setApellidos($param){$this->apellidos = $param;}
    public function setUsuario($param){$this->usuario = $param;}
    public function setEmail($param){$this->email = $param;}
    public function setTelefono($param){$this->telefono = $param;}




    function __construct($id="")
    {
        parent::__construct();

        /*if(!empty($id)){
            $result = $this->get($id);
            if(isset($result) && !empty($result)){
                $this->setNombre($result['nombre']);
                $this->setPrecio($result['precio']);
                $this->setDescripcion($result['descripcion']);
                $this->setcantidad($result['cantidad']);
            }
            
        }*/


    }



    private function setScheme($user){
        $scheme = ClienteModel::$DATA_SCHEME;

        foreach ($scheme as $key => $value) {
            $scheme[$key] = array_shift($user);
        }

        error_log("ClientetModel->setScheme : Esquema de datos establecido");

        return $scheme;

    }


    

    public function get($id)
    {

        try {
            $strquery = 'SELECT * FROM usuario WHERE code=:id';

            $statement = $this->database->prepare($strquery);

            $statement->execute([':id'=>$id]);

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return (!empty($user))?$user:null;
            
        } catch (PDOException $e) {
            error_log("ClienteModel->get: No se pudo obtener el cliente para: $id " . $e->getMessage());
            return null;
        }

    }

    public function getAll()
    {

        try {

            error_log("clientetModel : getAll-> Obteniendo los datos desde la base de datos");

            $strquery = "SELECT * FROM usuario WHERE rol= 'user'";

            $statement = $this->database->query($strquery);

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            error_log("ClienteModel->getAll : Se ha realizado la consulta a la base de datos");

            return $users;
            
        } catch (PDOException $ex) {

            error_log("ClienteModel->getAll : No se pudieron obtener los datos ". $ex->getMessage());
            return null;
            
        }
        
    }

    public function delete($id)
    {

        try{

            error_log('ClientetModel : delete->Borrando cliente con el id '.$id);

            $strquery = 'DELETE FROM usuario WHERE code=:id';

            $statement = $this->database->prepare($strquery);

            if($statement->execute([':id'=>$id]))return true;
            else return false;


        }catch(PDOException $e){
            error_log('ClientetModel : delete->Error al borrar en la base de datos '.$e->getMessage());
        }
        
    }
    public function save($cliente)
    {

        try {


            $data = $this->setScheme($cliente);

            $strquery = 'INSERT INTO usuario(code, nombres, apellidos, usuario, email, telefono) VALUES (:code, :nombres, :apellidos, :usuario, :email, :telefono)';

            $statement = $this->database->prepare($strquery);

            $statement->bindParam(':code', $data[':code']);
            $statement->bindParam(':nombres', $data[':nombres']);
            $statement->bindParam(':apellidos', $data[':apellidos']);
            $statement->bindParam(':usuario', $data[':usuario']);
            $statement->bindParam(':email', $data[':email']);
            $statement->bindParam(':telefono', $data[':telefono']);

            
            error_log("ProductModel->save : Se ha guardado el producto correctamente");
            if ($statement->execute()) return true;
            else return false;

        } catch (PDOException $ex) {
            error_log("ProductModel->save : No se pudo guardar el producto ". $ex->getMessage());
            return false;
        }
        
    }
    public function update($data)
    {

        try{

            $data = $this->setScheme($data);

            $strquery = 'UPDATE producto SET name=:name, description=:description, price=:price, amount=:amount WHERE code=:code';
            $statement = $this->database->prepare($strquery);


            $statement->bindParam(':code', $data[':code']);
            $statement->bindParam(':name', $data[':name']);
            $statement->bindParam(':description', $data[':description']);
            $statement->bindParam(':price', $data[':price']);
            $statement->bindParam(':amount', $data[':amount']);

            if($statement->execute())return true;
            else return false;

        }catch( PDOException $e){

        }
        
    }

}
?>