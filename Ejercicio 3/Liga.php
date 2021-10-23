<?php

require_once "Partido.php";
require_once "Jornada.php";

Class Liga {

    private $jornadas = array();

    public function Liga( $num_jornadas ){
        $this->initJornadas( $num_jornadas );
    }

    private function initJornadas( $num_jornadas ){
        $num_jornadas = intval($num_jornadas);
        for($i = 0; $i < $num_jornadas ;$i++){
            $this->jornadas[] = new Jornada();
        }
    }

    public function getJornadas(){
        return $this->jornadas;
    }

    public function getJornada( $indice ){
        return $this->jornadas[$indice];
    }

}