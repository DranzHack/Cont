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
