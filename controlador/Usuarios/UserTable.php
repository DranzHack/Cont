<?php 

	error_reporting(E_ERROR || E_PARSE);
	require_once '../../modelo/dbConn.php';
	$LeConection=new BD();

	$ElPack=$LeConection->showtableusers();

	if($ElPack==false)
	{
		echo "No hay Datos.";
	}
	else
	{
		$html="";
		while($row=$ElPack->fetch_array(MYSQLI_BOTH))
		{
			$html .= '<tr>
            <td>'.$row[1].'</td>
            <td>'.$row[3].'</td>
            <td>
              <button id='.$row[0].' data-id='.$row[0].' data-toggle="modal" data-target="#editModal"  title='.$row[0].' type="button" class="edit btn btn-info">Actualizar</button>
              <button id="Eliminar" data-id='.$row[0].' title='.$row[0].' type="button" class="eliminar btn btn-danger">Eliminar</button>
            </td>
        </tr>';
		}
		echo $html;
	}
?>