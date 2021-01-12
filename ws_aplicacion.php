<?php 
	$peticion=isset($_POST['peticion'])?$_POST['peticion']:$_GET['peticion'];


	switch ($peticion)
	{
		case 'iniciar_sesion':

			$usuario=isset($_POST['usuario'])?$_POST['usuario']:$_GET['usuario'];
			session_start();
			$_SESSION['user_inv_telmex']=$usuario;
			echo "iniciada sesion para $usuario";

			break;

		case 'cerrar_sesion':
			
			session_start();
			unset($_SESSION['user_inv_telmex']);

			break;
		
		default:
			# code...
			break;
	}
 ?>