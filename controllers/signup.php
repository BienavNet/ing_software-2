<?php

    class Signup extends Controller{

        private static $VIEW_NAME = "login/signup";
        private static $MODEL_NAME = "";
        private static $ROLE = 'user';
        private $userModel;

        function __construct()
        {
            parent::__construct(Signup::$VIEW_NAME, Signup::$MODEL_NAME);
            $this->userModel = new UserModel();
        }

        public function registrarUsuario(){
            $data = [];

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $user = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password'];

            
            if(!empty($fname) || !empty($lname) || !empty($user) || !empty($email) || !empty($phone) || !empty($pass)){
                
                if(empty($user) || $user==""){
                    error_log("Signup->registrarUsuario : El nombre de usuario está vacío");
                    $this->redirect('signup', ['error'=> '36461ff3599344DDFe940deb416d4ecb']);
                    return false;
                }else if(empty($pass) || $pass==""){
                    error_log("Signup->registrarUsuario : El nombre de usuario está vacío");
                    $this->redirect('signup', ['error'=> '36461KSDL0Ñ344DDFe940deb416d4ecb']);
                    return false;
                }else array_push($data,$fname, $lname, $user, $email, $phone, $pass, Signup::$ROLE);
            }
    

            if($this->userModel->save($data)){
                error_log("Signup->registrarUsuario : Se registró el usuario correctamente");
                $this->redirect('', ['success' => '36461f940deb416d4ecb']);
            }else{
                error_log("Signup->registrarUsuario : No se pudo registrar el usuario (database error)");
                $this->redirect('signup', ['error' => '77UDNIOS9D9344DDFe940deb416d4ecb']);
                return false;
            }
        }

        
    }


?>