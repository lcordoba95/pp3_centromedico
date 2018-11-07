<?php
$mensaje='';

require 'conexion.php';

//CARGAR ESPECIALIDADES EN EL SELECT
$especialidad = $conexion -> prepare("SELECT * FROM especialidades");

$especialidad ->execute();
$especialidad = $especialidad ->fetchAll();
if(!$especialidad)
	$mensaje .= 'NO hay especialidades, por favor registre!';


//Consulto ultimo n° de legajo medico
$num= $conexion-> query("SELECT medLegajo from medicos order by medLegajo desc limit 1");
$contador=$num->fetch();
$medidult=$contador['medLegajo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medicos - CentroMedico</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Medico</h2>
						<?php echo 'Ultimo n° de legajo: '.$medidult;?><br><br>
						<input required type="numeric" name="legajo" placeholder="Legajo:">
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="email" name="correo" placeholder="Correo:">
						<input type="numeric" name="telefono" placeholder="Telefono:">
						<select name="especialidad">  
                        <?php foreach ($especialidad as $Sql): ?>
						<?php echo "<option value='". $Sql['espNombre']. "'>". $Sql['espNombre']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						<input type="submit" name="enviar" value="Agregar Medico">
						
					</form>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
					<a class="btn-regresar" href="medicos.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>

