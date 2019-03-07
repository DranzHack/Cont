<?php
	error_reporting(E_ERROR || E_PARSE);
	require_once '../../modelo/dbConn.php';
	$LeConection=new BD();

	$Code=$_POST['mcode'];
	$Usuario=$_POST['mUsuario'];
	$Pass=$_POST['mContra'];
	$TipoUser=$_POST['mTipoU'];

	$hash=password_hash($Pass,PASSWORD_DEFAULT);
/*
	echo $Code;
	echo '<br>';
	echo $Usuario;
	echo '<br>';
	echo $Pass;
	echo '<br>';
	echo $TipoUser;
	echo '<br>';
	*/

	if(!empty($Code) && !empty($Usuario) && !empty($Pass) && !empty($TipoUser))
	{
		
		$ElKomander=$LeConection->UpdateUsers($Usuario,$hash,$TipoUser,$Code);
		echo "Actualizacion Correcta";
	}
	else
	{
		echo "Algo Va Mal";
	}
	
?>