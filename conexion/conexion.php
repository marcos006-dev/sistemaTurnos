<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SistemaTurnos";

try {
    $conexion = new PDO( "mysql:host=$servername;dbname=$dbname"
        , $username
        , $password
        , array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );
    $conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch ( PDOException $e ) {
    echo "La conexión falló: " . $e->getMessage();
    exit;
}

?>