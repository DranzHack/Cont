<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/../modelo/dbConn.php';

	$conn = new BD();
	$a = $conn->pago();
	echo $a;
?>