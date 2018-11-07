<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/limitado/pacientes2_vista.php';
}else{
	header('Location: login.php');
}
?>