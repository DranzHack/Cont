<?php 
	error_reporting(E_ERROR || E_PARSE);
	include_once '../../modelo/dbConn.php';
	$LaWeaQueConecta=new BD();
	//$ElKomander=$LaWeaQueConecta->insertUsername();

	$Usuario=$_POST['Username'];
	$Pass=$_POST['Password'];
	$TipoU=$_POST['UserTypes'];
	$hash=password_hash($Pass,PASSWORD_DEFAULT);

	if(!empty($Usuario) && !empty($Pass) && !empty($TipoU))
	{
		
		$ElKomander=$LaWeaQueConecta->insertUsername($Usuario,$hash,$TipoU);
		echo "Inserssion Correcta";
	}
	else
	{
		echo "Debe Acompletar Los Valores";
	}
	



?>