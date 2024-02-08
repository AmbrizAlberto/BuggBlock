<?php
namespace models;
use PDO;
class publicaciones extends conexion{
    private $fecha_creacion;
    private $strtitulo;
    private $strcontenido;
    private $fecha_edicion;
    private $id_user;
    private $dir_img;

    public function __construct(){
        parent::__construct();
    }

    public function Insertar(string $fecha_creacion, string $titulo, string $contenido, int $id_user, $img = null){
        $this->fecha_creacion = $fecha_creacion;
        $this->strtitulo = $titulo;
        $this->strcontenido = $contenido;
        $this->id_user = $id_user;
        $this->dir_img=$img;

        $sql="INSERT INTO publicaciones(fecha_creacion,titulo,contenido,id_user,dir_img) VALUES(?,?,?,?,?)";
        $insert= $this->conn->prepare($sql);
        $arrData= array($this->fecha_creacion,$this->strtitulo,$this->strcontenido, $this->id_user, $this->dir_img);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conn->lastInsertId();
        return $idInsert;
    }

    public function getpublicaciones(){
        $sql="SELECT * FROM publicaciones ORDER BY fecha_creacion DESC";
        $execute = $this->conn->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    
    public function getPublicacionesWithPublisher(){
        $sql = "SELECT p.id_publicaciones, p.titulo, p.fecha_creacion, p.fecha_edicion, p.dir_img, u.username
        FROM publicaciones p
        INNER JOIN users u
        ON p.id_user = u.id
        ORDER BY p.fecha_creacion DESC";
        $execute = $this->conn->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function getpublicacionesbyautor($id_user){
        $sql = "SELECT * FROM publicaciones WHERE id_user = $id_user ORDER BY fecha_creacion DESC";
        $execute = $this->conn->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function getpublicacionById($id){
        $sql="SELECT * FROM publicaciones WHERE id_publicaciones = $id";
        $execute = $this->conn->query($sql);
        $request = $execute->fetch();
        return $request;
    }

    public function updatepublicaciones(int $id, string $titulo, string $contenido, string $fecha_edicion, $img=null){
        $this->fecha_edicion = $fecha_edicion;
        $this->strtitulo = $titulo;
        $this->strcontenido = $contenido;
        $this->dir_img = $img;
        if($img){
            $sql="UPDATE publicaciones SET fecha_edicion=?,titulo=?,contenido=?,dir_img=? WHERE id_publicaciones=$id";
            $update= $this->conn->prepare($sql);
            $arrdatos= array($this->fecha_edicion,$this->strtitulo,$this->strcontenido,$this->dir_img);
        } else{
            $sql="UPDATE publicaciones SET fecha_edicion=?,titulo=?,contenido=? WHERE id_publicaciones=$id";
            $update= $this->conn->prepare($sql);
            $arrdatos= array($this->fecha_edicion,$this->strtitulo,$this->strcontenido);
        }
        $resexecute = $update->execute($arrdatos);
        return $resexecute;
    }

    public function deletepublicaciones(int $id){
        $sql="DELETE FROM publicaciones WHERE id_publicaciones=?";
        $arrwhere =array($id);
        $delete= $this->conn->prepare($sql);
        $del = $delete->execute($arrwhere);
        return $del;
    }

    public function InsertarImg($name_images){
        if(isset($_FILES['img'])){

            $file =$_FILES['img'];
            $file_name=$file['name'];
            $mimetype=$file['type'];
            
            $ext_formatos=array("image/jpeg", "image/jpg","image/png");
            if(!in_array($mimetype,$ext_formatos)){
                header("location:../views/administrador-Crear.php");
                die();
            }
            $directorio="imagenes_publicaciones/";

            if(in_array($directorio.$file_name, $name_images)){
                header("location:../views/administrador-Crear.php");
                die("Esta imagen a sido usada anteriormente, por lo que debe escoger otra");
            }

            if(!is_dir("../views/".$directorio)){
                mkdir("../views/".$directorio,0777);
            }
            move_uploaded_file($file['tmp_name'],"../views/".$directorio.$file_name);
            return $directorio.$file_name;

        }else{
            header("location:../views/administrador-Crear.php");
        }       
    }
    public function BorrarImg($idPost){
        $post = $this->getpublicacionById($idPost);
        if($post['dir_img']){
            unlink("../views/" . $post['dir_img']);
        }
    }
    public function GetDirImg(){
        $sql="SELECT dir_img FROM publicaciones WHERE dir_img is not null";
        $execute = $this->conn->query($sql);
        $request = $execute->fetchall(PDO::FETCH_COLUMN, 0);
        return $request;
    }
}
?>