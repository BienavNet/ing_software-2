<?php

    class LoginModel{
        private $user;

        function __construct()
        {
            $this->user = new UserModel();
        }

        public function checkSession($username, $pass){

            $strquery = "SELECT * FROM usuario WHERE username=:username";
            
            $user = $this->user->preparedQuery($strquery, [':username'=> $username]);


            if($user!=null){
                if($user['pass'] == $pass)return $user;
            }

            return null;

        }


    }

?>