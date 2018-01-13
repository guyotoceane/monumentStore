<?php


class productController{
	
	
	private $productManager;
    private $product;
	
	public function __construct($db1){

        include('./Model/ProductManager.class.php');
        $this->productManager = new ProductManager($db1);

        $this->db = $db1;
    }
	

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
		$product= $this->productManager->findAll();
        require('./View/layout.php');
    }

	

	



}

?>