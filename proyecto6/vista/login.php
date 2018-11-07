<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Iniciar - CentroMedico</title>
    <link rel="stylesheet" href="css/login.css?version=1.1">
<!--     <link rel="stylesheet" href="css/login.css"> -->
    <!-- <link rel="icon" type="image/x-icon" href="img/favicon.png?version=1.1"> -->
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>
	<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
        <h2>CentroMedico</h2>
        <!-- <img src="img/icono.svg?version=1.1"> -->
        <img src="img/icono.svg">
        <input type="text" name="usuario"placeholder="Usuario" class="bordes" autofocus/>
        <input type="password" maxlength="8" name="password" placeholder="Contraseña" class="bordes"/>
        <input type="submit" value="Ingresar"></input>
        <?php  if(!empty($errores)): ?>
          <ul class="mensaje">
              <?php echo $errores; ?>
          </ul>
        <?php  endif; ?>
      </form>
</body>
</html>