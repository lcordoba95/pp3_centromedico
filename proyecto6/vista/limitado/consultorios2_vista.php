<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
	SELECT * FROM consultorios order by idconsultorio limit 5");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY CONSULTORIOS PARA MOSTRAR';
}
?>
<?php include 'vista/plantillas/header2.php'; ?>
	</div>
	<section class="main">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav2.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CONSULTORIOS</h2>
					</div>
						<table class="tabla">
						  <tr>
							<th>#</th>
							<th>Nombre</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td class='centrar'>". $Sql['idConsultorio']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['conNombre']. "</td>"; ?>
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