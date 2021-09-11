<?php

    class Modificar_Producto extends Controller{


        private static $VIEW_NAME = 'sistema/modificar_producto';
        private static $MODEL_NAME = 'product';

        function __construct()
        {
            parent::__construct(Modificar_Producto::$VIEW_NAME, Modificar_Producto::$MODEL_NAME);

        }



        public function modifyProduct()
        {

            $this->loadModel();
            $data = [];

            error_log(json_encode($_POST));
            error_log(json_encode($_FILES));

            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $description = $_POST['product_description'];
            $price = $_POST['product_price'];
            $amount = $_POST['product_amount'];

            $this->imgProccess();
            


            if(empty($id) || empty($name) || empty($description) || empty($price) || empty($amount)){

                error_log('Modificar_Producto-> modifyProduct : Algunos parámetros están vacíos');
                $this->redirect('listar_producto/getProducts', ['error'=>'empty_params']);
                
                
            }else{
                array_push($data, $id, $name, $description, $price, $amount);

                if($this->model->update($data)){
                    error_log('Listar_Producto-> saveProduct : Se ha actualizado el producto correctamente');
                    $this->redirect('listar_producto/getProducts', ['success'=>'updated']);
                }else{
                    error_log('Modificar_Producto-> modifyProduct : No se ha podido modificar el producto');
                    $this->redirect('listar_producto/getProducts', ['error'=>'no_updated']);
                }


            }


        }

        private function imgProccess()
        {


            if(!empty($_FILES['foto']))
            {
                $directory = $_SERVER['DOCUMENT_ROOT'].'/plugins/img/uploads/';
                $extensions = ['jpg', 'jpeg', 'png'];
                $type = explode('/' ,$_FILES['foto']['type']);

                if(count($type)==2 && !empty($type) && $type[0] == 'image')
                {
                    $img_extension = $type[1];
                    $aux = $directory . basename($_POST['product_id']);
                    $img = $directory . basename($_POST['product_id'].'.'.$img_extension);


                    for ($i=0; $i < count($extensions); $i++) { 

                        if(file_exists($aux.'.'.$extensions[$i]))
                        {
                            unlink($aux.'.'.$extensions[$i]);
                            if($_FILES['foto']['size']>0 && $_FILES['foto']['size']<500000)
                            {
                                if(move_uploaded_file($_FILES['foto']['tmp_name'], $img))return true;
                                else{
                                    error_log("--------------No se pudo mover la imagen de cache a la carpeta------------------");
                                    return false;
                                }
                            }else{
                                error_log("--------------Archivo más grande de lo permitido------------------");
                                return false;
                            }
                        }

                    }
                    error_log("--------------Error en la extension de la imagen------------------");
                    return false;
                }else{
                    error_log("--------------No es una imagen------------------");
                    return false;
                }

            }else{
                error_log("--------------Variable FILES vacía------------------");
                return false;
            }
            

        }



    }


?>