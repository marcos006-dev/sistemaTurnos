<?php

function getEspecialidades( $paramConexion ) {
    try {
        $sqlEspecialidades = "SELECT * FROM `Especialidades`";
        $statement = $paramConexion->prepare( $sqlEspecialidades );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>