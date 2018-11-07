<?php
require 'conexion.php';

//Consulto ultimo n° de identificacion paciente
$num= $conexion-> query("SELECT pacIdentificacion from pacientes order by pacIdentificacion desc limit 1");
$contador=$num->fetch();
$pacidult=$contador['pacIdentificacion'];
?>

<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PACIENTES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Pacientes</h2>
						<?php echo 'Ultimo n° de identificacion: '.$pacidult;?><br><br>
						<input required type="numeric" name="identificacion" placeholder="Identificación:">
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:">
						<select name="sexo">
                            <option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option> 
                        </select>
						<input type="submit" name="enviar" value="Agregar Paciente">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
					<a class="btn-regresar" href="pacientes.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>