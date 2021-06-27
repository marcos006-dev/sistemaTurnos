<?php

function getHorariosTrabajo( $paramConexion ) {
    try {
        $sqlHogetHorariosTrabajo = "SELECT * FROM `HorariosTrabajo`";
        $statement = $paramConexion->prepare( $sqlHogetHorariosTrabajo );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>