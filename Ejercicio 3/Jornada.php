<?php

Class Jornada {

    private $partidos = array();


    public function Jornada( $partidos="") {
    }    

    public function addPartido( $partido ){
        $this->partidos[] = $partido;
    }

    public function getPartido( $indice ){
        if($indice >= 0 && $indice < count($this->partidos)){
            return $this->partidos[$indice]; 
        }
    }

    public function getPartidos(){
        $this->partidos;
    }


}