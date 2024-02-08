<?php
    namespace controlls;
    require_once("../autoload.php");
    use models\publicaciones;
    $objpublicaciones = new publicaciones();
    $today = date("Y-m-d H:i:s");

    if($_FILES['img']['error'] == 0){
        $name_images= $objpublicaciones->GetDirImg();
        $objpublicaciones->BorrarImg($_POST['id']);
        $dir_img = $objpublicaciones->InsertarImg($name_images);
        $idinsert = $objpublicaciones->updatepublicaciones($_POST['id'],$_POST['titulo'],$_POST['contenido'],$today,$dir_img);
    } else {
        $idinsert = $objpublicaciones->updatepublicaciones($_POST['id'],$_POST['titulo'],$_POST['contenido'],$today);
    }
    header("location:../views/administrador.php");
?>