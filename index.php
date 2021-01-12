<?php 	
	session_start();

	if (isset($_SESSION['user_inv_telmex']))
	{
		header("Location:principal.php");
	}
	else
	{
		header("Location:login.php");
	}
 ?>