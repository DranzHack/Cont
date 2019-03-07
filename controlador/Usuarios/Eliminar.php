<?php
#DeleteUsers
error_reporting(E_ERROR || E_PARSE);
require_once '../../modelo/dbConn.php';

$LaWeaQueConecta=new BD();

$ElIde=$_POST['id'];

$ElKomander=$LaWeaQueConecta->DeleteUsers($ElIde);

if(!$ElKomander)
{
	echo "El Usuario Se Elimino Correctamente";
}
else
{
	echo "Error Al Eliminar el Usuario";
	exit();

}

?>