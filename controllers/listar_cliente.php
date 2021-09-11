<?php

    class Listar_Cliente extends Controller{


        private static $VIEW_NAME = 'sistema/listar_cliente';
        private static $MODEL_NAME = 'cliente';

        function __construct()
        {
            parent::__construct(Listar_Cliente::$VIEW_NAME, Listar_Cliente::$MODEL_NAME);

        }


        public function getClientes()
        {
            $this->loadModel();

            $array_replace = ['%code', '%nombres', '%apellidos', '%usuario', '%email','%telefono'];
            $html_response = 
            '<tr scope="row" >
                <td class="text-center" >%code</td>
                <td class="text-center" >%nombres</td>
                <td class="text-center" >%apellidos</td>
                <td class="text-center" >%usuario</td>
                <td class="text-center" >%email</td>
                <td class="text-center" >%telefono</td>
          
            </tr>';

                  // <td>
                //     <a class="btn btn-danger text-white modify" data-toggle="modal" data-target="#delete-modal" onclick="Delete(this)" >Eliminar</a>
                // </td>

            $clientes = $this->model->getAll();
            $formated_clientes = [];

            if(!empty($clientes) || $clientes != null)
            {
                for ($i=0; $i < count($clientes) ; $i++) {
                    $aux = $html_response; 

                    $aux = str_replace($array_replace ,$clientes[$i], $aux);
                    array_push($formated_clientes,$aux);
                }

                error_log('Listar_Clientes : getClientes-> Clientes cargados correctamente');
                $this->vista->data+=['clientes'=>$formated_clientes];
            }else{
                error_log('Listar_Clientes : getClientes-> No se pudieron cargar los Clientes');
            }


            //array_push($this->vista->data, ['products'=>$formated_products]);
            


        }


        public function getCliente($id)
        {
            $this->loadModel();
            $clientes = [];

            $id = $_GET['modify_id'];

            if(empty($id)){

                error_log('Listar_Clientes: getClientes-> Parámetro ID de cliente vacío.');

            }else{
                $cliente = $this->model->get($id);
            }

            if($cliente != null){
                $this->vista->data+=['cliente'=>$cliente];
                error_log('Listar_Clientes : getCliente-> Cliente cargado en el modal correctamente.');
            }

        }

        

    }




?>