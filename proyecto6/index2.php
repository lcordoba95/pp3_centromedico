<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: CentroMedico2.php');
}else{
	header('Location: login.php');
}	
?>