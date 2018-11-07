<?php
	$errores='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM pacientes WHERE idPaciente = '$_REQUEST[idPaciente]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: pacientes.php');
		$errores .='Paciente eliminado correctamente';
	}
?>