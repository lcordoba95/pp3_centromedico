<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/limitado/consultorios2_vista.php';
}else{
	header('Location: index.php');
}
?>