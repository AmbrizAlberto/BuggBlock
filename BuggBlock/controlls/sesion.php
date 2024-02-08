<?php
namespace controlls;
require_once("../autoload.php");
use models\user;
session_start();
if(isset($_POST["rol"])){ header("location:../views/index.php"); }

$user = new user($_POST['username'], $_POST['password']);

if($user->getUser_db()){
    $_SESSION['rol'] = $user->getRole();
    $_SESSION['name'] = $user->getUser();
    $_SESSION['id_user'] = $user->getId();
    header("location:../views/administrador.php");
} else{
    setcookie("errorlogin", "1", time() + 3600, path: "/");
    header("location:../views/login.php");
}

?>