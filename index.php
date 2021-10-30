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
    <title>Bienvenido rosa sistema de gestion academica</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap"
		rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
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


    <!-- informacion de la pagina principal -->
    <main>
		<div class="pelicula-principal">
			<div class="contenedor">
				<h3 class="titulo">ROSA INSTITUCIONAL</h3>
				<p class="descripcion">
					Software para llevar el contror de asistencia, notas , reportes, contactar docentes, etc,YAMID AGREGAR LA PMEIRDA QUE QUIERASS
				</p>
				
			</div>
		</div>
	</main>


</body>
</html>