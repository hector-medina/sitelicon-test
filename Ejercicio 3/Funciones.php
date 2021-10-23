<?php

require_once "Conexion.php";
require_once "Equipo.php";

/**
 * DEVUELVE UN ARRAY DE OBJETOS DE EQUIPOS O UN LISTADO NO ORDENADO
 * DEPENDIENDO DEL PARÁMETRO enListado. 
 */

function getEquipos( $enListado = false ){

    $conexion = new Conexion();

    $sql = "SELECT e.id, e.nombre, GROUP_CONCAT( i.imagen SEPARATOR ', ') as imagen
            FROM equipos e
            left join imagenes i on i.id_equipo=e.id
            GROUP by e.nombre
            ORDER BY e.id limit 5;";
    
    $result = $conexion->execQuery( $sql );
    
    if ($result->num_rows > 0) {
        $equipos = array();
        while($row = $result->fetch_assoc()) {
            $equipo = new Equipo();
            $equipo->setId($row["id"]);
            $equipo->setNombre($row["nombre"]);
            $equipo->setImagen($row["imagen"]);
            $equipos[] = $equipo;
        }
    }

    $conexion->close();
    
    if(!$enListado) return $equipos;  
    else return printEquipos( $equipos );  
}

function printEquipos( $equipos ){
 // TRATAMIENTO DE LA RESPUESTA. UNA LISTA NO ORDENADA.
 echo "<ul>";
 foreach($equipos as $equipo){
     echo "<li style='margin-top:10px'>";
     foreach($equipo->getImagen() as $imagen){
         if($imagen)  echo "<img src='$imagen' height='30px'/>";
     }    
     echo $equipo->getNombre();
     echo "</li>";
 }
 echo "</ul>";
}