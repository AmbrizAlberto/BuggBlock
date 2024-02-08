<?php
  namespace controlls;
  session_start();
  if(!isset($_SESSION["rol"])){ header("location:../views/index.php"); }
  if($_SESSION["rol"] != 0){ header("location:../views/index.php"); die();}
  require_once("../autoload.php");
  use models\user;
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
    $objUser = new user($_POST['username'], $_POST['password'], $_POST['role']);
    $objUser->createUser();
    header("location:../views/administrador-usuarios.php");
  } else {
    header("location:../views/administrador-usuarios-Crear.php");
  }
?>