<?php
    class Eliminar_Producto extends Controller{

        private static $VIEW_NAME = 'sistema/eliminar_producto';
        private static $MODEL_NAME = 'product';

        function __construct()
        {
            parent::__construct(Eliminar_Producto::$VIEW_NAME, Eliminar_Producto::$MODEL_NAME);

        }

        function deleteProduct(){
           $this->loadModel();
           
           $id = $_GET['product_id'];

           if(isset($id) && !empty($id)){
                $this->deleteImg($id);
               if($this->model->delete($id)){
                   error_log('Eliminar_Producto : deleteProduc-> Se ha eliminado el producto correctamente de la BD');
                   $this->redirect('listar_producto/getProducts', ['success'=> 'deleted']);
               }else{
                error_log('Eliminar_Producto : deleteProduc-> No se ha eliminado el producto correctamente de la BD');
                $this->redirect('listar_producto/getProducts', ['error'=> 'cannotDelete']);
               }
           }
          
        }

        private function deleteImg($name)
        {
            $extensions = ['jpg', 'jpeg', 'png'];
            $path = $_SERVER['DOCUMENT_ROOT']."/plugins/img/uploads/$name.";

            for ($i=0; $i < count($extensions) ; $i++) { 
                if(file_exists($path.$extensions[$i]))
                {
                    unlink($path.$extensions[$i]);
                    return true;
                }
            }
            return false;
        }

    }


?>