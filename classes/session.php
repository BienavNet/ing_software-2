<?php
     
    require_once 'models/userModel.php';

    class Session{

        private $page;
        private $pages;
        private $default_pages;
        public $user;


        function __construct($route)
        {

            if(session_status()==PHP_SESSION_NONE)session_start();
            error_log("Session->__construct : Sesión iniciada ");
            $this->page = $route;
            $this->user = new UserModel($_SESSION['user']);
        }

        public function getUserSession(){
            error_log("Session->getUserSession : Obteniendo el id del usuario en la sesion");
            return $this->user->getId();
        }

        public function setUserSession($id){
            error_log("Session->setUserSession : Configurando el id del usuario en la sesion");
            $_SESSION['user'] = $id;
        }

        public function closeSession(){
            error_log("Session->closeSession : Session cerrada");
            session_unset();
            session_destroy();
        }

        

        public function initialize(){

            error_log("Session->initialize : Se inicio la sesion y las verificaciones");

            $json = $this->getJsonPages();
            $this->pages = $json['pages'];
            $this->default_pages = $json['default'];

            $this->verifySession();

        }

        private function verifySession(){
            if($this->existsUrl()){
                error_log("Session->verifySession : La pagina " .$this->page. " existe");
                if($this->isPublic()){
                    error_log("Session->verifySession : La pagina es de acceso público");
                    if($this->user->getId()!=""){

                        if($this->verifyTier()){
                            if($this->verifyRol()==false){
                                error_log("Session->verifySession : El usuario está logueado, PERO NO PUEDE ACCEDER A LA PÁGINA DEBIDO A SU ROL");
                                $this->redirectByRol($this->user->getRol());
                            }
                        }else{
                            error_log("Session->verifySession : El usuario está logueado, redirigiendo a su pagina principal");
                            $this->redirectByRol($this->user->getRol());
                        }
                        
                    }
                }else{
                    error_log("Session->verifySession : La pagina " .$this->page. " es de acceso privado");
                    if($this->user->getId()!=""){
                        error_log("Session->verifySession : El usuario se encuentra logueado");
                        if($this->verifyRol()==false){
                            error_log("Session->verifySession : El usuario intenta acceder a una pagina que no es de su rol");
                            $this->redirectByRol($this->user->getRol());
                        }
                    }else{
                        error_log("Session->verifySession : El usuario quiere acceder a una pagina privada sin loguearse");
                        header('Location: ' .constant('URL'). '');
                    }
    
                }
            }else
            error_log("Session->verifySession : La pagina no existe");
        }




        private function isPublic(){
            error_log("Session->isPublic : Verificando el acceso de la página");
            for ($i=0; $i < sizeof($this->pages); $i++) { 
                if($this->pages[$i]['page']==$this->page && $this->pages[$i]['tier']=='public')return true;
            }
            return false;
        }

        private function existsUrl(){
            error_log("Session->existsUrl : Verificando si existe la página");
            for ($i=0; $i < sizeof($this->pages); $i++) { 
                if($this->pages[$i]['page']==$this->page)return true;
            }
            return false;
        }

        private function verifyRol(){
            error_log("Session->verifyRol : Verificando el rol del usuario");
            for ($i=0; $i < sizeof($this->pages) ; $i++) { 
                if($this->pages[$i]['page']==$this->page && $this->pages[$i]['rol']==$this->user->getRol())return true;
            }
            return false;
        }

        private function verifyTier(){
            error_log("Session->verifyTier : Verificando el acceso de la página");
            for ($i=0; $i < sizeof($this->pages) ; $i++) { 
                if($this->pages[$i]['page']==$this->page && $this->pages[$i]['tier']=='public')return true;
            }
            return false;
        }

        public function redirectByRol($rol){
            error_log("Session->redirectByRol : Redirigiendo al usuario por su rol");
            switch ($rol) {
                case 'user':
                    header('Location: '.constant('URL').''.$this->default_pages['user']);
                    break;

                case 'admin':
                    header('Location: '.constant('URL').''.$this->default_pages['admin']);
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        




        private function getJsonPages(){
            
            $json_string = file_get_contents('config/access.json');
            $json = json_decode($json_string, true);
            error_log("Session->getJsonPages : Obteniendo datos del archivo Json");
            return $json;
        }

    }


?>