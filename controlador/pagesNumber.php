<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/modelo/dbConn.php';
	$persona = $_POST['persona']=='0';
	$conn = new BD();
	$Resultado = $conn->pagesAccount($persona);
	$paginas=0;
    while ($row = $Resultado->fetch_array(MYSQLI_BOTH))
    {
		$paginas = ceil($row[0]/5);
    }
    for($i=1;$i<$paginas;$i++){
    	echo '<li class="page-item"><a class="page-link" title="'.$i.'" href="#">'.$i.'</a></li>';
    }
?>