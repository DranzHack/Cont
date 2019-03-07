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
		$title="Registrar pago";
		include_once 'resources/head.php';
		include_once 'resources/navbar.php';
	?>
	<body>

		<div class="container-fluid">
			<h1 class="float-left">Registrar pago</h1> 
			<a href="datosgenerales.php" class="btn btn-primary float-right">Ver Movientos</a>			
			<form id="pago">

				<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del encargado">
				<div id="Prov"></div>
				<div id="client"></div>
				<input type="text" id="subtotal" name="subtotal" class="form-control" placeholder="Subtotal">
				<input type="text" id="comision" name="comision" class="form-control" placeholder="Comisión">
				<input type="text" id="transferencia" name="transferencia" class="form-control" placeholder="Transferencia / Cheque">
				<input type="text" id="banco" name="banco" class="form-control" placeholder="Banco">
				<button id="send" type="button" class="btn btn-outline-secondary m-3">Registrar</button>
			</form>
		</div>
		<br>
		<br>
		<br>
		<?php include_once 'resources/footer.php'; ?>
		<script src="/VicomNet/cont/assets/scripts/storePago.js"></script>
	</body>

</html>