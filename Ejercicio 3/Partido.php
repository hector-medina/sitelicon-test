<?php

Class Partido {

    private $equipo_visitante;

    private $equipo_local;

    public Partido( $equipo_local , $equipo_visitante){
        $this->equipo_local = $equipo_local;
        $this->$equipo_visitante = $equipo_visitante;
    }

    public getEquipoLocal(){
        return $this->equipo_local;
    }

    public getEquipoVisitante(){
        return $this->$equipo_visitante;
    }

    public getEquipos(){
        $equipos = array();
        $equipos[] = $this->equipo_local;
        $equipos[] = $this->$equipo_visitante;
        return $equipos;
    }

}