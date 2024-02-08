<?php
  namespace controlls;
  session_start();
  if(!isset($_SESSION["rol"])){ header("location:../views/index.php"); }
  if($_SESSION["rol"] != 0){ header("location:../views/index.php"); die();}
  require_once("../autoload.php");
  use models\user;
  $usuario = new user();
  if (!$usuario->deleteUser($_POST['id'])) {
    setcookie("errorlogindelete", "error", time() + 3600, path: "/");
  }
  header("location:../views/administrador-usuarios.php");
?>