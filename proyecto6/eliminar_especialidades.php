<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM especialidades WHERE idespecialidad = '$_REQUEST[idespecialidad]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: especialidades.php');
		$mensaje .='Especialidad eliminada correctamente';
	}
?>