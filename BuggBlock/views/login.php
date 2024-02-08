<?php
session_start();
if(isset($_SESSION["rol"])){ header("location:index.php"); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Diseño.css">
    <link rel="shortcut icon" href="images/LogoE.ico"/>
    <title>BuggBlock</title>
</head>
<body>
    <header>
    <section class="form-main">
        <div class="form-content">
            <div class="box">
                <img src="images/LogoLog.png">
                <h3>Login</h3>
                <form action="../controlls/sesion.php" method="post">
                   <div class="input-box">
                     <input type="text" name="username" placeholder="User" class="input-control" required>
                   </div>
                  <div class="input-box">
                    <input type="password" name="password" placeholder="Password" class="input-control" required>
                    <!--
                    <div class="input-link">
                        <a href="" class="gradient-text">¿Contraseña Olvidada?</a>
                    </div>
                -->
                  </div>
                  <?php if (isset($_COOKIE["errorlogin"])) {
                    echo "<p class='errorMsg'>Datos incorrectos</p>";
                    setcookie("errorlogin", "", time() - 3600, path: "/");
                    }?>
                  <button href="Administrador.html" type="submit" class="btn">Iniciar Sesión</button>
                </form>
                <button onclick="gotohome()" class="btn btn1">Regresar Como Visitante</button>
                
            </div>
        </div>
    </section>
    <section>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </section>
    <script>
        function gotohome(){
            window.location.href="index.php"
        }
    </script>
</body>
</html>