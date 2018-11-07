<?php
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		return $conexion;
	}catch(PDOException $e){
		return false;
	}
?>