<?php


class shopController{

    public function cart(){
        $page = 'cart';
        require('./View/layout.php');
    }

	public function product(){
        $page = 'product';
        require('./View/layout.php');
    }

	public function index(){
        $page = 'index';
        require('./View/layout.php');
    }




}

?>