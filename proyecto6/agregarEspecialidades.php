<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$mensaje='';

	if(empty($nombre)){
		$mensaje.= '<li>Por favor rellena los datos correctamente</li>';
	}
	

	if($mensaje==''){
		$statement = $conexion->prepare("INSERT INTO especialidades values(null,:nombre)");

		$statement ->execute(array( 
		':nombre'=> $nombre
		));
		header('Location: especialidades.php');
	}
}
require 'vista/agg_especialidades_vista.php';
?>