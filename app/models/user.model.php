<?php
class UserModel{
    private $db;

    public function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=aerolinea;charset=utf8','root','');
    }

    public function getUserByEmail($email){
        $query=$this->db->prepare('SELECT * FROM `login` WHERE email=?');
        $query->execute([$email]);

        $user=$query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function encriptar($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    function registrar($user, $pass){
        $query=$this->db->prepare('INSERT INTO `login` (`email`, `contrasenia`) VALUES (?, ?)');
        $query->execute([$user, $pass]);
    }
}