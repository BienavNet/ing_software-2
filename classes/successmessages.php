<?php

    class SuccessMessages {

        

        private static $SUCCESS_SIGNUP_USER_REGISTER = '36461f940deb416d4ecb';
        private static $SUCCESS_LOGOUT_USER = 'UU789978YOB976SB';
        private static $SUCCESS_SIGNUP_REGISTER ='';
        private static $SUCCESS_USER_UPDATEPASSWORD_SUCCESFULLY = 'ODOB707S';
        private static $SUCCESS_USER_UPDATE_SUCCESFULLY = 'user_updated';
        private static $SUCCESS_PRODUCT_UPDATE_SUCCESSFULLY = 'updated';
        private static $SUCCESS_DELETE_PRODUCT = 'deleted';


        //Products
        private static $SUCCESS_REGISTER_PRODUCT_SUCCESSFULLY = 'UUYA9803';

        private $messages;

        function __construct()
        {

            $this->messages = [

                SuccessMessages::$SUCCESS_SIGNUP_USER_REGISTER => 'Se ha registrado el usuario correctamente. Ya te puedes loguear :)',
                SuccessMessages::$SUCCESS_LOGOUT_USER => 'Ha cerrado sesión correctamente',
                SuccessMessages::$SUCCESS_USER_UPDATEPASSWORD_SUCCESFULLY => 'Su contraseña se actualizó correctamente',
                SuccessMessages::$SUCCESS_USER_UPDATE_SUCCESFULLY => 'Se actualizó su información correctamente',
                SuccessMessages::$SUCCESS_REGISTER_PRODUCT_SUCCESSFULLY => 'Se ha guardado el producto correctamente en la base de datos.',
                SuccessMessages::$SUCCESS_DELETE_PRODUCT => 'Se ha eliminado el producto correctamente',
                SuccessMessages::$SUCCESS_PRODUCT_UPDATE_SUCCESSFULLY => 'Se actualizado correctamente el producto.'
            ];
            
        }


        public function verifyCode($code){
            return array_key_exists($code, $this->messages);
        }

        public function getMessage($code){
            return $this->messages[$code];
        }

    }


?>