
<script type="text/javascript" src="js/consultar_vales.js"></script>
<link rel="stylesheet" type="text/css" href="css/consultar_vales.css">

<ul class="nav navbar">
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Menú</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="#" class="dropdown-item" id="link_ver_vales_dia">Ver vales del día </a></li>
      <li><a href="#" class="dropdown-item" id="link_ver_vales_mes">Ver vales del mes</a></li>
      <li><a href="#" class="dropdown-item" id="link_ver_vales_rango">Ver vales por rango de fechas</a></li>
      <li><a href="#" class="dropdown-item" id="link_ver_vales_id">Buscar vales por ID</a></li>		              
    </ul>
  </li>
  <li id="li_form_busqueda_rango" hidden>
  	<form class="form form-inline" id="form_busqueda_rango">
  		De:&nbsp<input type="date" name="" class="form-control form-control-sm" id="txt_fecha_de" required>
  		&nbsp A:&nbsp<input type="date" name="" class="form-control form-control-sm" id="txt_fecha_a" required>
  		&nbsp	<input type="submit" name="" value="Buscar" class="btn btn-primary btn-sm" id="btn_buscar_por_rango">
  	</form>
  </li>
  <li id="li_form_busqueda_id" hidden>
  	<form class="form form-inline" id="form_busqueda_id">
  		ID: <input class="form-control form-control-sm" type="number" name="" id="txt_id_buscar" required>
  		&nbsp <input type="submit" name="" value="Buscar" class="btn btn-primary btn-sm" id="btn_buscar_por_id">
  	</form>
  </li>
</ul>


<div class="hold-transition layout-top-nav col-md-12">
	<div class="wrapper">
		<div class="content" id="div_tabla_consulta_vales">
			<br>
			<p id="titulo_tabla_consulta"></p>
			<br>
			<table class="table table-sm" id="tabla_consulta_vales">
				<thead>
					<th>ID</th><th>FECHA</th><th>HORA</th><th>USUARIO</th><th>EMPLEADO</th><th>STATUS</th><th>OPCION</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>		
		</div>	
	</div>

		
</div>



