<?php
  namespace controlls;
  session_start();
  if(!isset($_SESSION["rol"])){ header("location:../views/index.php"); }
  if($_SESSION["rol"] != 0){ header("location:../views/index.php"); die();}
  require_once("../autoload.php");
  use models\user;
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['id'])){
    $objUser = new user($_POST['username'], $_POST['password'], $_POST['role']);
    if(!$objUser->editUser($_POST['id'], $_SESSION['id_user'])){
      setcookie("errorloginedit", "OneAdmin", time() + 3600, path: "/");
      header("location:../views/administrador-usuarios.php");
    } else{
      header("location:../views/administrador-usuarios.php");
    }
  } else {
    setcookie("errorloginedit", "errorParams", time() + 3600, path: "/");
    header("location:../views/administrador-usuarios.php");
  }
?>