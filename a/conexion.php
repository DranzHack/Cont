<?php
	$usuario = "phpmyadmin";
	$password = "some_pass";
	$servidor = "192.168.0.126";
	$basededatos = "Demo_Contabilidad";


	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	
	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT * FROM Clientes";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	
	mysqli_close( $conexion );
	
?>

