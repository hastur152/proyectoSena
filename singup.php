<?php
    require 'database.php';

    $message = '';
  
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
  
      if ($stmt->execute()) {
        $message = 'USUARIO CORRECTAMENTE CREADO';
      } else {
        $message = 'DISCULPA OCURRIO UN PROBLEMA AL CREAR TU USUARIO VERIFICA TU EMAIL Y CONTRASEÑA';
      }
    }
  ?>

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
    <title>Document</title>
</head>
<body>




<header>
        
        <a href="singup.php">registrandote en rosa institucional</a>
    
    
    </header>


    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif;?>

    <div class="login-box">
      <img src="img/logo.png" class="avatar" alt="Avatar Image">
      <h1>crear cuenta</h1>
      <form action="singup.php" method="post">
        <!-- USERNAME INPUT -->
        <label for="correo">ingrese correo</label>
        <input type="text" name="email" placeholder="ingresa tu correo">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="ingresa contraseña">
        <input type="password" name="confirm_password" placeholder="confirme contraseña">
        <input type="submit" value="Entrar">
        
        <a href="login.php">¿ya tienes cuenta?</a>
      </form>
    </div>
</body>
</html>