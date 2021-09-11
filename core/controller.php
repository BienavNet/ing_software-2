<?php
    class Controller{

        protected $vista;
        protected $model;
        private $modelName;
        protected $data;

        function __construct($viewName, $modelName)
        {
            error_log("Controller-> __construct : Inicio del controlador padre.");
            $this->vista = new View($viewName);
            $this->modelName = $modelName;
            $this->data = [];
            
        }

        public function loadModel(){

            $path = 'models/' .$this->modelName. 'Model.php';
            if(file_exists($path)){
                require_once $path;
                $class_model = $this->modelName.'Model';
                $this->model = new $class_model();
                error_log("Controller-> loadModel : Se cargó correctamente el modelo ".$this->modelName."Model");
            }else{
                error_log("Controller-> loadModel : No se pudo cargar el modelo ".$this->modelName."Model");
            }
        }

        public function renderView($array = []){
            $this->vista->render($array);
        }

        public function redirect($route ,$array=[]){
           $data = $array;
           $aux = '';
           foreach ($data as $key => $value) {
                $aux.= $key.'='.$value.'&';
           }
           $aux = ($aux!='')?'?'.rtrim($aux, '&'):'';

           if(!empty($route)){
            header('Location: '.constant('URL').$route. '' .$aux);
           }else
            header('Location: '.constant('URL').$aux);
        }

        




    }


?>
