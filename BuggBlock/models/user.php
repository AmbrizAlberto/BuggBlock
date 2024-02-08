<?php
namespace models;
use PDO;
class user extends conexion{
    private $id_user;
    private $user;
    private $pass;
    private $role;
    private $select_user;
    private $create_user;

    function __construct($user = "", $pass = "", $role = null){
        parent::__construct();
        $this->user = $user;
        $this->pass = $pass;
        $this->select_user = $this->conn->prepare("SELECT * FROM users WHERE username = :nombre AND password = :contra");
        if(!is_null($role)){
            $this->role = $role;
            $this->create_user = $this->conn->prepare("INSERT INTO users(rol, username, password) VALUES (?, ?, ?)");
        }
    }

    public function existUser_db(){
        $this->select_user->execute([':nombre' => $this->user, ':contra' => $this->pass]);
        return $this->select_user->rowCount();
    }

    public function getUser_db(){
        $this->select_user->execute([':nombre' => $this->user, ':contra' => $this->pass]);
        $datos = $this->select_user->fetch();
        $this->role = $datos['rol'];
        $this->id_user = $datos['id'];
        return $datos;
    }

    public function getUserById($id){
        $sql="SELECT * FROM users WHERE id = ?";
        $select_id = $this->conn->prepare($sql);
        $select_id->execute([$id]);
        $datos = $select_id->fetch();
        $this->id_user = $datos['id'];
        $this->role = $datos['rol'];
        $this->user = $datos['username'];
        $this->pass = $datos['password'];
        return $datos;
    }

    public function getUsers(){
        $sql="SELECT u.id, r.rol, u.username FROM users AS u INNER JOIN roles AS r ON u.rol = r.id";
        $execute = $this->conn->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function createUser(){
        $this->create_user->execute([$this->role, $this->user, $this->pass]);
        return $this->conn->lastInsertId();
    }

    public function editUser($id, $id_controll){
        if($this->getCountAdmin() == 1 && $this->role =! 0 && $this->id_user == $id_controll){
            return false;
        } else {
            $sql="UPDATE users SET username=?, password=?, rol=? WHERE id=?";
            $update_user = $this->conn->prepare($sql);
            return $update_user->execute([$this->user, $this->pass, $this->role, $id]);
        }
    }

    public function deleteUser($id){
        if($this->getCountUser() > 1){
            $sql="DELETE FROM users WHERE id=?";
            $delete_user=$this->conn->prepare($sql);
            return $delete_user->execute([$id]);
        } else{
            return false;
        }
        
    }

    public function getCountUser(){
        $sql="SELECT COUNT(*) FROM users";
        $result = $this->conn->query($sql);
        return $result->fetchColumn();
    }

    public function getCountAdmin(){
        $sql="SELECT COUNT(*) FROM users WHERE rol=0";
        $result = $this->conn->query($sql);
        return $result->fetchColumn();
    }

    public function getRole(){ return $this->role; }
    public function getUser(){ return $this->user; }
    public function getPass(){ return $this->pass; }
    public function getId(){ return $this->id_user; }
}
?>