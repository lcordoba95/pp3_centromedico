<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
		SELECT 	* FROM turnos order by idturno limit 10");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY TURNOS PARA MOSTRAR';
}
?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>TURNOS</h2>
					</div>
					<a class="agregar" href="agregarTurnos.php">Agregar Turnos</a>
					<table class="tabla">
						  <tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Medico</th>
							<th>Consultorio</th>
							<th>Estado</th>
							<th>Motivo de la consulta</th>
							<th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td class='mayusculas'>". $Sql['idturno']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turfecha']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turhora']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turPaciente']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turMedico']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turConsultorio']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turestado']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['turobservaciones']. "</td>"; ?>
                        <?php echo "<td class='centrar'>"."<a href='actualizarturnos.php?idturno=".$Sql['idturno']."' class='editar'>Editar</a>". "</td>"; ?>
						<td class="centrar"><a href="#" class="eliminar" onclick="preguntar(<?php echo $Sql['idturno']; ?>)">Eliminar</a></td>
						</tr>
						<?php endforeach; ?>
						</table>
						<script type="text/javascript">
							function preguntar(idturno){
								if (confirm('Esta seguro que desea eliminar el registro?')) {
									window.location.href = "eliminar_turnos.php?idturno=" + idturno;
								}
							}
						</script>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>	 
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>