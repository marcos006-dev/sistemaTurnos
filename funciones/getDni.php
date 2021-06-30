<?php

function getDni( $paramConexion, $paramDni ) {
    try {
        $sqlDni = "SELECT * FROM `Personas` WHERE `dniPersona` = :dniDoctor";
        $statement = $paramConexion->prepare( $sqlDni );
        $statement->bindParam( ":dniDoctor", $paramDni );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>