<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>EDITAR MEDICO</h2>
						<input type="hidden" name="id" value="<?php echo $medico['idMedico'];?>" />
						<label>Legajo:</label>
						<input type="numeric" name="legajo" placeholder="Legajo" value="<?php echo $medico['medLegajo'];?>" requerid>
						<label>Nombre/s:</label>
						<input type="text" name="nombres" placeholder="Nombres:" value="<?php echo $medico['mednombres'];?>">
						<label>Apellido/s:</label>
						<input type="text" name="apellidos" 
                            placeholder="Apellidos:"   value="<?php echo $medico['medapellidos'];?>">
                        <label>E-mail:</label>
						<input type="email" name="correo" placeholder="Correo:" value="<?php echo $medico['medcorreo'];?>">
						<label>Telefono:</label> 
						<input type="numeric" name="telefono" placeholder="Telefono:" value="<?php echo $medico['medtelefono'];?>">
						<label>Especialidad:</label>
						<select name="especialidad">
							<option value="<?php echo $medico['medEspecialidad'];?>"><?php echo $medico['medEspecialidad'];?></option>
						</select>
						<input type="submit" name="enviar" value="Actualizar">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
                    <a class="btn-regresar" href="medicos.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>