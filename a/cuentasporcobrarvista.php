<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<div class="container-fluid">
	<h1>Cuentas por Cobrar</h1>

  <div class="table-responsive">


<?php
  $usuario = "phpmyadmin";
  $password = "some_pass";
  $servidor = "192.168.0.126";
  $basededatos = "Demo_Contabilidad";

  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");
  $consulta = "SELECT * FROM Cuentas_Por_Cobrar";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  
  // Motrar el resultado de los registro de la base de datos
  // Encabezado de la tabla
  echo "<table class='table' borde='2'>";
  echo "<tr>";
  echo "<th>Id_CuentaPagar</th>";
  echo "<th>Tp_CunetaPag</th>";
  echo "<th>Persona_Proveedor</th>";
  echo "<th>TipoDocumento</th>";
  echo "<th>Plazo</th>";
  echo "<th>Monto</th>";
  echo "<th>FechaPago</th>";
  echo "</tr>";
  
  // Bucle while que recorre cada registro y muestra cada campo en la tabla.
  while ($columna = mysqli_fetch_array( $resultado ))
  {
    echo "<tr>";
    echo "<td>" . $columna['Id_CuentaPagar'] . "</td><td>" . $columna['Tp_CunetaPag'] . "</td><td>" . $columna['Persona_Proveedor'] . "</td><td>" . $columna['TipoDocumento'] . "</td><td>" . $columna['Plazo'] . "</td><td>" . $columna['Monto'] . "</td><td>" . $columna['FechaPago'] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>"; 
  // Fin de la tabla
  // cerrar conexión de base de datos
  mysqli_close( $conexion );
?>
</div>
</div>

<div class="container">
  <a href="cuentasporpagar.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>
</div>