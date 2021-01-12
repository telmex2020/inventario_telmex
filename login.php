<?php 
	session_start();

	if (isset($_SESSION['user_inv_telmex']))
	{
		header("Location:principal.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Inventario TELMEX COPE Huauchinango
	</title>
	<link rel="icon" type="img/jpg" href="img/shortcut.jpg">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.5.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<script type="text/javascript" src="AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/crypto-js/src/core.js"></script>
	<script type="text/javascript" src="js/crypto-js/src/md5.js"></script>
	<script type="text/javascript" src="js/login.js"></script>	

</head>
<body>

<span id="ws" hidden></span>
<span id="nombre-ws" hidden></span>

<div id="div-form-login">

	<div id="div-header-form">
		<p>SISTEMA DE INVENTARIO TELMEX COPE HUAUCHINANGO</p>		
	</div>
	<div id="div-logo"><img src="img/shortcut.jpg"></div>	
	<br>	
	<div id="div-formulario">
		<form id="form-login" class="form">					
			<div class="form-group">			
				<input type="text" name="usuario" class="form-control" placeholder="Usuario" autocomplete="off" required>
			</div>
			<div class="form-group">			
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>

			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Ingresar" id="btn-login">
			</div>
		</form>		
	</div>

</div>

</body>
</html>