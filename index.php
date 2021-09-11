<?php

    error_reporting(E_ALL);
    ini_set('ignore_repeated_errors', true);
    ini_set('display_errors', false);
    ini_set('log_errors', true);
    ini_set('error_log', "error.log");

    require_once 'config/config.php';
    require_once 'classes/errormessages.php';
    require_once 'classes/successmessages.php';
    require_once 'core/database.php';
    require_once 'core/imodel.php';
    require_once 'core/model.php';
    require_once 'classes/session.php';
    require_once 'core/controller.php';
    require_once 'core/view.php';
    require_once 'core/app.php';


    $app = new App();

?>