<?php

require_once "../conexion/conexion.php";

$idUsuario = $_GET["idUsuario"];

// echo $idUsuario;

try {
    $sqlReactivarUsuario = "UPDATE `Usuarios` SET `estadoUsuario` = 1 WHERE `idUsuario` = :idDoctor";
    $statement = $conexion->prepare( $sqlReactivarUsuario );
    $statement->bindParam( ":idDoctor", $idUsuario );

    // return $statement->rowCount() > 0 ? true : false;

    if ( $statement->execute() ) {
        $respuestaJsonUsuario = array( 'estado' => 200, 'mensaje' => "Reactivación Exitosa" );
    }

} catch ( Exception $e ) {
    $respuestaJsonUsuario = array( 'estado' => 401, 'mensaje' => $e->getMessage() );
    die();
}

echo json_encode( $respuestaJsonUsuario );

?>