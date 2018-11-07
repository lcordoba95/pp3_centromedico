<?php
	$errores='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM turnos WHERE idturno = '$_REQUEST[idturno]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: turnos.php');
		$errores .='Turno eliminado correctamente';
	}
require 'vista/turnos_vista.php';
?>