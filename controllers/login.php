<?php

    class Login extends Controller{

        private static $VIEW_NAME = "login/login";
        private static $MODEL_NAME = "login";
        private $session;

        function __construct()
        {
            parent::__construct(Login::$VIEW_NAME, Login::$MODEL_NAME);
            
        }


        function verifyLogin(){
            $this->loadModel();
            
            if(isset($_POST['username']) && isset($_POST['password'])){
                $user = $_POST['username'];
                $pass = $_POST['password'];

                if(empty($user) || empty($pass) || $user == "" || $pass == ""){
                    error_log("Login->verifyLogin : El nombre de usuario está vacío");
                    $this->redirect('login', ['error' => '77UDNIOS9D9344DDFKHDI43DOD053']);
                }else{
                    $my_user = $this->model->checkSession($user, $pass);
                    if($my_user!=null){
                        error_log("Login->verifyLogin : Login correcto, redireccionando a su página de inicio");
                        
                        $this->vista->data+=['user'=>$my_user];

                        $this->session = new Session('login');

                        $this->session->setUserSession($my_user['id']);
                        
                        $this->session->redirectByRol($my_user['rol']);
                    }else{
                        error_log("Login->verifyLogin : Usuario no encontrado");
                        $this->redirect('login', ['error' => 'HHBOS8789HVOS']);
                    }

                }

            }
        }

        



    }



?>