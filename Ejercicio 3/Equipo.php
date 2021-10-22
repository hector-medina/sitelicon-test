<?php

Class Equipo {

    public $nombre;
    public $oponentes_pendientes = array();
    public $oponentes_jugados = array();


    public function Equipo( $nombre ){
        $this->nombre = $nombre;
    }

    // public function Equipo( $nombre, $oponentes ){
    //     $this->$nombre = $nombre;
    //     setOponentesPendientes( $oponentes );
    // }

    public function setOponentesPendientes( $oponentes ){
        foreach( $oponentes as $oponente ){
            if( $oponente->nombre != $this->nombre ){
                $oponentes_pendientes[] = $oponente;
            }
        }
    }

    public function addOponentePentiente( $oponente ){
        $found = in_array($oponente, $this->oponentes_pendientes);
        if(!$found && $oponente!=$this->nombre){
            $this->oponentes_pendientes[] = $oponente;
        } 
    }

    public function setOponentesJugado( $nombre ){
        for($i = 0 ; $i < count($oponentes_pendientes);$i++){
            if( $oponentes_pendientes[$i]->nombre == $nombre ){
                array_slice($oponentes_pendientes, $i, 1);
                $oponentes_jugados[] = $nombre;
            }
        }
    }

    public function getRandomOponent(){
        $num_oponents = count($this->$oponentes_pendientes);
        $index = rand(0, $num_oponents);
        return $this->$oponentes_pendientes[$index];
    }

}