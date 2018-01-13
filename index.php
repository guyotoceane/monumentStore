<?php
	require('Model/User.class.php');
	session_start(); 
?>

<?php
	require_once('Model/Connection.class.php');
	$pdoBuilder = new Connection();
	$db = $pdoBuilder->getConnection();

	if (( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) &&
		( isset($_GET['action']) && !empty($_GET['action']) )
	){
		$ctrl = $_GET['ctrl'];
		$action = $_GET['action'];
	}else{
		$ctrl = 'shop';
		$action = 'index';
	}

	
	require_once('/Controller/' . $ctrl  . 'Controller.php');

	$ctrl = $ctrl . 'Controller';
	$controller = new $ctrl($db);
	$controller->$action();

?>



