<?php
    class Sistema extends Controller{

        private static $VIEW_NAME = 'sistema/index';
        private static $MODEL_NAME = '';
        private $session;
        private $user_data;


        function __construct()
        {
            parent::__construct(Sistema::$VIEW_NAME, Sistema::$MODEL_NAME);
            $this->session = new Session('sistema');
            $this->model = new UserModel($this->session->getUserSession());
            $this->user_data = $this->model->fromUserToArray();
            $this->vista->data = $this->user_data;

        }

        function logOut(){
            $this->session->setUserSession('');
            $this->redirect('',[]);
        }

    }


?>