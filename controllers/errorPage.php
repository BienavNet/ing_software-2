<?php
    class ErrorPage extends Controller{
        private static $viewName = 'error404/index';
        private static $modelName = '';

        function __construct()
        {
            error_log("ErrorPage-> __construct : Inicio del controlador ErrorPage");
            parent::__construct(ErrorPage::$viewName, ErrorPage::$modelName);
        }
    }


?>