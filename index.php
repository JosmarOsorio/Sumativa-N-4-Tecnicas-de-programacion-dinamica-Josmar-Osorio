<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form </title>
  <link rel="stylesheet" href="CSS/loginStyle.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="wrapper">
    <form method="post" action="">
      <h1>Inicio de sesión</h1>
      <?php
      include "php/conxion.php";
      include "php/controlador_login.php";
      
      ?>
      <div class="input-box">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Contraseña" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Recordarme</label>
        <a href="#">Olvidé mi contraseña</a>
      </div>
      <button name="btningresar" type="submit" class="btn">Iniciar Sesión</button>
      <div class="register-link">
        <p>No tienes cuenta? <a href="#">Registrate</a></p>
      </div>
    </form>
  </div>
</body>
</html>