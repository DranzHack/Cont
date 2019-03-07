

<form class="container" id="cuentaForm" class="container shadow">
	<h4>Ingresar una cuenta</h4>
	<input placeholder="Nombre" type="text" id="nombre" name="nombre" class="form-control m-2" required>
	<input placeholder="RFC" type="text" id="RFC" name="RFC" class="form-control m-2" required>
	<input placeholder="Dirección" type="text" id="direccion" name="direccion" class="form-control m-2" required>
	<input placeholder="Estado" type="text" id="estado" name="estado" class="form-control m-2" required>
	<input placeholder="Codigo Postal" type="text" id="CP" name="CP" class="form-control m-2" required>
	<input placeholder="Telefono" type="text" id="tel" name="tel" class="form-control m-2" required>


	<input type="radio" name="tipoc" id="t0" value="0" class="">
		<label for="t0" class="form-check-label">Cliente</label>
	<input type="radio" name="tipoc" id="t1" value="1" class="">
		<label for="t1" class="form-check-label">Proovedor</label>	


	<div id="clientForm" style="display:none">
			<input placeholder="Tipo" type="text" id="tipoE" name="tipoE" class="form-control m-2" required>
			<input placeholder="Zona" type="text" id="zona" name="zona" class="form-control m-2" required> 
			<input placeholder="Clasificación" type="text" id="clasificacion" class="form-control m-2" name="clasificacion" required>
	</div>

	<div id="proovForm" style="display:none">
		<input placeholder="Producto" type="text" id="producto" name="producto" class="form-control m-2" required>
	</div>


	<button type="button" id="instr" class="btn btn-outline-secondary m-3 insrt" style="display_block">Insertar cuenta</button>

</form>

<script src="/VicomNet/cont/controlador/insertCuenta/insertCuenta.js"></script>