<?php

require_once "../conexion/conexion.php";

$idUsuario = $_GET["idUsuario"];

// echo $idUsuario;

try {
    $sqlBorarUsuario = "UPDATE `Usuarios` SET `estadoUsuario` = 0 WHERE `idUsuario` = :idDoctor";
    $statement = $conexion->prepare( $sqlBorarUsuario );
    $statement->bindParam( ":idDoctor", $idUsuario );

    // return $statement->rowCount() > 0 ? true : false;

    if ( $statement->execute() ) {
        $respuestaJsonUsuario = array( 'estado' => 200, 'mensaje' => "Borrado Exitoso" );
    }

} catch ( Exception $e ) {
    $respuestaJsonUsuario = array( 'estado' => 401, 'mensaje' => $e->getMessage() );
    die();
}

echo json_encode( $respuestaJsonUsuario );

?>