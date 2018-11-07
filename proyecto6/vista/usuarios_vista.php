<?php
$mensaje='';

require 'conexion.php';

$consulta = $conexion -> prepare("
	SELECT * FROM usuarios limit 5");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY USUARIOS PARA MOSTRAR';
}
?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>USUARIOS</h2>
					</div>
					<a class="agregar" href="registrarusuarios.php">Agregar Usuarios</a>
						<table class="tabla">
						  <tr>
						  	<th>#</th>
                            <th>Usuario</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Rol</th>
                            <th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
							<?php echo "<td class='centrar'>". $Sql['id']. "</td>"; ?>
                            <?php echo "<td>". $Sql['usuario']. "</td>"; ?>
							<?php echo "<td>". $Sql['nombres']. "</td>"; ?>
                            <?php echo "<td>". $Sql['apellidos']. "</td>"; ?>
                            <?php echo "<td>". $Sql['rol']. "</td>"; ?>
                            <?php echo "<td class='centrar'>"."<a href='actualizarusuario.php?id=".$Sql['id']."' class='editar'>Editar</a>". "</td>"; ?>
                            <!--Condicion para no poder eliminar el usuario ADMIN-->
                            <?php if ($Sql['id'] != 1) {
                            	
                            ?>
						  		<td class="centrar"><a href="#" class="eliminar" onclick="preguntar(<?php echo $Sql['id']; ?>)">Eliminar</a></td>
						  	<?php } ?>
						</tr>
						<?php endforeach; ?>
						</table>
						<script type="text/javascript">
							function preguntar(id){
								if (confirm('Esta seguro que desea eliminar el registro?')) {
									window.location.href = "eliminar_usuario.php?id=" + id;
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