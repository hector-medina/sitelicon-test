<?php

require_once "Conexion.php";

getEquipos(true);

/**
 * DEVUELVE UN ARRAY DE OBJETOS DE EQUIPOS O UN LISTADO NO ORDENADO
 * DEPENDIENDO DEL PARÁMETRO enListado. 
 */
function getEquipos( $enListado = true ){


    $conexion = new Conexion("localhost", "root", "","siteeu_test");

    if(!$conexion){
        return false;
    }
    
    $sql = "SELECT e.nombre, i.imagen FROM equipos e
            left join imagenes i on i.id_equipo=e.id";
    
    $result = $conexion->execQuery( $sql );
    
    // SI HAY RESULTADOS SE RELLENA UN ARRAY DE OBJETOS.
    if ($result->num_rows > 0) {
        $equipos = array();
        while($row = $result->fetch_assoc()) {
            $object = new StdClass();
            $object->nombre = $row["nombre"];
            $object->imagen = $row["imagen"];
            $equipos[] = $object;
        }
    }
    
    $conexion->close();
    
    // SI LO QUE SE QUIERE ES UN LISTADO.
    if($enListado){

        // TRATAMIENTO DE LA RESPUESTA. UNA LISTA NO ORDENADA.
        echo "<ul>";
        foreach($equipos as $equipo){
            echo "<li style='margin-top:10px'>";
            if($equipo->imagen)  echo "<img src='$equipo->imagen' height='30px'/>";
            echo "$equipo->nombre";
            echo "</li>";
        
        }
        echo "</ul>";
    }
    // SI LO QUE SE QUIERE ES UN ARRAY DE OBJETOS.
    else{
        return $equipos;
    }
}