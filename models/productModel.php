<?php

class ProductModel extends Model{

    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $cantidad;

    private static $DATA_SCHEME = [
        ':code'=> '',
        ':name'=> '',
        ':description'=> '',
        ':price'=> '',
        ':amount'=> ''
    ];



//Getters
    public function getId(){return $this->id;}
    public function getNombre(){return $this->nombre;}
    public function getPrecio(){return $this->precio;}
    public function getDescripcion(){return $this->descripcion;}
    public function getcantidad(){return $this->cantidad;}

//Setters
    public function setNombre($param){$this->nombre = $param;}
    public function setPrecio($param){$this->precio = $param;}
    public function setDescripcion($param){$this->descripcion = $param;}
    public function setcantidad($param){$this->cantidad = $param;}




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
        $scheme = ProductModel::$DATA_SCHEME;

        foreach ($scheme as $key => $value) {
            $scheme[$key] = array_shift($user);
        }

        error_log("ProductModel->setScheme : Esquema de datos establecido");

        return $scheme;

    }


    

    public function get($id)
    {

        try {
            $strquery = 'SELECT * FROM producto WHERE code=:id';

            $statement = $this->database->prepare($strquery);

            $statement->execute([':id'=>$id]);

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return (!empty($user))?$user:null;
            
        } catch (PDOException $e) {
            error_log("productModel->get: No se pudo obtener el producto para: $id " . $e->getMessage());
            return null;
        }

    }

    public function getAll()
    {

        try {

            error_log("ProductModel : getAll-> Obteniendo los datos desde la base de datos");

            $strquery = "SELECT * FROM producto ORDER BY price";

            $statement = $this->database->query($strquery);

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            error_log("ProductModel->getAll : Se ha realizado la consulta a la base de datos");

            return $users;
            
        } catch (PDOException $ex) {

            error_log("ProductModel->getAll : No se pudieron obtener los datos ". $ex->getMessage());
            return null;
            
        }
        
    }

    public function getByRange($page, $items_number)
    {
        try{

            if($page==1)
            {
                $final = 0;
            }else
            {
                $final = ($page-1)*$items_number;
            }
            $start = $items_number;

            $strquery = "SELECT code, name, description, price FROM producto LIMIT $start OFFSET $final";

            $statement = $this->database->query($strquery);

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($users) || $users!=null)
            {
                error_log("ProductModel : getByRange ->Se obtuvieron con éxito los productos");
                return $users;
            }else
            {
                error_log("ProductModel : getByRange ->No se obtuvieron los productos");
                return null;
            }


        }catch(Exception $e)
        {

        }



    }



    public function delete($id)
    {

        try{

            error_log('ProductModel : delete->Borrando producto con el id '.$id);

            $strquery = 'DELETE FROM producto WHERE code=:id';

            $statement = $this->database->prepare($strquery);

            if($statement->execute([':id'=>$id]))return true;
            else return false;


        }catch(PDOException $e){
            error_log('ProductModel : delete->Error al borrar en la base de datos '.$e->getMessage());
        }
        
    }

    public function save($product)
    {

        try {


            $data = $this->setScheme($product);

            $strquery = 'INSERT INTO producto(code, name, description, price, amount) VALUES (:code, :name, :description, :price, :amount)';

            $statement = $this->database->prepare($strquery);

            $statement->bindParam(':code', $data[':code']);
            $statement->bindParam(':name', $data[':name']);
            $statement->bindParam(':description', $data[':description']);
            $statement->bindParam(':price', $data[':price']);
            $statement->bindParam(':amount', $data[':amount']);

            
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