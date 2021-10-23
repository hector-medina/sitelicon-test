<?php

Class Jornada {

    private $partidos = array();


    public function Jornada() {
    }    

    public function addPartido( $partido ){
        $this->partidos[] = $partido;
    }

    public function addPartidos( $partidos ){
        $this->partidos = $partidos;
    }

    public function getPartido( $indice ){
        if($indice >= 0 && $indice < count($this->partidos)){
            return $this->partidos[$indice]; 
        }
    }

    public function getPartidos(){
        $this->partidos;
    }

    public function __toString(){
        
        $reponse = "";

        foreach( $this->partidos as $i => $partido ){
            $reponse .= $i ." - ". $partido;
        }
        
        return $reponse;
    }

    public function getPartidosDeVuelta(){
        $partidos = $this->partidos;
        $partidosDeVuelta = array();
        foreach($partidosDeVuelta as $partido){
            $equipoLocal = $partido->getEquipoLocal();
            $equipoVisitante = $partido->getEquipoVisitante();

            $partidoDeVuelta = new Partido($equipoLocal, $equipoVisitante);
            $partidosDeVuelta[] = $partidoDeVuelta;            
        }
        return $partidosDeVuelta;
    }

}