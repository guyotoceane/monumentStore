<?php
class Cart {
    private $db;

    public function __construct($db1){
        $db1 = new Connection();
        $this->db = $db1->getConnection();
//        $_SESSION['cart']=array();
//        $_SESSION['total']=0;
        if(!isset($_SESSION['cart'])){
            $_SESSION['total']=0;
            $_SESSION['cart'] = array();
        }
    }

    public function addProduct(array $product=array()){
        $_SESSION['cart'][]= $product;
        $_SESSION['total'] += $product['prix'] * $product['quantite'] + $product['optionPrix'] * $product['quantiteOption'];
        header('Location: index.php?ctrl=cart&action=cart');
    }

}

?>