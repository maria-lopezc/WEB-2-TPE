<?php
class TaskModel{
    private $db;

    public function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=aerolinea;charset=utf8','root','');
    }

    public function getPilotos(){;
        $sentencia=$this->db->prepare("SELECT * FROM `pilotos`");
        $sentencia->execute();
        $pilotos=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $pilotos;
    }

    public function getVuelos(){
        $query=$this->db->prepare("SELECT * FROM `vuelos`");
        $query->execute();
        $vuelos=$query->fetchAll(PDO::FETCH_OBJ);
        return $vuelos;
    }

    function getVuelo($id){
        $query=$this->db->prepare("select * from vuelos WHERE id_vuelos=?");
        $query->execute([$id]);
        $vuelo=$query->fetch(PDO::FETCH_OBJ);
        return $vuelo;
    }

    function getPiloto($id){
        $query=$this->db->prepare("select * from pilotos WHERE id_piloto=?");
        $query->execute([$id]);
        $piloto=$query->fetch(PDO::FETCH_OBJ);
        return $piloto;
    }

    function getPilotoDelVuelo($id){
        $sentencia=$this->db->prepare("SELECT * FROM `pilotos` WHERE id_piloto=?");
        $sentencia->execute([$id]);
        $piloto=$sentencia->fetch(PDO::FETCH_OBJ);
        return $piloto;
    }

    function getVuelosDelPiloto($id){
        $query=$this->db->prepare('SELECT * FROM vuelos WHERE id_piloto=?');
        $query->execute([$id]);
        $vuelos=$query->fetchAll(PDO::FETCH_OBJ);
        return $vuelos;
    }

    function agregarVuelo($id_piloto, $origen, $destino, $cant_pasajeros, $duracion){
        $query=$this->db->prepare('INSERT INTO `vuelos`(`id_piloto`, `origen`, `destino`, `cant_pasajeros`, `duracion_vuelo`) 
        VALUES (?,?,?,?,?)');
        $query->execute([$id_piloto, $origen, $destino, $cant_pasajeros, $duracion]);
    }

    function agregarPiloto($nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia){
        $query=$this->db->prepare('INSERT INTO `pilotos`(`nombre`, `dni`, `fecha_nacimiento`, `gmail`,`direccion`,`telefono`,`nro_licencia`) 
        VALUES (?,?,?,?,?,?,?)');
        $query->execute([$nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia]);
    }

    function eliminarVuelo($id){
        $query=$this->db->prepare('DELETE FROM vuelos WHERE id_vuelos = ?');
        $query->execute([$id]);
    }

    function eliminarPiloto($id){
        $query=$this->db->prepare('DELETE FROM pilotos WHERE id_piloto = ?');
        $query->execute([$id]);
    }

    function editarVuelo($id, $id_piloto, $origen, $destino, $cant, $duracion){
        $query=$this->db->prepare('UPDATE `vuelos` 
        SET `id_piloto` = ?, `origen` = ?, `destino` = ?, `cant_pasajeros` = ?, `duracion_vuelo` = ?
        WHERE `vuelos`.`id_vuelos` = ?');
        $query->execute([$id_piloto, $origen, $destino, $cant, $duracion, $id]);
    }

    function editarPiloto($id, $nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia){
        $query=$this->db->prepare('UPDATE `pilotos` 
        SET `nombre` = ?, `dni` = ?, `fecha_nacimiento` = ?, `gmail` = ?, `direccion` = ?, `telefono` = ?, `nro_licencia` = ?
        WHERE `pilotos`.`id_piloto` = ?');
        $query->execute([$nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia, $id]);
    }
}