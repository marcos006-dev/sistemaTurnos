<?php

function getHorariosTrabajoDoctor( $paramConexion, $paramIdDoctor ) {
    try {
        $sqlHorariosTrabajoDoctor = "SELECT * FROM `TurnosxDia` WHERE `idDoctor` = :idDoctor LIMIT 1";
        $statement = $paramConexion->prepare( $sqlHorariosTrabajoDoctor );
        $statement->bindParam( ":idDoctor", $paramIdDoctor );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>