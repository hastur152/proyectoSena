<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\formularios.css">
</head>
<body>
        <!-- COPIAR TODA ESTA LINEA YA QUE ES EL MENU DE NAVEGACION  -->
<?php if(!empty($user)): ?>
      <header>
		<div class="contenedor">
			<h2 class="logotipo">Rosa Institucional</h2>
			<nav>
				<a href="index.php" class="activo">Inicio</a>
				<a href="Asistencia.php">Ingreso Asistencia</a>
				<a href="Notas.php">Ingreso notas</a>
				<a href="Estudiantes.php">Estudiantes</a>
				<a href="ConsultarNotas.php">consultar Notas</a>
				<a href="contactar.php">contactar docente</a>
				<a href="logout.php">salir</a>
			</nav>
		</div>
	</header>
    <?php else: ?>
      <header>
		<div class="contenedor">
			<h2 class="logotipo">Rosa Institucional</h2>
			<nav>
     <a href="login.php">iniciar seccion</a>
      </nav>
    </div>
      </header>
     <?php endif; ?> 
     <!-- ACA TERMINA EL MENU DE NAVEGACION -->

    <form action="">

        <h2>CONSULTAR NOTAS</h2>
        <input type="text" name="curso" placeholder="Ingresa el curso">
        <input type="text" name="Nombre" placeholder="Ingresa asignatura">
        <input type="text" name="Nombre" placeholder="Ingresa el Nombre de estudiante">
        <input type="text" name="Nombre" placeholder="Ingresa de que corte quiere ver la nota">

        <textarea name="mensaje" placeholder="¿mostrar la nota en el place holder?" ></textarea>
        <input type="button" value="ENVIAR" id="boton">

    </form>
</body>
</html>