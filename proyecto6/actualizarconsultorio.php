<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	
	require 'funciones.php';
	require 'conexion.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$nombres = limpiarDatos($_POST['nombre']);
		$errores = '';

		if(empty($nombres)){
		$errores.= '<li>Por favor rellena los datos correctamente</li>';
		}
		
		if($errores==''){
			$statement = $conexion->prepare(
			"UPDATE consultorios SET
			conNombre = :nombres
			WHERE idConsultorio =:id");

			$statement ->execute(array(
				':id'=>$id,
				':nombres'=>$nombres
				));
	        header('Location: consultorios.php');
    	}
	}else{
		$id_consultorio = id_numeros($_GET['idConsultorio']);
		if(empty($id_consultorio)){
			header('Location: consultorios.php');
		}
		$consultorio = obtener_consultorio_id($conexion,$id_consultorio);
		
		if(!$consultorio){
			header('Location: consultorios.php');
		}
		$consultorio =$consultorio[0];
	}
	require 'vista/actualizarconsultorio_vista.php';
?>