<?php
session_start();

$Role=$_SESSION['Privilegios'];

if(isset($_SESSION['Privilegios']))
    {

    }else{
        session_destroy();
        header('location: ../'); 
    }
?>

<?php require_once 'resources/head.php'; ?>
<?php require_once 'resources/navbar.php'; ?>

<link href="../assets/styles/404style.css" rel="stylesheet" >
<div class="overlay"></div>
<div class="terminal">
  <h1>Error <span class="errorcode">404</span></h1>
  <p class="output">La pagina a la que deseas ingresar se encuentra fuera de servicio o no existe </u>
  <p class="output">Porfavor intenta <a href="#1">Inicio</a> o <a href="#2">Regresar</a></p>
  <p class="output">May the Force be with you</p>
</div>
