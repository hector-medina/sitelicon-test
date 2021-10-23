<?php

Class Partido {

    private $equipo_local;
    private $equipo_visitante;

    public function Partido( $equipo_local , $equipo_visitante){
        $this->equipo_local = $equipo_local;
        $this->equipo_visitante = $equipo_visitante;
    }

    public function setEquipoVisitante( $visitante ){
        $this->equipo_visitante = $visitante;
    }

    public function setEquipoLocal( $local ){
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

    public function setAsPartidoVuelta(){
        $local = $this->equipo_local;
        $visitante = $this->equipo_visitante;
        $this->setEquipoLocal($visitante);
        $this->setEquipoVisitante($local);
    }

    public function __toString(){
        $local = str_pad($this->getEquipoLocal(), 20, " ");
        return  $local . "\t vs \t" . $this->getEquipoVisitante()."\n";
    }

}