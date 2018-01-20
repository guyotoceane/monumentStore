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
		$id = $_GET['id'];
        $page = 'product';
		$product= $this->productManager->findOne($id);
        require('./View/layout.php');
    }

	public function index(){
        $page = 'index';
		$product= $this->productManager->findAll();
        require('./View/layout.php');
    }

	public function tag(){
		$tag = $_GET['tag'];
        $page = 'tag';
		$product= $this->productManager->findTag($tag);
        require('./View/layout.php');
    }

	



}

?>