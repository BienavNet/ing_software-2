<?php
    require_once 'controllers/errorPage.php';
    class App {

        private $url;
        private $controller;
        private $method;
        private $params;
        private $session;

        function __construct()
        {
            error_log("App-> __construct : Se inicio la app.");
            $this->url = rtrim($_GET['url'], '/');
            $url_array = explode('/', $this->url);
            $this->session = new Session($url_array[0]);
            $this->session->initialize();
            

            if($this->url == ""){
                error_log("App-> __construct : sin datos de url, cargando modelo por defecto.");
                require_once 'controllers/index.php';
                $this->controller = new Index();
                $this->controller->renderView();
                return true;
            }else{
                $this->url = explode('/', $this->url);
                $controllerName = array_shift($this->url);

                if(file_exists('controllers/' .$controllerName.'.php')){
                    error_log("App-> __construct : Se encontró el controlador $controllerName y se está cargando.");
                    require_once 'controllers/' .$controllerName.'.php';
                    $this->controller = new $controllerName();
                    $this->method = (isset($this->url[0]))?array_shift($this->url):null;

                    if(method_exists($this->controller, $this->method)){
                        error_log("App-> __construct : Cargando el método " .$this->method. ".");
                        $this->params = (isset($this->url[0]))?$this->url:null;
                        if(isset($this->params))
                            $this->controller->{$this->method}($this->params);
                        else
                            $this->controller->{$this->method}();   
                    }else{
                        error_log("App-> __construct : No se encontró el método " .$this->method. " en $controllerName.");
                        //podemos enviar a la página 404 o enviar un mensaje de error al controlador actual que diga algo como
                        // "la acción que intenta realizar no existe"
                    }
                    $this->controller->loadModel();
                    $this->controller->renderView();
                }else{
                    error_log("App-> __construct : No se encontró el controlador $controllerName");
                    $this->controller = new ErrorPage();
                    $this->controller->loadModel();
                    $this->controller->renderView();
                }
            }


            
        }
    }

?>