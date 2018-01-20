<?php

require_once('Connection.class.php');
require_once('Product.class.php');

class ProductManager {

	private $db;

	public function __construct($db1) {
		$db1 = new Connection();
		$this->db = $db1->getConnection();
					
	}


	public function findAll() {

 		$usersQuery = $this->db->prepare("SELECT * FROM shop ");
 		$usersQuery->execute();
 		$result =$usersQuery->fetchAll();

 		return $result;
    
	}


	public final  function findOne($id) {


		$usersQuery = $this->db->prepare( "SELECT * FROM shop WHERE id = ".$id.";");
 		$usersQuery->execute();
		$result =$usersQuery->fetchAll();
 		/*$result =$usersQuery->fetchObject();
 		$result = (array)$result;
 		$result = new Product($result);*/

 		return $result;
    
	}
	
	public function findTag($tag) {
 		$usersQuery = $this->db->prepare("SELECT * FROM shop WHERE type = '".$tag."';");
 		$usersQuery->execute();
 		$result =$usersQuery->fetchAll();

 		return $result;
    
	}

}

?>