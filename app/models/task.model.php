<?php
require 'config/config.php';
class TaskModel{
    protected $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    }

    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql = <<<END
            CREATE TABLE `login` (`id` int(11) NOT NULL,`email` varchar(250) NOT NULL,`contrasenia` char(60) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
            INSERT INTO `login` (`id`, `email`, `contrasenia`) VALUES
            (1, 'admin@gmail.com', '$2y$10\$eeiwRGXGTBxNBUVq5icdv.g7PUlYAD1CSQq6vUgjqPhSiduQ051ia'),
            (2, 'webadmin@gmail.com', '$2y$10\$gSuaKvEGPh/sV1kx/jCkdeUsF/Y9nn96KAuXeEB0mRQN8u6197RBe');
            CREATE TABLE `pilotos` (`id_piloto` int(11) NOT NULL,`nombre` text NOT NULL,`dni` int(11) NOT NULL,`fecha_nacimiento` date NOT NULL,`gmail` varchar(50) NOT NULL,`direccion` text NOT NULL,`telefono` int(11) NOT NULL,`nro_licencia` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
            INSERT INTO `pilotos` (`id_piloto`, `nombre`, `dni`, `fecha_nacimiento`, `gmail`, `direccion`, `telefono`, `nro_licencia`) VALUES
            (1, 'Jorge Perez', 30598140, '1983-03-19', 'jorgeperez@gmail.com', 'Panamá 150, Ezeiza', 112450328, 38820543),
            (4, 'Pablo Sanchez', 31568863, '1985-06-08', 'PabloSanchez455j@gmail.com', 'Corrientes 1344, La Matanza', 542175313, 389000234);
            CREATE TABLE `vuelos` (`id_vuelos` int(11) NOT NULL,`id_piloto` int(11) NOT NULL,`origen` text NOT NULL,`destino` text NOT NULL,`cant_pasajeros` int(11) NOT NULL,`duracion_vuelo` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
            INSERT INTO `vuelos` (`id_vuelos`, `id_piloto`, `origen`, `destino`, `cant_pasajeros`, `duracion_vuelo`) VALUES
            (1, 4, 'Aeroparque, Arg', 'Rio De Janeiro, Br', 150, '2:30'),
            (2, 1, 'Montevideo, Uru', 'Ezeiza, Arg', 100, '1'),
            (15, 4, 'Ezeiza, Arg', 'Montevideo, Uru', 230, '3'),
            (16, 1, 'Ezeiza, Arg', 'LA, EUU', 300, '12');
            END;
        $this->db->query($sql);
        }
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