<?php include 'navbar.php'; ?>

</br>
</br>
</br>

<div class="container-fluid">
  <h1>Cartera de Clientes</h1>
  <div class="table-responsive">
<?php

  $usuario = "phpmyadmin";
  $password = "some_pass";
  $servidor = "192.168.0.126";
  $basededatos = "Demo_Contabilidad";

  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");
  $consulta = "SELECT * FROM Clientes";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  
  // Motrar el resultado de los registro de la base de datos
  // Encabezado de la tabla
  echo "<table class='table' borde='2'>";
  echo "<tr>";
  echo "<th>IdCliente</th>";
  echo "<th>Persona_client</th>";
  echo "<th>TipoEmpresa</th>";
  echo "<th>Zona</th>";
  echo "<th>Clasificacion</th>";
  echo "</tr>";
  
  // Bucle while que recorre cada registro y muestra cada campo en la tabla.
  while ($columna = mysqli_fetch_array( $resultado ))
  {
    echo "<tr>";
    echo "<td>" . $columna['IdCliente'] . "</td><td>" . $columna['Persona_client'] . "</td><td>" . $columna['TipoEmpresa'] . "</td><td>" . $columna['Zona'] . "</td><td>" . $columna['Clasificacion'] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>"; // Fin de la tabla
  // cerrar conexión de base de datos
  mysqli_close( $conexion );
  ?>
</div>

</div>
<div class="container">
  <a href="cartera.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>
</div>


<?php include 'footer.php'; ?>