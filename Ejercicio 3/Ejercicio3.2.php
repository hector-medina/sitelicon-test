<?php

require_once "Funciones.php";
require_once "Equipo.php";

// CONSULTAMOS TODOS LOS EQUIPOS.
$equipos = getEquipos(false);

$equipos_array = array();

foreach($equipos as $equipo){
    $equipos_array[] = $equipo;
}

$num_equipos = count($equipos);
$num_partidos_por_jornada = $num_equipos/2;
$equipo_huerfano = $num_equipos%2;

// echo "numero de equipos: $num_equipos";
// echo "numero partidos: $num_partidos_por_jornada";
// echo "equipo huerfano: $equipo_huerfano";
$contador = 4;
for($a = 1 ; $a <= $num_equipos;$a++){
    echo "*************** RONDA $a *************************<br>";
    for($i = 0; $i<$num_partidos_por_jornada;$i++){
        $j = ($i+$contador)%$num_equipos;
        echo $equipos_array[$i]->nombre ." - ". $equipos_array[$j]->nombre."<br>";
    }
    $contador++;

}



$ronda = 1;







