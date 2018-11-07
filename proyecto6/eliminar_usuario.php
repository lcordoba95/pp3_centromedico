<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM usuarios WHERE id = '$_REQUEST[id]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: usuarios.php');
		$mensaje .='Usuario eliminado correctamente';
	}
?>