<?php

Class Conexion {

    private $conexion;

    private $server;

    private $user;

    private $password;

    private $database;

    public function Conexion($server="localhost", $user="root", $password="", $database="siteeu_test"){
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->conect();
    }

    private function conect(){
        $this->conexion = new mysqli( $this->server, $this->user, $this->password, $this->database );
        if($this->conexion->connect_errno) {
            return false;
        }
        return true;
    }

    public function execQuery( $sql ){
        if( $this->conexion->connect_error ) return false;
        if( !$sql ) return false;
        $result = $this->conexion->query( $sql );
        return $result;
    }


    public function close(){
        $this->conexion->close();
    }


}