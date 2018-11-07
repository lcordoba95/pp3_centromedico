<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	require 'funciones.php';
	require 'conexion.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$usuario = limpiarDatos($_POST['usuario']);
		$pass = limpiarDatos($_POST['password']);
		$nombres = limpiarDatos($_POST['nombres']);
		$apellidos = limpiarDatos($_POST['apellidos']);
		$rol = limpiarDatos($_POST['rol']);
		$errores ='';

		$pass = hash('sha512',$pass);

		$statement = $conexion -> prepare(
			'SELECT * FROM usuarios WHERE usuario = :usuario AND id != :id LIMIT 1');
		$statement ->execute(array(':usuario'=>$usuario,':id'=>$id));
		$resultado= $statement->fetch();

		if($resultado != false){
			$errores .='<li>El nombre de usuario ya existe</li>';
		}
		
		if($errores==''){
			if (empty($_POST['password'])) {
				$statement = $conexion->prepare(
				"UPDATE usuarios
		        SET usuario = :usuario, 
				nombres =:nombres, 
				apellidos =:apellidos, 
				rol =:rol 
				WHERE id = :id");
				$statement ->execute(array(
		        ':usuario'=>$usuario,
				':nombres'=>$nombres, 
				':apellidos'=>$apellidos, 
				':rol'=>$rol,
		        ':id'=> $id
		        ));
		        header('Location: usuarios.php');
			}else{
				$statement = $conexion->prepare(
				"UPDATE usuarios
		        SET usuario = :usuario, 
				pass =:password, 
				nombres =:nombres, 
				apellidos =:apellidos, 
				rol =:rol 
				WHERE id = :id");

				$statement ->execute(array(
		        ':usuario'=>$usuario, 
				':password'=>$pass, 
				':nombres'=>$nombres, 
				':apellidos'=>$apellidos, 
				':rol'=>$rol,
		        ':id'=> $id
		        ));
		        header('Location: usuarios.php');
			}
    	}
	}else{
		$id_usuario = id_numeros($_GET['id']);
		if(empty($id_usuario)){
			header('Location: usuarios.php');
		}
		$user = obtenerUser_id($conexion,$id_usuario);
		
		if(!$user){
			header('Location: usuarios.php');
		}
		$user =$user[0];
	}
	require 'vista/actualizarusuario_vista.php';
?>