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


<?php $title='Usuarios';?>
<!DOCTYPE html>
<html lang="en">

	<?php include_once 'resources/head.php'; ?>

<body>

	<div class="section">
		<?php include 'resources/navbar.php'?>

			<hr>
			<h1 class="text-center">New Usernames</h1>
			<hr>
				<form id="Users" class="container" method="POST">
				  <div class="form-group">
				    <label for="Username">Username:</label>
				    <input type="text" class="form-control" name="Username" id="Username" placeholder="Usuario">
				  </div>
				  <div class="form-group">
				    <label for="Password">Password:</label>
				    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="Tipo">Tipo:</label>
				    <select class="form-control" name="UserTypes">
				    	<option value="" selected disabled hidden>Elija Una Opcion</option>
				    	<option value="Administrador">Administrador</option>	
				    	<option value="Capturista">Capturista</option>			    	
				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary">Send Info</button>
				</form>
	</div>
	<div class="container">
            <div class="row">
                <div class="col m12">
								<table id="Equip" class="table table-hover text-center table-responsive">
                              <thead>
                              <tr>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Tipo De Usuario</th>
                                <th class="text-center">Acciones</th>
                              </tr>
                              </thead>
                              <tbody id="Mostrar">

                              </tbody>
                            </table>
                </div>
            </div>
        </div>

        <?php require_once '../controlador/Usuarios/ModalUsers.php'?>

	<script src="../controlador/Usuarios/Usuarios.js"></script>
</body>
</html>