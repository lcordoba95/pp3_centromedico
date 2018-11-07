<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>USUARIOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <h2>EDITAR USUARIOS</h2><br/>
            <input type="hidden" name="id" value="<?php echo $user['id'];?>">
            <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $user['usuario'];?>" autofocus/>
            <input type="text" name="password" placeholder="Contraseña" value=""/>
            <input type="text" name="nombres" placeholder="Nombres" value="<?php echo $user['nombres'];?>"/>
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $user['apellidos'];?>"/>
            <select name="rol">
              <option value="Limitado">Limitado</option>
              <option value="admin">Admin</option>              
            </select>
            <input type="submit" value="Actualizar" />
              <?php  if(!empty($errores)): ?> 
                <ul>
                  <?php echo $errores; ?>
                </ul>
              <?php  endif; ?>
          </form>
          <a class="btn-regresar" href="usuarios.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>
</html>