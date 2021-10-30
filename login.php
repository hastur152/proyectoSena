<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /proyectoSena');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /proyectoSena");
    } else {
      $message = 'disculpa,estas credenciales no coinciden';
    }
  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <header>
        
    <a href="index.php">rosa institucional</a>


</header>
<?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif;?>
    <div class="login-box">
      <img src="img/logo.png" class="avatar" alt="Avatar Image">
      <h1>rosa institucional</h1>
      <form action="login.php" method="post">
        <!-- USERNAME INPUT -->
        <label for="username">Username</label>
        <input type="text" name="email" placeholder="ingresa usuario">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="ingresa contraseña">
        <input type="submit" value="Entrar">
        <a href="#">¿olvidaste tu contraseña?</a><br>
        <a href="singup.php">¿no tienes cuenta?</a>
      </form>
    </div>
</body>
</html>