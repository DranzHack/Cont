<?php 
error_reporting(E_ERROR | E_PARSE);
	require_once '../../modelo/dbConn.php';
	$LeConection=new BD();

	$Clap=$_POST['id'];
	if(isset($Clap))
	{
		$Resultado=$LeConection->showperUser($Clap);
		$row=mysqli_fetch_array($Resultado);
		echo json_encode($row);
	}
?>