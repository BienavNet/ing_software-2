<?php

class Product extends Controller{

    private static $VIEW_NAME = "";
    private static $MODEL_NAME = "";




    function __construct()
    {
        parent::__construct(Product::$VIEW_NAME, Product::$MODEL_NAME);
    }


    public function showAllProducts(){

    }

    public function modifyProduct($id){

    }

    public function addNewProduct($nombre, $precio, $descripcion, $descuento){

    }

    public function deleteProduct($id){

    }



}





?>