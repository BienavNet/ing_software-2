<?php

    class User extends Controller{

        private static $VIEW_NAME = 'dashboard/user';
        private static $MODEL_NAME = 'user';
        private $session;
        protected $model;
        private $user_info;

        function __construct()
        {
            parent::__construct(User::$VIEW_NAME, User::$MODEL_NAME);
            $this->session = new Session(User::$MODEL_NAME);
            $this->model = new UserModel($this->session->getUserSession());
            $this->user_info = $this->model->fromUserToArray();
            //$this->renderView($this->user_info);
            $this->vista->data += ['current_user'=>$this->user_info];

            
        }

        public function updateInfo()
        {

            $this->loadModel();
            $data = [];


            $id = $this->session->getUserSession();
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password'];
            $check_pass = $_POST['vpassword'];
            $rol = 'user';


            if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($phone) || empty($pass) || empty($check_pass))
            {
                error_log('User-> updateInfo : No se ha actualizado el usuario correctamente');
                $this->redirect('user', ['error'=>'user_not_updated']);
                
            }else
            {
                if($pass == $check_pass)
                {
                    array_push($data, $id, $fname, $lname, $username, $email, $phone, $pass, $rol);

                    if($this->model->update($data))
                    {
                        error_log('User-> updateInfo : Se ha actualizado el usuario correctamente');
                        $this->redirect('user', ['success'=>'user_updated']);
                    }else
                    {
                        error_log('User-> updateInfo : No se ha actualizado el usuario correctamente');
                        $this->redirect('user', ['error'=>'user_not_updated']);

                    }
                }else{
                    error_log('User-> updateInfo : No se ha actualizado el usuario correctamente');
                    $this->redirect('user', ['error'=>'user_not_updated']);
                }


                
            }



        }




    }


?>