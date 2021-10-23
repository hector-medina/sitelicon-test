<?php

Class Partido {

    private $equipo_local;
    private $equipo_visitante;

    public function Partido( $equipo_local , $equipo_visitante){
        $this->equipo_local = $equipo_local;
        $this->equipo_visitante = $equipo_visitante;
    }

    public function setVisitante( $visitante ){
        $this->equipo_visitante = $visitante;
    }

    public function setLocal( $local ){
        $this->equipo_local = $local;
    }

    public function getEquipoLocal(){
        return $this->equipo_local;
    }

    public function getEquipoVisitante(){
        return $this->equipo_visitante;
    }

    public function getEquipos(){
        $equipos = array();
        $equipos[] = $this->equipo_local;
        $equipos[] = $this->equipo_visitante;
        return $equipos;
    }

    public function __toString(){
        return $this->getEquipoLocal() . " vs " . $this->getEquipoVisitante();
    }

}