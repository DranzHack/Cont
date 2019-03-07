<?php
    session_start();
   
    if(isset($_SESSION['User']))
    {
        if($_SESSION['Privilegios']=='Capturista')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }else{
        session_destroy();
        header('location: ../../'); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba Capturador|</title>
</head>
<body>
	<!--<h1>BIenvenido Capturalover</h1>-->
</body>
</html>