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
<!DOCTYPE html>
<html>
<script>
  let malebligi = (x) => {
    console.log(x.keyCode)
  }

  document.onkeydown = malebligi;

</script>
  <?php
    $title="Cartera de Clientes";
    include_once 'resources/head.php';
    include_once 'resources/navbar.php';
  ?>
  <body>
    <div class="container-fluid">
      <h1 class="float-left">Datos Generales</h1>
      <a href="storePago.php" class="btn btn-primary float-right">Ingresar Un Movimiento</a>
      <div class="table-responsive">
    <?php

      $usuario = "phpmyadmin";
      $password = "some_pass";
      $servidor = "192.168.0.126";
      $basededatos = "Demo_Contabilidad";

      // creación de la conexión a la base de datos con mysql_connect()
      $conexion = mysqli_connect( $servidor, $usuario, $password,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");
      $consulta = "SELECT * FROM Pago";
      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
      
      // Motrar el resultado de los registro de la base de datos
      // Encabezado de la tabla
      echo "<table class='table thead-dark table-striped table-hover'  borde='2'>";
      echo "<tr class='thead-dark'>";
      echo "<th>Id_Pago</th>";
      echo "<th>Nombre</th>";
      echo "<th>Provedor_empresa</th>";
      echo "<th>Cliente</th>";
      echo "<th>SubTotal</th>";
      echo "<th>Iva</th>";
      echo "<th>Total</th>";
      echo "<th>Porcentaje</th>";
      echo "<th>Comision OHM</th>";
      echo "<th>Transferencia_Cheque</th>";
      echo "<th>Banco</th>";
      echo "</tr>";
      
      // Bucle while que recorre cada registro y muestra cada campo en la tabla.
      while ($columna = mysqli_fetch_array( $resultado ))
      {
        echo "<tr>";
        echo "<td>" . $columna['Id_Pago'] . "</td><td>" . $columna['Nombre'] . "</td><td>" . $columna['Provedor_empresa'] . "</td><td>" . $columna['Cliente'] . "</td><td>" . $columna['SubTotal'] . "</td><td>" . ($columna['SubTotal']*.16) . "</td><td>" . (($columna['SubTotal']*.16)+$columna['SubTotal']) . "</td><td>" . $columna['Porcentaje'] . "% </td><td>" . (((($columna['SubTotal']*.16)+$columna['SubTotal']))*($columna['Porcentaje'])/100) . "</td><td>" . $columna['Transferencia_Cheque'] . "</td><td>" . $columna['Banco'] . "</td>";
        echo "</tr>";
      }
      
      echo "</table>"; // Fin de la tabla
      // cerrar conexión de base de datos
      mysqli_close( $conexion );
      ?>
    </div>

    </div>
    <div class="container">
      <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>
    </div>


    <?php include_once 'resources/footer.php'; ?>
    <br>
    <br>
    <br>
  </body>
</html>