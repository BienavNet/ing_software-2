<?php
    class Dashboard extends Controller{

        private static $VIEW_NAME ='dashboard/index';
        private static $MODEL_NAME = '';
        private $session;
        function __construct()
        {
            parent::__construct(Dashboard::$VIEW_NAME, Dashboard::$MODEL_NAME);
            $this->session = new Session(Dashboard::$MODEL_NAME);
        }


        public function logOut(){

            $this->session->setUserSession('');
            $this->redirect('', ['success' => 'UU789978YOB976SB']);

        }
        


        
    }

?>