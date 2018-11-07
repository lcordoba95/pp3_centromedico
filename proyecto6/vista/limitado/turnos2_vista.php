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
<?php include 'vista/plantillas/header2.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav2.php'; ?>
				<article>
					<div class="mensaje">
						<h2>TURNOS</h2>
					</div>
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
						</tr>
						<?php endforeach; ?>
						</table>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>	 
				</article>
	</section>
<?php include 'vista/plantillas/footer2.php'; ?>
</body>
</html>