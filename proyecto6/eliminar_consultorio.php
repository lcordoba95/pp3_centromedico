<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';
	$sql="DELETE FROM consultorios WHERE idconsultorio = '$_REQUEST[idConsultorio]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: consultorios.php');
		$mensaje .='Consultorio eliminado correctamente';
	}
?>