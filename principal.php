<?php  
    session_start();

    if (!isset($_SESSION['user_inv_telmex']))
    {
      header("Location:login.php");
    }

    echo "<span id='user' hidden>".$_SESSION['user_inv_telmex']."</span>";
 ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>
		Inventario TELMEX COPE Huauchinango
	</title>
	<link rel="icon" type="img/jpg" href="img/shortcut.jpg">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  <span id="ws" hidden></span>
  <span id="nombre-ws" hidden></span>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Usuario</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Cerrar Sesión</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
<!--     <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> -->
    </form>

   </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/shortcut.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TELMEX COPE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Vales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id="link-generar-vale">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Generar vale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" id="link-consultar-vales">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Consultar vales</p>
                </a>
              </li>
            </ul>
          </li>

         <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" id="link-movimientos">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Movimientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fas fa-boxes nav-icon"></i>
                  <p>Gestión de inventario</p>
                </a>
              </li>           
            </ul>
          </li>

         <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>         
            </ul>
          </li>



  <!--         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row" id="contenedor-principal">
        	<!-- CONTENEDOR PRINCIPAL DE LA PAGINA -->	

        	<!-- CONTENEDOR PRINCIPAL DE LA PAGINA -->
        </div>



          <!-- MODAL BUSQUEDA -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBusquedaMaterial" id="btn-modal-busqueda" hidden >Busqueda</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalBusquedaMaterial">
            <div class="modal-dialog modal-lg">   
              <div class="modal-content">
                <div class="modal-header">
                  BUSQUEDA DE MATERIAL
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn-cerrar-modal-busqueda">
                    <span aria-hidden="true">&times;</span>
                  </button>                  
                </div>
                <div class="modal-body" id="body-busqueda-materiales">
                  
                </div>
              </div>
            </div>
          </div>  


          <!-- MODAL BUSQUEDA DETALLE VALES -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetalleVale" id="btn-modal-detalle" hidden>DetalleVale</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalDetalleVale">
            <div class="modal-dialog modal-lg">   
              <div class="modal-content">
                <div class="modal-header">
                 <p>DETALLE DE VALE</p> 

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn-cerrar-modal-detalle">
                    <span aria-hidden="true">&times;</span>
                  </button>                  
                </div>
                <div class="alert alert-danger" id="modal_danger">Atencion: Debe guardar cambios para descontar el vale del inventario</div>
      
                <div class="modal-body" id="body-detalle-vales">    

                  <form class="form">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label class="col-md-12">ID VALE:</label>
                        <input class="form-control form-control-sm" id="txt_modal_id_vale" type="text" name="" disabled>
                      </div> 
                      <div class="form-group col-md-3">
                        <label class="col-md-12">STATUS:</label>
                        <input class="form-control form-control-sm" id="txt_modal_status_vale" type="text" name="" disabled>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="col-md-12">FECHA:</label>
                        <input class="form-control form-control-sm" id="date_modal_fecha_vale" type="date" name="" disabled>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="col-md-12">HORA:</label>
                        <input class="form-control form-control-sm" id="time_modal_hora_vale" type="time" name="" disabled>
                      </div>                                                                                         
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label class="col-md-12">USUARIO:</label>
                        <input class="form-control form-control-sm" id="txt_modal_usuario_vale" type="text" name="" disabled>
                      </div>

                      <div class="form-group col-md-3">
                        <label class="col-md-12">EMPLEADO:</label>
                        <select class="form-control form-control-sm" id="select_modal_empleado_vale"></select>
                      </div>

                      <div class="form-group col-md-2">
                        <label class="col-md-12">&nbsp</label>
                        <input class="btn btn-primary btn-sm" type="submit" name="" value="Guardar cambios" id="btn-guardar-cambios-detalle">
                      </div> 

                      <div class="form-group col-md-2">
                        <label class="col-md-12">&nbsp</label>
                        <input class="btn btn-danger btn-sm" type="submit" name="" value="Cancelar vale" id="btn-cancelar-vale-detalle">
                      </div>                                                                       
                    </div>
                  </form>

                  <table class="table table-sm" id="modal_tabla_detalle_vale">      
                    <thead><th>CODIGO</th><th>DESCRIPCIÓN</th><th>CANTIDAD</th><th>U.MED</th><th>OPCIÓN</th></thead>
                    <tbody></tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>                  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      ITSH
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="#">TELMEX COPE HUAUCHINANGO</a>.</strong> Desarrollado por: .
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- DataTables   -->
<script src="AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="AdminLTE-3.0.5/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE-3.0.5/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE-3.0.5/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE-3.0.5/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.html5.min.js"> </script>
<script src="AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.print.min.js"> </script>
<script src="AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.colVis.min.js"> </script>
<script src="AdminLTE-3.0.5/plugins/datatables-select/js/dataTables.select.min.js"> </script>
<script src="AdminLTE-3.0.5/plugins/datatables-select/js/select.bootstrap4.min.js"> </script>
<!-- SCRIPTS PROPIOS -->
<script type="text/javascript" src="js/principal.js"></script>
</body>
</html>
