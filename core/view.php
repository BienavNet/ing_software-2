<?php
    class View{

        protected $viewName;
        public $data;
        

        function __construct($view)
        {
            error_log("View-> __construct : Inicio de la clase vista");
            $this->viewName = $view;
            $this->data = [];
            
        }

        public function render($params = []){

            $this->data = (empty($params))?$this->data:$params;
            $this->handleMessages();

            $path  = 'views/' .$this->viewName. '.php';

            if(file_exists($path)){
                require $path;
                error_log("View-> render : Vista " .$path. " cargada correctamente.");

                //$my_page = file_get_contents($path);
            }
            else error_log("View-> render : No se encontró la vista " .$path.".");
        }

        private function handleMessages(){
            if(isset($_GET['error']) && isset($_GET['success'])){
                error_log("View->handleMessages :  Se encontraron los dos tipos de mensajes a la vez (Error).");
            }else if(isset($_GET['error'])){
                $code = $_GET['error'];
                error_log("View->handleMessages : Se encontró el error ".$code);
                $this->handleMessage($code, 'error');
            }else if(isset($_GET['success'])){
                $code = $_GET['success'];
                $this->handleMessage($code, 'success');
            }
        }

        private function handleMessage($code, $type){
            error_log("View-> handleMessage : Se está procesando el mensaje");
            switch ($type) {
                case 'error':
                    $error = new ErrorMessages();

                    if($error->verifyCode($code)){
                        $this->data['message'] = $error->getMessage($code);
                    }
                    break;

                case 'success':
                    $success = new SuccessMessages();
                    if($success->verifyCode($code)){
                        $this->data['message'] = $success->getMessage($code);
                    }
                    break;
                
            }
        }

        public function showMessages(){
            if(isset($this->data['message'])){
                echo '<div class="row alert alert-info d-flex justify-content-center" id="results"><small class="text-center" style="font-size: 1.1rem;">'.$this->data['message'].'</small></div>';
            }
        }
    }


?>