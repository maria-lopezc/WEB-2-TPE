<?php
require_once 'urls.php';

class TaskView{
    function showHome($pilotos, $vuelos){ 
        $base=baseurl();
        require 'templates/vista_home.phtml';
    }

    function showVuelosCompleto($piloto, $vuelo){
        $base=baseurl();
        require 'templates/vista_vuelo.phtml';
    }

    function showPilotos($pilotos){ 
        require 'templates/vista_piloto.phtml';
    }

    function showVuelosPiloto($piloto,$vuelos){
        require 'templates/vista_vuelosPiloto.phtml';
    }

    function formEditarVuelos($id, $pilotos, $origen, $destino, $pasajeros, $duracion){ 
        $base=baseurl()."editoVuelo/".$id;
        require 'templates/form_editarVuelo.phtml'; 
    } 
    
    function formEditarPiloto($id, $nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia){ 
        $base=baseurl()."editoPiloto/".$id;
        require 'templates/form_editarPiloto.phtml';
    }
}