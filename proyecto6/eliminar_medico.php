<?php
	$errores='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM medicos WHERE idMedico = '$_REQUEST[idMedico]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: medicos.php');
		$errores .='Medico eliminado correctamente';
	}
?>