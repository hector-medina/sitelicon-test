<?php

require_once "Funciones.php";
require_once "Equipo.php";
require_once "Liga.php";
require_once "Partido.php";
require_once "Jornada.php";

$equipos= getEquipos(); 



$matches = array();

// foreach( $players as $p2 ){
// 	if( $players[0] != $p2 ) $matches[][0] = $players[0] . " vs " . $p2;
	
// }

$jornadas = array();

for( $i = 0; $i < 7 ; $i++ ){
	$jornadas[$i] = new Jornada();
}
$i = 0;
foreach( $players as $key => $p2 ){
	if($players[0] != $p2 ){
		$jornadas[$i]->addPartido(new Partido( $players[0], $p2 ));
		$i++;
	}
}

print_r($jornadas);

// print_r( $jornadas[0]->getPartido(0)->getEquipoVisitante() );


// $prueba1 = $jornadas[0]->get;
// $prueba2 = 2;




// array_splice($players, 0, 1);
// $v = 1;
// $l = 3;
// for( $i = 1 ; $i < 4 ; $i++ ){
// 	$matches[0][$i] = new Partido($players[6], $players[2]);	
// }

// echo " Partido 0 1: ". $matches[0][1] . "\n";

// $j = 6;
// $z = 1;
// for( $a = 1 ; $a < 4 ; $a++ ){
// 	for( $i = 0 ; $i < count($players) ; $i++ ){
// 		$matches[$i][$a] = $players[$j] . " vs " . $players[$z];
// 		$j + $a;
// 		$j %= 7;
// 		$z + $a;
// 		$z %= 7;
// 	}
// }

// $prueba = 0;

// for( $i = 0 ; $i < count($players) ; $i++){

// 	for( $j = 0 ; $j < count($players) ; $j++ ){

// 		$matches[$i][$j] = $prueba;
// 		$prueba++;

// 	}

// }

// foreach($players as $key => $p){
	
// 	foreach( $players as $p2 ){
// 		if( $players[] != $p2 ) $matches[$key][0] = $players[0] . " vs " . $p2;
		
// 	}

// }
