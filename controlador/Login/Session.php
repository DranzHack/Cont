<?php
	error_reporting(E_ERROR || E_PARSE);
	include_once '../../modelo/dbConn.php';
	$LeConection = new BD();
	$Usuario=$_POST['User'];
	$Contra=$_POST['Pass'];
	//$Usuario=;
	//$Contra='Prueba';

	$Result=$LeConection->Confirm_User($Usuario);


if($Result==false)
{
	echo 'Los Datos ingresados no Existen';
}
else
{
	$Usuario='';
	$hash='';
	$Tipo='';
	while($row=$Result->fetch_array(MYSQLI_BOTH))
	{
		$Usuario=$row[1];
		$hash = $row[2];
		$Tipo=$row[3];
	}
		session_start();
		$_SESSION['User']=$Usuario;
		$_SESSION['Privilegios']=$Tipo;
	if(password_verify($Contra,$hash))
	{
		//echo 'La Contraseña es correctaishon Papu';
		
		
		if($_SESSION['Privilegios']=='Administrador')
		{
			echo '<script>location.href="vistas/"</script>';

		}
		elseif($_SESSION['Privilegios']=='Capturista')
		{
			echo '<script>location.href="vistas/"</script>';
		}
	}
	else
	{
		echo 'La Contraseña es Incorrecta';
	}

	
}
?>