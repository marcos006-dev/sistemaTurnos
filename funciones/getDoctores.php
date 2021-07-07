<?php

function getDoctores( $paramConexion ) {
    try {
        $sqlDoctores = "SELECT * FROM Personas p1, Doctores d1 WHERE d1.idPersona = p1.idPersona";
        $statement = $paramConexion->prepare( $sqlDoctores );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>