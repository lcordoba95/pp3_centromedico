<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PACIENTES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<!-- 		RETOMAR DESDE AQUI	 -->				
						<h2>EDITAR PACIENTE</h2>
<!-- dadadadasdas -->
						<input type="hidden" name="id" value="<?php echo $paciente['idPaciente'];?>" />
						<label>Identificacion:</label>
						<input type="numeric" name="identificacion" placeholder="Identificación" value="<?php echo $paciente['pacIdentificacion'];?>" requerid>
						<label>Nombre/s:</label>
						<input type="text" name="nombres" placeholder="Nombres:" value="<?php echo $paciente['pacNombre'];?>">
						<label>Apellido/s:</label>
						<input type="text" name="apellidos" 
                            placeholder="Apellidos:"   value="<?php echo $paciente['pacApellidos'];?>">
                        <label>Fec. Nacimiento:</label>
						<input type="date" name="nacimiento" value="<?php echo $paciente['pacFechaNacimiento'];?>"> 
						<label>Sexo:</label> 
						<select name="sexo">
							<option value="<?php echo $paciente['pacSexo'];?>"><?php echo $paciente['pacSexo'];?></option>
						</select>
						<input type="submit" name="enviar" value="Actualizar">
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