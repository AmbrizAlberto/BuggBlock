<?php
    namespace controlls;
    require_once("../autoload.php");
    use models\publicaciones;
    $objpublicaciones = new publicaciones();
    $iddelete = $objpublicaciones->deletepublicaciones($_POST['id']);
    header("location:../views/administrador.php");
?>