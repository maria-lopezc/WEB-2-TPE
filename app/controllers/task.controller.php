<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';
require_once 'urls.php';

class TaskController{
    private $model;
    private $view;

    public function __construct(){
        $this->model= new TaskModel();
        $this->view= new TaskView();
    }

    function showHome(){ 
        $pilotos=$this->model->getPilotos();
        $vuelos=$this->model->getVuelos();
        $this->view->showHome($pilotos, $vuelos);
        //$this->showVuelos();
    }

    /*function showVuelos(){ //arreglar nombre del piloto
        $vuelos=$this->model->getVuelos();
        foreach($vuelos as $vuelo){
            $piloto=$this->model->getPilotoDelVuelo($vuelo->id_piloto);
            $this->view->showVuelo($piloto, $vuelo);
        }
        $this->view->cerrarTabla();
    }*/

    function showMas($id){
        $vuelo=$this->model->getVuelo($id);
        $piloto=$this->model->getPilotoDelVuelo($vuelo->id_piloto);
        $this->view->showVuelosCompleto($piloto, $vuelo);
    }

    function showPilotos(){
        $pilotos=$this->model->getPilotos();
        $this->view->showPilotos($pilotos);
    }

    function showVuelosPiloto($id){
        $vuelos=$this->model->getVuelosDelPiloto($id);
        $piloto=$this->model->getPiloto($id);
        
        $this->view->showVuelosPiloto($piloto,$vuelos);
    }

    function showAgregarVuelo(){
        if(isset($_POST['origen'])&&($_POST['destino'])&&($_POST['cant_pasajeros']&&($_POST['duracion']))){
            $id_piloto=$_POST['piloto'];
            $origen=$_POST['origen'];
            $destino=$_POST['destino'];
            $cant_pasajeros=$_POST['cant_pasajeros'];
            $duracion=$_POST['duracion'];

            $this->model->agregarVuelo($id_piloto, $origen, $destino, $cant_pasajeros, $duracion);
    
            $base=baseurl()."home";
            header("Location: ".$base);
        }
    }

    function showAgregarPiloto(){
        if(isset($_POST['nombre'])&&($_POST['dni'])&&($_POST['fecha_nac']&&($_POST['gmail']))&&($_POST['direccion'])&&($_POST['telefono'])&&($_POST['licencia'])){
            $nombre=$_POST['nombre'];
            $dni=$_POST['dni'];
            $fecha_nacimiento=$_POST['fecha_nac'];
            $gmail=$_POST['gmail'];
            $direccion=$_POST['direccion'];
            $telefono=$_POST['telefono'];
            $nro_licencia=$_POST['licencia'];
    
            $this->model->agregarPiloto($nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia);
            
            $base=baseurl()."home";
            header("Location: ".$base);
        }
    }

    function removeVuelo($id){
        $this->model->eliminarVuelo($id);

        $base=baseurl()."home";
        header("Location: ".$base);
    }

    function removePiloto($id){
        $vuelos=$this->model->getVuelosDelPiloto($id);
        foreach($vuelos as $vuelo){
            $this->model->eliminarVuelo($vuelo->id_vuelos);
        }
        $this->model->eliminarPiloto($id);

        $base=baseurl()."verPilotos";
        header("Location: ".$base);
    }

    function editVuelo($id){
        $vuelo=$this->model->getVuelo($id);
        $pilotos=$this->model->getPilotos();
    
        $origen=$vuelo->origen;
        $destino=$vuelo->destino;
        $cant_pasajeros=$vuelo->cant_pasajeros;
        $duracion=$vuelo->duracion_vuelo;

        $this->view->formEditarVuelos($id, $pilotos, $origen, $destino, $cant_pasajeros, $duracion);
    }

    function editeVuelo($id){
        if(isset($_POST['origen'])&&($_POST['destino'])&&($_POST['cant_pasajeros']&&($_POST['duracion']))){
            $id_piloto=$_POST['piloto'];
            $origen=$_POST['origen'];
            $destino=$_POST['destino'];
            $cant_pasajeros=$_POST['cant_pasajeros'];
            $duracion=$_POST['duracion'];

            $this->model->editarVuelo($id, $id_piloto, $origen, $destino, $cant_pasajeros, $duracion);
            
            $base=baseurl()."home";
            header("Location: ".$base);
        }
    }

    function editPiloto($id){
        $piloto=$this->model->getPiloto($id);
    
        $nombre=$piloto->nombre;
        $dni=$piloto->dni;
        $fecha_nacimiento=$piloto->fecha_nacimiento;
        $gmail=$piloto->gmail;
        $direccion=$piloto->direccion;
        $telefono=$piloto->telefono;
        $nro_licencia=$piloto->nro_licencia;

        $this->view->formEditarPiloto($id, $nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia);
    }

    function editePiloto($id){
        if(isset($_POST['nombre'])&&($_POST['dni'])&&($_POST['fecha_nac']&&($_POST['gmail']))&&($_POST['direccion'])&&($_POST['telefono'])&&($_POST['licencia'])){
            $nombre=$_POST['nombre'];
            $dni=$_POST['dni'];
            $fecha_nacimiento=$_POST['fecha_nac'];
            $gmail=$_POST['gmail'];
            $direccion=$_POST['direccion'];
            $telefono=$_POST['telefono'];
            $nro_licencia=$_POST['licencia'];

            $this->model->editarPiloto($id, $nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia);

            $base=baseurl()."home";
            header("Location: ".$base);
        }
    }
}