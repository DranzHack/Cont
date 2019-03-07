<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once dirname(__DIR__).'/../modelo/dbConn.php';
	$persona = $_POST['persona']=='0';
	$conn = new BD();
	if(is_numeric($_POST['indice'])){
		$indice = (int)$_POST['indice'];
	}
	else{
		$indice = 0;
	}
	$Resultado = $conn->listAccounts($persona, $indice*5);
	$html = $persona ?
			'
				<tr class="thead-dark">
					<th>Nombre</th>
					<th>Direccion</th>
					<th>C.P.</th>
					<th>Tel</th>
					<th>RFC</th>
					<th>Tipo</th>
					<th>Zona</th>
					<th>Clasificación</th>
					<!--<th></th>-->
				</tr>
			':
			'
				<tr class="thead-dark">
					<th>Nombre</th>
					<th>Direccion</th>
					<th>C.P.</th>
					<th>Tel</th>
					<th>RFC</th>
					<th>Producto</th>
					<!--<th></th>-->
				</tr>
			';

    while ($row = $Resultado->fetch_array(MYSQLI_ASSOC))
    {
    	$html.='
			<tr>
				<td>'.$row['NombrePersona'].'</td>
				<td>'.$row['Direccion'].'</td>
				<td>'.$row['CodigoPostal'].'</td>
				<td>'.$row['Telefono'].'</td>
				<td>'.$row['RFC'].'</td>
    	';
    	if($persona){
    		$html.='
    			<td>'.$row['TipoEmpresa'].'</td>
				<td>'.$row['Zona'].'</td>
				<td>'.$row['Clasificacion'].'</td>
				<!--<td>
					<button class="edit btn btn-info" data-toggle="modal" data-target="#editModal" value="'.$row['IdCuneta_Persona'].'">
					Editar</button>
					<button class="eliminar btn btn-danger" value="'.$row['IdCuneta_Persona'].'">
					Eliminar</button>
				</td>-->
			</tr>';
    	}else{
    		$html.='
				<td>'.$row['Producto'].'</td>
				<!--<td>
					<button class="edit btn btn-info" data-toggle="modal" data-target="#editModal" value="'.$row['IdCuneta_Persona'].'">
					Editar</button>
					<button class="eliminar btn btn-danger" value="'.$row['IdCuneta_Persona'].'">
					Eliminar</button>
				</td>-->
			</tr>';
    	}

    }
    echo '<table class="table thead-dark table-striped table-hover">'.$html.'</table>';

?>

