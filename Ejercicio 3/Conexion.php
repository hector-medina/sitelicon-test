<?php

Class Conexion {

    private $conexion;

    private $server;

    private $user;

    private $password;

    private $database;

    public function Conexion($server, $user, $password, $database){
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->conect();
    })

    private function conect(){
        $this->conexion = new mysqli( $server, $user, $password, $database );
        if($this->conexion->connect_error) {
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


// CONEXIÓN A LA BASE DE DATOS.
$conexion = new mysqli("localhost", "root", "","siteeu_test");

// CONTROL DE ERRORES
if($conexion->connect_error) {
    echo "<p>Ha ocurrido un error en la conexion</p>";
    exit();
}

// DECLARACIÓN Y EJECUCIÓN DE CONSULTA.
$sql = "SELECT e.nombre, i.imagen FROM equipos e
        left join imagenes i on i.id_equipo=e.id";
$result = $conexion->query($sql);

// SI HAY RESULTADOS SE RELLENA UN ARRAY DE OBJETOS.
if ($result->num_rows > 0) {
    $equipos = array();
    while($row = $result->fetch_assoc()) {
        $object = new StdClass();
        $object->nombre = $row["nombre"];
        $object->imagen = $row["imagen"];
        $equipos[] = $object;
    }
}

// SE CIERRA CONEXION
$conexion->close();

// TRATAMIENTO DE LA RESPUESTA. UNA LISTA NO ORDENADA.
echo "<ul>";
foreach($equipos as $equipo){
    echo "<li style='margin-top:10px'>";
    if($equipo->imagen)  echo "<img src='$equipo->imagen' height='30px'/>";
    echo "$equipo->nombre";
    echo "</li>";

}
echo "</ul>";

