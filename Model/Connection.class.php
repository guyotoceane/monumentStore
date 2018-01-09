<?php
class Connection {

	private $host;
	private $dbname;
	private $username;
	private $password;
	private $db;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'monumentstore';
        $this->username = 'root';
        $this->password = 'mysql';
		try{
        	$this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
    
	public function getConnection() {
		return $this->db;
	}
}
?>