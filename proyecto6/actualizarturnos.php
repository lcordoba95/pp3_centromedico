<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	
	require 'funciones.php';
	require 'conexion.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$fecha = limpiarDatos($_POST['fecha']);
        $hora = limpiarDatos($_POST['hora']);
        $estado = limpiarDatos($_POST['estado']);
        $observaciones = limpiarDatos($_POST['observaciones']);
		
		$statement = $conexion->prepare(
		"UPDATE turnos SET
        turfecha = :fecha,
        turhora = :hora,
        turestado = :estado,
        turobservaciones = :observaciones
		WHERE idturno =:id");

		$statement ->execute(array(
			':id'=>$id,
			':fecha'=> $fecha,
            ':hora'=> $hora,
            ':estado'=> $estado,
            ':observaciones'=> $observaciones
			));
        header('Location: turnos.php');
	}else{
		$id_turno = id_numeros($_GET['idturno']);
		if(empty($id_turno)){
			header('Location: turnos.php');
		}
		$turno = obtener_turno_id($conexion,$id_turno);
		
		if(!$turno){
			header('Location: turnos.php');
		}
		$turno =$turno[0];
	}
	require 'vista/actualizarturnos_vista.php';
?>