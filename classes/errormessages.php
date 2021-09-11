<?php

    class ErrorMessages{

        private static $ADMIN_TEST_ERRORMESSAGE = '36461ff35997a523be940deb416d4ecb';
        private static $ERROR_LOGIN_MISSING_USERNAME = '36461ff3599344DDFe940deb416d4ecb';
        private static $ERROR_LOGIN_MISSING_PASSWORD = '36461KSDL0Ñ344DDFe940deb416d4ecb';
        private static $ERROR_LOGIN_INCORRECT_CREDENTIALS = '36461ts6719344DDFe940deb416d4ecb';
        private static $ERROR_SIGNUP_REGISTER_FAILED = '77UDNIOS9D9344DDFe940deb416d4ecb';
        private static $ERROR_SIGNUP_MISSED_PARAMS = '77UDNIOS9D9344DDFKHDI43DOD053';
        private static $ERROR_LOGIN_USER_NOTFOUND = 'HHBOS8789HVOS';
        private static $ERROR_USER_UPDATE_UNSUCCESSFULLY = 'user_not_updated';
        private static $ERROR_PRODUCT_UPDATE_IMAGEFAILED = 'img_failed';
        private static $ERROR_PRODUCT_MODIFY_EMPTYPARAMS = 'empty_params';


        private static $ERROR_DELETE_PRODUCT = 'cannotDelete';


        private $messages;


        //Products 
        private static $ERROR_SAVE_REGISTER_PRODUCT = 'OPWN912';


        function __construct()
        {
            $this->messages = [
                ErrorMessages::$ADMIN_TEST_ERRORMESSAGE => 'Prueba de mensaje de error.',
                ErrorMessages::$ERROR_LOGIN_MISSING_USERNAME => 'Debe de llenar el campo de nombre de usuario',
                ErrorMessages::$ERROR_LOGIN_MISSING_PASSWORD => 'Debe de llenar el campo de contraseña',
                ErrorMessages::$ERROR_LOGIN_INCORRECT_CREDENTIALS => 'El nombre de usuario o contraseña son incorrectos',
                ErrorMessages::$ERROR_SIGNUP_REGISTER_FAILED => 'El nombre de usuario escogido ya existe',
                ErrorMessages::$ERROR_SIGNUP_MISSED_PARAMS => 'Faltaron parámetros por ingresar',
                ErrorMessages::$ERROR_LOGIN_USER_NOTFOUND => 'No se encontró el nombre de usuario',
                ErrorMessages::$ERROR_USER_UPDATE_UNSUCCESSFULLY => 'No se pudo actualizar su información. Revisa los campos e intenta de nuevo.',
                ErrorMessages::$ERROR_SAVE_REGISTER_PRODUCT => 'No se pudo guardar el producto en la base de datos.',
                ErrorMessages::$ERROR_DELETE_PRODUCT => 'No se pudo eliminar el producto, por favor revisa que el id sea correcto o que se encuentre registrado en la base de datos.',
                ErrorMessages::$ERROR_PRODUCT_UPDATE_IMAGEFAILED => 'No se pudo guardar el producto por problemas al cargar la imagen,',
                ErrorMessages::$ERROR_PRODUCT_MODIFY_EMPTYPARAMS => 'No se pudo ejecutar la acción, porque algunos parametros son incorrectos o están vacíos.'
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