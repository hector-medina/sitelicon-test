<?php

require_once "Conexion.php";

$conexion = new Conexion("localhost", "root", "","siteeu_test");

if(!$conexion){
    return false;
}

$sql = "SELECT e.nombre, i.imagen FROM equipos e
        left join imagenes i on i.id_equipo=e.id";

$conexion->execQuery( $sql );

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

return $equipos;