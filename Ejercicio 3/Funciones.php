<?php

require_once "Conexion.php";

/**
 * DEVUELVE UN ARRAY DE OBJETOS DE EQUIPOS O UN LISTADO NO ORDENADO
 * DEPENDIENDO DEL PARÁMETRO enListado. 
 */
function getEquipos( $enListado = true ){


    $conexion = new Conexion("localhost", "root", "","siteeu_test");

    if(!$conexion){
        return false;
    }
    
    $sql = "SELECT e.id, e.nombre, GROUP_CONCAT( i.imagen SEPARATOR ', ') as imagen
            FROM equipos e
            left join imagenes i on i.id_equipo=e.id
            GROUP by e.nombre;";
    
    $result = $conexion->execQuery( $sql );
    
    // SI HAY RESULTADOS SE RELLENA UN ARRAY DE OBJETOS.
    if ($result->num_rows > 0) {
        $equipos = array();
        while($row = $result->fetch_assoc()) {
            $object = new Equipo($row["id_equipo"], $row["nombre"]);
            $object->id_equipo = $row["id_equipo"];
            $object->nombre = $row["nombre"];
            if($row["imagen"]){
                $row["imagen"] = explode(",",$row["imagen"]);
            }
            if(is_array($row["imagen"])){
                foreach($row["imagen"] as $img){
                    $object->imagen[] = $img;
                }
            }
            else{
                $object->imagen[] = $row["imagen"];
            }
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
            foreach($equipo->imagen as $imagen){
                if($imagen)  echo "<img src='$imagen' height='30px'/>";
                
            }    

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