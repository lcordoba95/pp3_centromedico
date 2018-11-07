<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombres']),FILTER_SANITIZE_STRING);
	$apellidos = $_POST['apellidos'];
	$identificacion =  $_POST['identificacion'];
	$sexo =  $_POST['sexo'];
	$fecha =  $_POST['fechaNacimiento'];
	$mensaje='';
	if(empty($nombre) or empty($apellidos)  or empty($identificacion)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		$statement = $conexion -> prepare(
			'SELECT * FROM pacientes WHERE idPaciente = :id LIMIT 1');
		$statement ->execute(array(':id'=>$identificacion));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='Ya existe un paciente con esa identificación </br>';
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO pacientes
		values(null, :id,:nombre,:apellidos,:fecha,:sexo)');

		$statement ->execute(array(
		':id'=>$identificacion,
		':nombre'=> $nombre,
		':apellidos'=>$apellidos,
		':fecha'=>$fecha,
		':sexo'=>$sexo
		));
		header('Location: pacientes.php');
	}
}
require 'vista/agg_pacientes_vista.php';
?>