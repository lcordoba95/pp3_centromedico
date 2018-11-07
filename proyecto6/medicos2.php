<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/limitado/medicos2_vista.php';
}else{
	header('Location: login.php');
}
?>