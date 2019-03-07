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
	<?php
		$title="Cartera de Clientes";
		include_once 'resources/head.php';
		include_once 'resources/navbar.php';
	?>
	<body>

	<div class="container-fluid mt-3">
		<h1>Catalogo de cuentas</h1>
		<div class="table-responsive">
			<form id="search" class="">
				<div class="btn-group float-md-left mb-3" role="group" aria-label="options">
					<button type="button" class="btn btn-outline-primary" value="0" id="Clientes">Clientes</button>
					<button type="button" class="btn btn-outline-primary" value="1" id="Proveedores">Proveedores</button>
				</div>
				<div class="btn-group float-md-right mb-3" role="group" aria-label="C">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal"> Agregar una cliente/proovedor</button>
				</div>
			</form>
			<div id="listAccounts" class="table-responsive">
			</div>
		</div>
	</div>
	<div class="container">
				<nav aria-label="...">
		  <ul class="pagination pagination-sm" id="paginas">

		  </ul>
		</nav>
		<a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>
	</div>
		<script src="/VicomNet/cont/assets/scripts/cartera.js"></script>

		
	

		<br>
		<br>
		<br>
		<br>

	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar cliente/proovedor</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<?php include_once '../controlador/insertCuenta/insertCuenta.php'; ?>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
				</div>
			</div>
		</div>
	</div>


	<div id="editModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="EditarDatos" method="POST" enctype="multipart/form-data">
						<div class="modal-header">
							<h4 class="modal-title">Editar Usuarios</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group col-md-12" hidden>
							      <label for="equipo">code:</label>
							      <input type="text" name="mcode" class="form-control" id="mcode" required>
							    </div>
							 <div class="form-group col-md-12">
							      <label for="mUsuario">Usuario:</label>
							      <input type="text" name="mUsuario" class="form-control" id="mUsuario" placeholder="Usuario" required>
							    </div>
							  
							  <div class="form-group">
							    <div class="form-group col-md-12">
							      <label for="mContra">Contraseña:</label>
							      <input type="text" name="mContra" class="form-control" id="mContra" placeholder="Inserte La Nueva Contraseña" required>
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="form-group col-md-12">
							      <label for="equipo">Tipo de Usuario:</label>
							      <select class="form-control" name="mTipoU" id="mTipoU">
							      	<option value="" selected disabled hidden>Elija Una Opcion</option>
							    	<option value="Administrador">Administrador</option>	
							    	<option value="Capturista">Capturista</option>
							      </select>
							    </div>
							  </div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="submit"class="btn btn-info" value="Guardar">
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php include_once 'resources/footer.php'; ?>
		<script src="/VicomNet/cont/assets/scripts/listOptions.js"></script>
	</body>
	
</html>