<?php session_start();
if(!isset($_SESSION['usuario']))
header('Location: login.php');

require('vista/limitado/turnos2_vista.php');
?>