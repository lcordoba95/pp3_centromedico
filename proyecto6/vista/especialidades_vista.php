<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
	SELECT * FROM especialidades ORDER BY idespecialidad limit 5");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY ESPECIALIDADES PARA MOSTRAR';
}
?>
<?php include 'plantillas/header.php'; ?>
	</div>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>ESPECIALIDADES</h2>
					</div>
						<a class="agregar" href="agregarEspecialidades.php">Agregar Especialidades</a>
						<table class="tabla">
						  <tr>
							<th>#</th>
							<th>Nombre</th>
							<th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td class='centrar'>". $Sql['idespecialidad']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['espNombre']. "</td>"; ?>
                        <?php echo "<td class='centrar'>"."<a href='actualizarespecialidades.php?idespecialidad=".$Sql['idespecialidad']."' class='editar'>Editar</a>". "</td>"; ?>
						<td class="centrar"><a href="#" class="eliminar" onclick="preguntar(<?php echo $Sql['idespecialidad']; ?>)">Eliminar</a></td>
						</tr>
						<?php endforeach; ?>
						</table>
						<script type="text/javascript">
							function preguntar(idespecialidad){
								if (confirm('Esta seguro que desea eliminar el registro?')) {
									window.location.href = "eliminar_especialidades.php?idespecialidad=" + idespecialidad;
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