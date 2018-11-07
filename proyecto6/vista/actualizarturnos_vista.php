<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>TURNOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>EDITAR TURNO</h2>
						<input type="hidden" name="id" value="<?php echo $turno['idturno'];?>" />
						<label>Fecha:</label>
						<input type="date" name="fecha" value="<?php echo $turno['turfecha'];?>">
						<label>Hora:</label>  
						<input type="time" name="hora" max="20:30" min="08:00" step="60" value="<?php echo $turno['turhora'];?>" required>
						<label>Paciente:</label>
						<input type="text" name="paciente" value="<?php echo $turno['turPaciente'];?>">
						<label>Medico:</label>
						<input type="text" name="medico" value="<?php echo $turno['turMedico'];?>">
						<label>Consultorio:</label>
						<input type="text" name="consultorio" value="<?php echo $turno['turConsultorio'];?>">
						<label>Estado:</label>
						<select name="estado">
							<option value="asignado">Asignado</option>
                        	<option value="atendido">Atendido</option>
                        </select>
						<label>Motivo de la consulta:</label>
						<input type="textarea" name="observaciones" value="<?php echo $turno['turobservaciones'];?>">
						<input type="submit" name="enviar" value="Actualizar">
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
                    <a class="btn-regresar" href="turnos.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>
