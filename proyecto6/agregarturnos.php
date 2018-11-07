<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$paciente =  $_POST['paciente'];
	$medico =  $_POST['medico'];
	$consultorio =  $_POST['consultorio'];
	$estado =  $_POST['estado'];
	$observaciones =  $_POST['observaciones'];
	$mensaje='';
	if(empty($fecha) or empty($hora)  or empty($consultorio) or empty($paciente) or empty($estado)or empty($medico)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO turnos values(null, :fecha,:hora,:paciente,:medico,:consultorio,:estado,:observaciones)');

		$statement ->execute(array(
		':fecha'=>$fecha,
		':hora'=>$hora,
		':paciente'=>$paciente,
		':medico'=>$medico,
		':consultorio'=>$consultorio,
		':estado'=>$estado,
		':observaciones'=>$observaciones
		));
		header('Location: turnos.php');
	}
}
require 'vista/agregarturnos_vista.php';
?>