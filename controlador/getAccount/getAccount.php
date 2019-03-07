<?php 
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/../modelo/dbConn.php';
	if(is_numeric($_POST['account'])){
		$conn = new BD();
		$Resultado = $conn->getAccount($_POST['persona']=='0',$_POST['account']);
	   	/*while ($row = $Resultado->fetch_array(MYSQLI_BOTH))
    	{
    		echo $row[0].' '.$row[1].' '.$row[2];
    	}*/
    	echo json_encode($Resultado->fetch_array());
	}
	else{
		echo 'Selección invalida';
	}
?>