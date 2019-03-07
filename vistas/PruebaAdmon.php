<?php
    session_start();
   
    if(isset($_SESSION['User']))
    {
        if($_SESSION['Privilegios']=='Administrador')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../');
        }
    }else{
        session_destroy();
        header('location: ../'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba Admon|</title>
</head>
<body>
	<!--<h1>BIenvenido AdMLOver</h1>-->
</body>
</html>