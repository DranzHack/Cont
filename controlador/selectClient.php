<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/modelo/dbConn.php';
	$conn = new BD();
	$Resultado = $conn->selectClient();
	$html='';
    while ($row = $Resultado->fetch_array(MYSQLI_ASSOC))
    {
    	$html.='<option value="'.$row['IdCuneta_Persona'].'">'.$row['NombrePersona'].'</option>';
    }
    echo '
    		<select class="form-control" name="cliente" id="cliente">
    			<option value="" disabled selected>Seleccione un cliente</option>
    			'.$html.'
    		</select>';
?>