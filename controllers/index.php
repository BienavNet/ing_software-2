<?php

class Index extends Controller{

    private static $VIEW_NAME = "index/index";
    private static $MODEL_NAME = "";
    private $session;

    function __construct()
    {
        parent::__construct(Index::$VIEW_NAME, Index::$MODEL_NAME);
        
    }


}




?>