<?php

Class Equipo {

    private $id_equipo;
    private $nombre;
    private $imagen;


    public function Equipo( $id_equipo="", $nombre="", $imagen="" ){
        if($id_equipo) $this->id_equipo = $id_equipo;
        if($nombre) $this->nombre = $nombre;
        if($imagen) $this->$imagen = $imagen;
    }

    public function getId(){
        return $this->id_equipo;
    }

    public function setId( $id_equipo ){
        $this->id_equipo = $id_equipo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre( $nombre ){
        $this->nombre = $nombre;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setImagen( $imagen ){
        if($imagen){
            $imagen = explode(",",$imagen);
        }
        $imagen_t = array();
        if(is_array($imagen)){
            foreach($imagen as $img){
                $imagen_t[] = trim($img);
            }
        }
        $this->imagen = $imagen_t;
    }

    public function __toString() {
        return $this->nombre;
    }
}