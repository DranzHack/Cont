<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/modelo/dbConn.php';
	$conn1 = new BD();
	$Resultadoa = $conn1->selectProov();
	$html='';
    while ($row = $Resultadoa->fetch_array(MYSQLI_ASSOC))
    {
    	$html.='<option value="'.$row['IdCuneta_Persona'].'">'.$row['NombrePersona'].'</option>';
    }
    echo '
    		<select class="form-control" name="proovedor" id="proovedor">
    			<option value="" disabled selected>Seleccione un Proveedor</option>
    			'.$html.'
    		</select>';
?>