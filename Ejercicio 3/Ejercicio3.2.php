<?php

require_once "Funciones.php";
require_once "Equipo.php";
require_once "Liga.php";
require_once "Partido.php";
require_once "Jornada.php";

$equipos= getEquipos(); 

$esEquiposImpar = (count($equipos)%2 != 0) ?  true : false;

if($esEquiposImpar){
	$partidos_por_jornada = (intval(count($equipos)/2));
	$num_jornadas = count($equipos);
} else {
	$partidos_por_jornada = count($equipos)/2;
	$num_jornadas = count($equipos)-1;
}

$liga = new Liga( $num_jornadas );

for($i = 1 ; $i <= $num_jornadas ; $i++){
	if($esEquiposImpar && $i == $num_jornadas ) $partido = new Partido( "" , "" );
	else $partido = new Partido($equipos[0],  $equipos[$i]);
	$liga->getJornada($i-1)->addPartido($partido);	
}

$equiposDescansan = array();
for( $i=0 ; $i < $num_jornadas; $i++ ){
	if($esEquiposImpar && $i == $num_jornadas-1 ) continue;
	$v_index = $liga->getJornada($i)->getPartido(0)->getEquipoVisitante()->getId();

	for( $j = 0 ; $j < $partidos_por_jornada-1 ; $j++, $v_index++){
		if($v_index == count($equipos))	$v_index = 1;
		$partido = new Partido( -1,  $equipos[$v_index]);
		$liga->getJornada($i)->addPartido($partido);
	}

	for( $j = $partidos_por_jornada-1; $j > 0 ; $j--, $v_index++){
		if($v_index == count($equipos)) $v_index = 1;
		$liga->getJornada($i)->getPartido($j)->setEquipoLocal($equipos[$v_index]);
	}
	
	if($v_index == count($equipos)) $v_index = 1;
	if($esEquiposImpar) $equiposDescansan[] = $equipos[$v_index];
}

if($esEquiposImpar){

	$jornada = new Jornada();
	for($i = 0,$j=count($equiposDescansan)/2 ; $i < count($equiposDescansan)/2 ; $i++,$j++){
		$jornada->addPartido(new Partido($equiposDescansan[$i], $equiposDescansan[$j]));
	}
	$liga->addJornada($jornada, count($equiposDescansan));
}

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
		echo "<td style='background-color:$color;text-align: right'><a href=''>$equipoLocal ".  $partidos->getPartido($p)->getEquipoLocal()->getId()."</a></td>";
		echo "<td style='background-color:$color;text-align: left'><a href=''>$equipoVisitante".  $partidos->getPartido($p)->getEquipoVisitante()->getId()."</a></td>";
		echo "</tr>";
	}
}

$ligaVuelta = clone $liga;

for($i = 0; $i < $num_jornadas ; $i++){
	for($j = 0 ; $j < $partidos_por_jornada ; $j++){
		$ligaVuelta->getJornada($i)->getPartido($j)->setAsPartidoVuelta();
	}
}


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
