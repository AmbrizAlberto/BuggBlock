<?php
    namespace controlls;
    session_start();
    if(!isset($_SESSION["rol"])){ header("location:../views/index.php"); }
    require_once(".. /autoload.php");
    use models\publicaciones;
    $publicacion = new publicaciones();
    $today = date("Y-m-d H:i:s");
    if(!isset($_POST['titulo']) or !isset($_POST['contenido'])){
        header("location:../views/administrador-Editor.php");
    } else {
        if($_FILES['img']['error'] == 0){
            $name_images= $publicacion->GetDirImg();
            $dir_img = $publicacion->InsertarImg($name_images);
            $publicacion->Insertar($today, $_POST['titulo'], $_POST['contenido'], $_SESSION['id_user'],$dir_img);
            header("location:../views/administrador.php");
        }else{
            $publicacion->Insertar($today, $_POST['titulo'], $_POST['contenido'], $_SESSION['id_user']);
            header("location:../views/administrador.php");
        }
    }
?>