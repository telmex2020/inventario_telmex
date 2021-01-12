<script type="text/javascript" src="js/generar_vales.js"></script>
<div class="col-md-12">
	<p>NUEVO VALE</p>

	<form id="generar_vale">
		<div class="form-row">
			<div class="form-group col-md-1">			
				<label for="txtID">ID</label>				
				<input type="text" name="" class="form-control form-control-sm" id="txtID" disabled>	
			</div>	
			<div class="form-group col-md-3">
				<label>Empleado</label>
				<select id="select-empleado" class="form-control form-control-sm" required>
					<option value="">Seleccione un empleado ...</option>
				</select>			
			</div>			
			<div class="form-group col-md-2">
				<label class="col-md-12">&nbsp</label>
				<input type="submit" name="" value="Generar vale" class="btn btn-primary btn-sm" id="btn-add-vale">
			</div>
			<div class="form-group col-md-2">
				<label class="col-md-12">&nbsp</label>
				<button class="btn btn-primary btn-sm" hidden id="btn-guardar-cambios">Guardar cambios</button>
			</div>
			<div class="form-group col-md-2">
				<label class="col-md-12">&nbsp</label>
				<button class="btn btn-danger btn-sm" hidden id="btn-cancelar-vale">Cancelar vale</button>
			</div>							
		</div>
	</form>
</div>

<div class="col-md-12" id="div-form-add-materiales" hidden>
	<p>AGREGAR MATERIALES</p>
	<form id="form-agregar-materiales">
		<div class="form-row">
			<div class="form-group col-md-1">
				<label>Código</label>
				<input type="text" name="" id="txt-codigo" class="form-control form-control-sm" required>
			</div>

			<div class="form-group col-md-3">
				<label>Descripción</label>
				<input type="text" name="" id="txt-descripcion" class="form-control form-control-sm" required>
			</div>	

			<div class="form-group col-md-1">
				<label>Cantidad</label>
				<input type="number" min="0" step="any" name="" id="txt-cantidad" class="form-control form-control-sm" autocomplete="off" required>
			</div>

			<div class="form-group col-md-1">
				<label class="col-md-12">&nbsp</label>
				<button class="btn" id="btn-buscar-materiales">
					<i class="fas fa-search"></i>
				</button>
			</div>

			<div class="form-group col-md-1">
				<label class="col-md-12">&nbsp</label>
				<input type="submit" name="" value="Agregar" class="btn btn-primary btn-sm">
			</div>

		</div>
	</form>	
</div>

<div class="col-md-12">
	<table class="table table-sm" id="tabla-detalle-vale">
		<thead><th>CODIGO</th><th>DESCRIPCION</th><th>CNT</th><th>U.MEDIDA</th><th>OPCION</th></thead>
		<tbody></tbody>			
	</table>
</div>
