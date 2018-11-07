<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CentroMedico</title>
	<link rel="stylesheet" href="css/estilos2.css?version=1.1">
	<!-- <link rel="stylesheet" href="css/estilos2.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Antic" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.png?version=1.1">
	<!-- <link rel="icon" type="image/x-icon" href="../../img/favicon.png"> -->
</head>
<body>
    <header>
		<div class="wrapp">
				<a href="index2.php" title="CentroMedico">Centro<a class="bordes" href="index2.php" title="CentroMedico">Medico</a><span>v1.0</span></a><label class="welcome">Bienvenido usuario: <b><?php echo $_SESSION['usuario']; ?></b></label>
            <div class="usuario">
                <a href="cerrar.php" title="Cerrar Sesion"> Cerrar Sesion</a>                
            </div>
		</div>
	</header>