<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/../modelo/dbConn.php';

	if($_POST['nombre']&&$_POST['RFC']&&$_POST['direccion']&&$_POST['CP']&&$_POST['tel']){
		$conn = new BD();
		$a = $conn->insertAccount();
		//echo $a.' ';
		$b = false;
		if($_POST['tipoc']=='0'){
			$b = $conn->insertClient($a);
		}else{
			$b = $conn->insertProov($a);
		}
		echo 'Cuenta registrada';
	}
	else{
		echo 'Llene todos los campos';
	}
?>
