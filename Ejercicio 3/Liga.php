<?php

require_once "Partido.php";

Class Liga {

    public static function calcularLigaNumEquiposPar( $numEquipos ){

        $numRondas = $numEquipos - 1;
        $numPartidosPorRonda = intval($numEquipos / 2);

        $rondas = array();
        $k = 0;
        for( $i = 0 ; $i < $numRondas ; $i++){
            for( $j = 0 ; $j < $numPartidosPorRonda ; $j++ ){
                $rondas[$i][$j] = new Partido($k, 0);
                if( $k == $numRondas ) $k=0;
            }
        }

        for( $i = 0 ; $i < $numRondas ; $i++ ){
            if( $i % 2 == 0 ){
                $rondas[$i][0]->setVisitante( $numEquipos - 1 );
            }
            else{
                $rondas[$i][0]->setVisitante( $rondas[$i][0]->getEquipoLocal() );
                $rondas[$i][0]->setLocal( $numEquipos -1 );
            }
        }

        $equipoMasAlto = $numEquipos -  1;
        $equipoImparMasAlto = $equipoMasAlto -1;

        $k = $equipoImparMasAlto;

        for( $i = 0; $i < $numRondas ; $i++ ){
            for( $j = 0 ; $j < $numPartidosPorRonda ; $j++ ){

                $rondas[$i][$j]->setVisitante( $k );
                $k--;
                if( $k == -1 ) $k = $equipoImparMasAlto;

            }
        }

        return $rondas;

    }

}