<?php
class cartController{

    private $cart;
    private $db;
    private $productManager;
    private $tmpCart;

    public function __construct($db1){

        include('./Model/Cart.class.php');
        include('./Model/ProductManager.class.php');

        $this->productManager = new ProductManager($db1);
        $this->cart = new Cart($db1);

        $this->db = $db1;




    }

    public function cart(){
        $page = 'cart';
        $products = $_SESSION['cart'];
        $total = $_SESSION['total'];
        require('./View/layout.php');
    }

    public function add(){
        $product = $this->productManager->findOne($_POST['idProduct'])[0];
//        print_r($product);
        $this->tmpCart = array();
        $this->tmpCart['id'] = $product['id'];
        $this->tmpCart['name'] = $product['name'];
        $this->tmpCart['optionName'] = $product['optionName'];
        $this->tmpCart['prix'] = $product['prix'];
        $this->tmpCart['optionPrix'] = $product['optionPrix'];
        $this->tmpCart['quantite'] = 1;
        $this->tmpCart['quantiteOption'] = 0;
        if(isset($_POST['option'])) $this->tmpCart['quantiteOption'] = 1;

        for($i=0; $i<count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i]['id'] == $this->tmpCart['id']){
                $_SESSION['cart'][$i]['quantite']  += $this->tmpCart['quantite'];
                $_SESSION['cart'][$i]['quantiteOption'] += $this->tmpCart['quantiteOption'];
                $page = "cart";
                require('./View/layout.php');

                exit;
            }
        }

        $this->cart->addProduct($this->tmpCart);
    }

    public function validate(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            $page = "validate";
            require('./View/layout.php');
        } else{
            $page = 'login';
            require('./View/layout.php');
        };
    }

    public function quantite(){
        $_SESSION['total'] = 0;
        for($i=0; $i<count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i]['id'] == $_POST['id']){
                if($_POST['type'] == "produit"){
                    $_SESSION['cart'][$i]['quantite']  = $_POST['number'];
                } elseif ($_POST['type'] == "option"){
                    $_SESSION['cart'][$i]['quantiteOption']  = $_POST['number'];
                }

            }

            $_SESSION['total'] += $_SESSION['cart'][$i]['prix'] * $_SESSION['cart'][$i]['quantite'] + $_SESSION['cart'][$i]['optionPrix'] * $_SESSION['cart'][$i]['quantiteOption'];


        }
    }

    public function suppr(){
        $_SESSION['total'] = 0;
        for($i=0; $i<count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i]['id'] == $_GET['id']){
                $_SESSION['total'] += $_SESSION['cart'][$i]['prix'] * 0 + $_SESSION['cart'][$i]['optionPrix'] * 0;

                unset($_SESSION['cart'][$i]);
                $page = "cart";
                require('./View/layout.php');

            } else{
                $_SESSION['total'] += $_SESSION['cart'][$i]['prix'] * $_SESSION['cart'][$i]['quantite'] + $_SESSION['cart'][$i]['optionPrix'] * $_SESSION['cart'][$i]['quantiteOption'];

            }
        }
    }
}