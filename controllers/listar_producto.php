<?php

    class Listar_Producto extends Controller{


        private static $VIEW_NAME = 'sistema/listar_producto';
        private static $MODEL_NAME = 'product';

        function __construct()
        {
            parent::__construct(Listar_Producto::$VIEW_NAME, Listar_Producto::$MODEL_NAME);

        }


        public function getProducts()
        {
            $this->loadModel();

            $array_replace = ['%code', '%name', '%description', '%price', '%amount'];
            $html_response = 
            '<tr scope="row" >
                <td class="text-center" >%code</td>
                <td class="text-center" style="width:15%" >%name</td>
                <td class="text-center" style="width:40%" >%description</td>
                <td class="text-center" style="width:8%" >%price</td>
                <td class="text-center" style="width:8%" >%amount</td>
                <td class="text-center" style="width:20%" ><img src="%img" width="150" height="150" alt=""></td>
                <td style="width:9%">
                    <a class="btn btn-warning text-white modify m-2" data-toggle="modal" data-target="#editing-modal" onclick="Modify(this)">Modificar</a>

                    <a class="btn btn-danger text-white delete m-2" data-toggle="modal" data-target="#delete-modal" onclick="Delete(this)" >Eliminar</a>
                </td>
            </tr>';

            $products = $this->model->getAll();
            $formated_products = [];

            if(!empty($products) || $products != null)
            {
                for ($i=0; $i < count($products) ; $i++) {
                    $img = $this->getImg($products[$i]['code']);
                    $aux = $html_response; 

                    $aux = str_replace('%img' ,$img, $aux);

                    $aux = str_replace($array_replace ,$products[$i], $aux);
                    array_push($formated_products,$aux);
                }

                error_log('Listar_Producto : getProducts-> Productos cargados correctamente');
                $this->vista->data+=['products'=>$formated_products];
            }else{
                error_log('Listar_Producto : getProducts-> No se pudieron cargar los productos');
            }


            //array_push($this->vista->data, ['products'=>$formated_products]);
            


        }


        public function getProduc($id)
        {
            $this->loadModel();
            $product = [];

            $id = $_GET['modify_id'];

            if(empty($id)){

                error_log('Listar_Producto : getProduct-> Parámetro ID de producto vacío.');

            }else{
                $product = $this->model->get($id);
            }

            if($product != null){
                $this->vista->data+=['product'=>$product];
                error_log('Listar_Producto : getProduct-> Producto cargado en el modal correctamente.');
            }

        }

        private function getImg($name)
        {

            $extensions = ['jpg', 'jpeg', 'png'];
            $path = $_SERVER['DOCUMENT_ROOT']."/plugins/img/uploads/$name.";
            error_log("RUTA: $path");

            for ($i=0; $i < count($extensions) ; $i++) { 
                if(file_exists($path.$extensions[$i]))
                {
                    return constant('URL')."plugins/img/uploads/$name.".$extensions[$i];
                }
            }
            return null;

        }


    }




?>