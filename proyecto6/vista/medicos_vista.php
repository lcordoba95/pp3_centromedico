<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
	SELECT * FROM medicos ORDER BY medLegajo");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY MEDICOS PARA MOSTRAR';
}
?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
						<a href="agregarmedicos.php"class="agregar">Agregar Medico</a>
						
						<table class="tabla">
						  <tr>
						  	<th>#</th>
							<th>Legajo</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Correo</th>
							<th>Especialidad</th>
							<th colspan ="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr >
						<?php echo "<td class='centrar'>". $Sql['idMedico']. "</td>"; ?>
						<?php echo "<td class='centrar'>". $Sql['medLegajo']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['mednombres']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['medapellidos']. "</td>"; ?>
						<?php echo "<td>". $Sql['medcorreo']. "</td>"; ?>
						<?php echo "<td >". $Sql['medEspecialidad']. "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='actualizarmedico.php?idMedico=".$Sql['idMedico']."' class='editar'>Editar</a>". "</td>"; ?>
						<td class="centrar"><a href="#" class="eliminar" onclick="preguntar(<?php echo $Sql['idMedico']; ?>)">Eliminar</a></td>
						</tr>
						<?php endforeach; ?>
						</table>
						<script type="text/javascript">
							function preguntar(idMedico){
								if (confirm('Esta seguro que desea eliminar el registro?')) {
									window.location.href = "eliminar_medico.php?idMedico=" + idMedico;
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