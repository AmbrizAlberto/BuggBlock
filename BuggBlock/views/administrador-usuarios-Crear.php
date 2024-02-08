<?php
require_once("../autoload.php");
session_start();
if(!isset($_SESSION["rol"])){ header("location:index.php"); }
if($_SESSION["rol"] != 0){ header("location:index.php"); }
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
                <h3>Crear Usuario</h3>
                <form action="../controlls/crearUsuario.php" method="post">
                   <div class="input-box">
                     <input type="text" name="username" placeholder="User" class="input-control" required>
                   </div>
                  <div class="input-box">
                    <input type="password" name="password" placeholder="Password" class="input-control" required>
                  </div>
                  <select name="role" id="role" class="select-role">
                    <option value="0" class="option-role">Administrador</option>
                    <option value="1" class="option-role" selected>Publicador</option>
                  </select>
                  <button href="Administrador.html" type="submit" class="btn">Crear Usuario</button>
                </form>
                <button onclick="gotohome()" class="btn btn1">Cancelar</button>
                
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
            window.location.href="administrador-usuarios.php"
        }
    </script>
</body>
</html>