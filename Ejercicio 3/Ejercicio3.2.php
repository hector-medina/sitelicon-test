<?php

require_once "Funciones.php";
require_once "Equipo.php";
require_once "Liga.php";
require_once "Partido.php";
require_once "Jornada.php";

// Array con objetos equipos. 
$equipos= getEquipos(); 

// Calculos de numero de partidos y numeros de jornadas
$partidos_por_jornada = count($equipos)/2;
$num_jornadas = count($equipos)-1;

// Instanciamos una liga
$liga = new Liga( $num_jornadas );

// Rellenamos el primer partido de cada jornada porque tiene una logica distinta.
for($i = 1 ; $i <= $num_jornadas ; $i++){
	$partido = new Partido($equipos[0],  $equipos[$i]);
	$liga->getJornada($i-1)->addPartido($partido);	
}

// Rellenamos cada jornada. 
for( $i=0 ; $i < $num_jornadas; $i++ ){
	// Índice del elemento de referencia de la jornada
	$v_index = $liga->getJornada($i)->getPartido(0)->getEquipoVisitante()->getId();
	
	// recorrido para llenar los visitantes
	for( $j = 0 ; $j < $partidos_por_jornada-1 ; $j++, $v_index++){
		if($v_index == count($equipos))	$v_index = 1;
		$partido = new Partido( -1,  $equipos[$v_index]);
		$liga->getJornada($i)->addPartido($partido);
	}

	// Recorrido para llenar los locales.
	for( $j = $partidos_por_jornada-1; $j > 0 ; $j--, $v_index++){
		if($v_index == count($equipos)) $v_index = 1;
		$liga->getJornada($i)->getPartido($j)->setEquipoLocal($equipos[$v_index]);
	}

}

// Impresion en pantalla de los partidos de ida. 
echo "<table>";
for($i = 0 ; $i < $num_jornadas ; $i++){
	$n_jornada = $i+1;
	echo "<tr><th colspan='2' style='text-align: left;background-color: #c3a492'> Jornada $n_jornada </th></tr>";
	$partidos = $liga->getJornada($i);
	for( $p = 0 ; $p < $partidos_por_jornada ; $p++ ){
		$equipoLocal = $partidos->getPartido($p)->getEquipoLocal();
		$equipoVisitante = $partidos->getPartido($p)->getEquipoVisitante();
		if($p%2 == 1) $color = "#C8DBF6"; 
		else $color = "#FFFFFF";
		echo "<tr>";
		echo "<td style='background-color:$color;text-align: right'><a href=''>$equipoLocal</a></td>";
		echo "<td style='background-color:$color;text-align: left'><a href=''>$equipoVisitante</a></td>";
		echo "</tr>";
	}
}

// Clonamos la liga de ida. 
$ligaVuelta = clone $liga;

// Intercambiamos locales y visitantes para hacer los partidos de vuelta.
for($i = 0; $i < $num_jornadas ; $i++){
	for($j = 0 ; $j < $partidos_por_jornada ; $j++){
		$ligaVuelta->getJornada($i)->getPartido($j)->setAsPartidoVuelta();
	}
}

// Impresion den pantalla de los partidos de vuelta.
for($i = 0 ; $i < $num_jornadas ; $i++){
	$n_jornada = $i+1+$num_jornadas;
	echo "<tr><th colspan='2' style='text-align: left;background-color: #c3a492'> Jornada $n_jornada </th></tr>";
	$partidos = $ligaVuelta->getJornada($i);
	for( $p = 0 ; $p < $partidos_por_jornada ; $p++ ){
		$equipoLocal = $partidos->getPartido($p)->getEquipoLocal();
		$equipoVisitante = $partidos->getPartido($p)->getEquipoVisitante();
		if($p%2 == 1) $color = "#C8DBF6"; 
		else $color = "#FFFFFF";
		echo "<tr>";
		echo "<td style='background-color:$color;text-align: right'><a href=''>$equipoLocal</a></td>";
		echo "<td style='background-color:$color;text-align: left'><a href=''>$equipoVisitante</a></td>";
		echo "</tr>";
	}
}
