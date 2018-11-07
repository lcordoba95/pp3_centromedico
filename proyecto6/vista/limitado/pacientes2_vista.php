<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
	SELECT * FROM pacientes");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY PACIENTES PARA MOSTRAR';
}
?>
<?php include 'vista/plantillas/header2.php'; ?>
	</div>
	<section class="main">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav2.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PACIENTES</h2>
					</div>
					<table class="tabla">
						  <tr>
							<th>Identificacion</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Fecha Nacimiento</th>
							<th>Sexo</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
							<?php echo "<td>". $Sql['pacIdentificacion']. "</td>"; ?>
							<?php echo "<td class='mayusculas'>". $Sql['pacNombre']. "</td>"; ?>
							<?php echo "<td class='mayusculas'>". $Sql['pacApellidos']. "</td>"; ?>
							<?php echo "<td>". $Sql['pacFechaNacimiento']. "</td>"; ?>
							<?php echo "<td>". $Sql['pacSexo']. "</td>"; ?>
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