<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombres']),FILTER_SANITIZE_STRING);
	$apellidos = $_POST['apellidos'];
	$correo =  $_POST['correo'];
	$legajo =  $_POST['legajo'];
	$especialidad =  $_POST['especialidad'];
	$telefono =  $_POST['telefono'];
	$mensaje='';
	if(empty($nombre) or empty($apellidos)  or empty($legajo)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		$statement = $conexion -> prepare(
			'SELECT * FROM medicos WHERE idMedico = :id LIMIT 1');
		$statement ->execute(array(':id'=>$legajo));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='El nombre de usuario ya existe </br>';
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO medicos (idMedico,medLegajo,mednombres,medapellidos,
		medEspecialidad,medtelefono,medcorreo)
		values(null, :id,:nombre,:apellidos,:especialidad,:telefono,:correo)');

		$statement ->execute(array(
		':id'=>$legajo,
		':nombre'=> $nombre,
		':apellidos'=>$apellidos,
		':especialidad'=>$especialidad,
		':telefono'=>$telefono,
		':correo'=>$correo
		));
		header('Location: medicos.php');
	}
}
require 'vista/agg_medicos_vista.php';
?>