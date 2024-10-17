<?php
class TaskView{
    function formAgregar($pilotos){ 
        ?>
         <h3>Añadir Vuelo:</h3>
           <form action="agregar" method="post">
            <label for="piloto">Piloto:</label> 
                <select name='piloto' id="piloto">
                    <?php foreach ($pilotos as $piloto){?>
                <option value="<?php echo $piloto->id_piloto ?>"><?php echo $piloto->nombre ?></option>
                    <?php } ?>
                </select>
            
            Origen:<input required type="text" name="origen" id="">
            Destino:<input required type="text" name="destino" id="">
            Cantidad de Pasajeros:<input required type="number" name="cant_pasajeros" id="">
            Duración (horas): <input required type="text" name="duracion" id="">
            
            <button type="submit">Enviar</button>
        </form>
        <?php 
    }  

    function formAgregarPiloto(){ 
        ?>
            <h3>Añadir Piloto:</h3>
           <form action="agregarPiloto" method="post">
            Nombre:<input required type="text" name="nombre" id="">
            DNI:<input required type="text" name="dni" id="">
            Fecha de nacimiento:<input required type="date" name="fecha_nac" id="">
            Gmail: <input required type="text" name="gmail" id="">
            Dirección: <input required type="text" name="direccion" id="">
            Telefono: <input required type="number" name="telefono" id="">
            Número de Licencia: <input required type="number" name="licencia" id="">
            <button type="submit">Enviar</button>
        </form>
        <?php 
    }

    function showHome(){
        ?>    
            <h1>VUELOS</h1>
        <table>
        <tr>
            <td style="font-size: 30px; color: red;">Piloto</td>
            <td style="font-size: 30px; color: red;">Origen</td>
            <td style="font-size: 30px; color: red;">Destino</td>
        </tr>
    <?php
    }
    
    function showVuelo($piloto, $vuelo){
        echo '<tr><td style="font-size:20px">'.$piloto->nombre.'</td>
            <td style="font-size:20px">'.$vuelo->origen.'</td> 
            <td style="font-size:20px">'.$vuelo->destino.'</td> 
            <td ><a style="font-size:20px" href="/Web%202/TPE/verVuelo/'.$vuelo->id_vuelos.'">Ver más</a></td> 
            <td><a style="font-size:20px" href="../TPE/editarVuelo/'.$vuelo->id_vuelos.'">Editar<a></td> 
            <td><a style="font-size:20px" href="eliminarVuelo/'.$vuelo->id_vuelos.'" type="button">Borrar</a></td>
            </tr> ';
    }

    function cerrarTabla(){
         echo '</table>';
    }

    function showVuelosCompleto($piloto, $vuelo){
        ?>    
        <h1>VUELOS</h1>
    
        <table>
        <tr>
            <td style="font-size: 30px; color: red;">Piloto</td>
            <td style="font-size: 30px; color: red;">Origen</td>
            <td style="font-size: 30px; color: red;">Destino</td>
            <td style="font-size: 30px; color: red;">Cantidad de Pasajeros</td>
            <td style="font-size: 30px; color: red;">Duración (horas)</td>
        </tr>

        <tr><td style="font-size:20px"><?php echo $piloto->nombre ?></td>
        <td style="font-size:20px"><?php echo $vuelo->origen ?></td> 
        <td style="font-size:20px"><?php echo $vuelo->destino ?></td> 
        <td style="font-size:20px"><?php echo $vuelo->cant_pasajeros ?></td> 
        <td style="font-size:20px"><?php echo $vuelo->duracion_vuelo ?></td>
        <td><a style="font-size:20px" href="../editarVuelo/<?php echo $vuelo->id_vuelos?>">Editar<a></td>
        <td><a style="font-size:20px" href="/Web%202/TPE/eliminarVuelo/<?php echo $vuelo->id_vuelos?>" type="button">Borrar</a></td> 
        </tr>
        </table>
    <?php
    }

    function showHeaderPilotos(){ //PONER HEADER A LOS CABECERA DE TABLA
        ?>    
        <h1>PILOTOS</h1>
        <table>
        <tr>
            <td style="font-size: 25px; color: red;">Nombre</td>
            <td style="font-size: 25px; color: red;">DNI</td>
            <td style="font-size: 25px; color: red;">Fecha de Nacimiento</td>
            <td style="font-size: 25px; color: red;">Email</td>
            <td style="font-size: 25px; color: red;">Dirección</td>
            <td style="font-size: 25px; color: red;">Teléfono</td>
            <td style="font-size: 25px; color: red;">Número de Licencia</td>
        </tr>
        <?php
    }

    function showPiloto($piloto){
        echo '<tr><td style="font-size:20px">'.$piloto->nombre.'</td>
            <td style="font-size:20px">'.$piloto->dni.'</td> 
            <td style="font-size:20px">'.$piloto->fecha_nacimiento.'</td> 
            <td style="font-size:20px">'.$piloto->gmail.'</td> 
            <td style="font-size:20px">'.$piloto->direccion.'</td> 
            <td style="font-size:20px">'.$piloto->telefono.'</td> 
            <td style="font-size:20px">'.$piloto->nro_licencia.'</td>
            <td><a style="font-size:20px" href="vuelosPiloto/'.$piloto->id_piloto.'">Ver vuelos</td>
            <td><a style="font-size:20px" href="editarPiloto/'.$piloto->id_piloto.'">Editar<a></td>
            <td><a style="font-size:20px" href="eliminarPiloto/'.$piloto->id_piloto.'" type="button">Borrar</a></td>
            </tr> ';
    }

    function formEditarVuelos($id, $pilotos, $origen, $destino, $pasajeros, $duracion){ 
        ?>
         <h3>Editar Vuelo:</h3>
           <form action="/Web%202/TPE/editoVuelo/<?php echo $id ?>" method="post">
            <label for="piloto">Piloto:</label> 
                <select name='piloto' id="piloto">
                    <?php foreach ($pilotos as $piloto){?>
                <option value="<?php echo $piloto->id_piloto ?>"><?php echo $piloto->nombre ?></option>
                    <?php } ?>
                </select>
            
            Origen:<input required type="text" value="<?php echo $origen ?>" name="origen" id="">
            Destino:<input required type="text" value="<?php echo $destino ?>" name="destino" id="">
            Cantidad de Pasajeros:<input required type="number" value="<?php echo $pasajeros ?>" name="cant_pasajeros" id="">
            Duración (horas): <input required type="text" value="<?php echo $duracion ?>" name="duracion" id="">
            
            <button type="submit">Enviar</button>
        </form>
        <?php 
    } 
    
    function formEditarPiloto($id, $nombre, $dni, $fecha_nacimiento, $gmail, $direccion, $telefono, $nro_licencia){ 
        ?>
         <h3>Editar Piloto:</h3>
           <form action="/Web%202/TPE/editoPiloto/<?php echo $id ?>" method="post">
            Nombre:<input required type="text" value="<?php echo $nombre?>" name="nombre" id="">
            DNI:<input required type="text" value="<?php echo $dni?>" name="dni" id="">
            Fecha de nacimiento:<input required type="date" value="<?php echo $fecha_nacimiento?>" name="fecha_nac" id="">
            Gmail: <input required type="text" value="<?php echo $gmail?>" name="gmail" id="">
            Dirección: <input required type="text" value="<?php echo $direccion?>" name="direccion" id="">
            Telefono: <input required type="number" value="<?php echo $telefono?>" name="telefono" id="">
            Número de Licencia: <input required type="number" value="<?php echo $nro_licencia?>" name="licencia" id="">
            <button type="submit">Enviar</button>
        </form>
        <?php 
    }

    function ShowError($msg) {
        echo $msg;
    }
}