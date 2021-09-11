<?php
    class Registro_Producto extends Controller{

        private static $VIEW_NAME = 'sistema/registro_producto';
        private static $MODEL_NAME = 'product';

        function __construct()
        {
            parent::__construct(Registro_Producto::$VIEW_NAME, Registro_Producto::$MODEL_NAME);

        }

        function saveProduct(){
            $this->loadModel();
            
            $data = [];

            $name = $_POST['producto'];
            $description = $_POST['comentarios'];
            $price = $_POST['precio'];
            $amount = $_POST['cantidad'];
            $code = $_POST['codigo'];

            if($this->imgProccess())
            {
                if(!empty($name) && !empty($description) && !empty($price) && !empty($amount) && !empty($code) ){
                    array_push($data, $code, $name, $description, $price, $amount);
                    if($this->model->save($data)){
    
                        error_log('Registro_Producto-> saveProduct : Se ha guardado el producto correctamente');
                        $this->redirect('registro_producto', ['success'=>'UUYA9803']);
    
                    }else{
                        error_log('Registro_Producto-> saveProduct : No se ha guardado el producto correctamente');
                        $this->redirect('registro_producto', ['error'=>'OPWN912']);
                    }
                }

            }else 
            {
                error_log('Registro_Producto-> saveProduct : No se ha guardado el producto correctamente');
                $this->redirect('registro_producto', ['error'=>'img_failed']);
            }

            
        }


        private function imgProccess()
        {
            
            $directory = $_SERVER['DOCUMENT_ROOT'].'/plugins/img/uploads/';
            $extensions = ['jpg', 'jpeg', 'png'];
            $type = explode('/' ,$_FILES['foto']['type']);

            if(count($type)==2 && !empty($type) && $type[0] == 'image')
            {
                $img_extension = strtolower($type[1]);
                $img = $directory . basename($_POST['codigo'].'.'.$img_extension);
                
                
                for ($i=0; $i < count($extensions); $i++) { 
                    if($img_extension == $extensions[$i])
                    {
                        if(!file_exists($img))
                        {
                            if($_FILES['foto']['size']>0 && $_FILES['foto']['size']<50000000)
                            {
                                if(move_uploaded_file($_FILES['foto']['tmp_name'], $img))return true;
                                else return false;
                            }else return false;
                        }else return false;
                    }
                }
                return false;
            }else return false;

        }


        

    }


?>