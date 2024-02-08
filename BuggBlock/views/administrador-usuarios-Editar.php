<?php
require_once("../autoload.php");
session_start();
if(!isset($_SESSION["rol"])){ header("location:index.php"); }
if($_SESSION["rol"] != 0){ header("location:index.php"); }
use models\user;
$usuario = new user();
$usuario->getUserById($_POST['id']);
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
                <h3>Editar Usuario</h3>
                <form action="../controlls/editarUsuario.php" method="post">
                    <div class="input-box">
                        <input type="text" name="username" placeholder="User" class="input-control" required value="<?php echo $usuario->getUser(); ?>">
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" class="input-control" required value="<?php echo $usuario->getPass(); ?>">
                    </div>
                    <select name="role" id="role" class="select-role">
                        <option value="0" class="option-role" <?php if($usuario->getRole() == 0) { echo "selected"; } ?>>Administrador</option>
                        <option value="1" class="option-role" <?php if($usuario->getRole() == 1) { echo "selected"; } ?>>Publicador</option>
                    </select>
                    <input type="hidden" name="id" value=<?php echo $usuario->getId(); ?>>
                    <button href="Administrador.html" type="submit" class="btn">Editar</button>
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