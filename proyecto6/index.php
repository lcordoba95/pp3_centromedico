<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: CentroMedico.php');
}else{
	header('Location: login.php');
}	
?>