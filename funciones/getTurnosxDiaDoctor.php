<?php

function getHorariosxDiaDoctor( $paramConexion, $paramIdDoctor, $paramIdHorarioTrabajo ) {
    try {
        $sqlHorariosxDiaDoctor = "SELECT * FROM `TurnosxDia` WHERE `idDoctor` = :idDoctor AND `idHorarioTrabajo` = :idHorarioTrabajo";
        $statement = $paramConexion->prepare( $sqlHorariosxDiaDoctor );
        $statement->bindParam( ":idDoctor", $paramIdDoctor );
        $statement->bindParam( ":idHorarioTrabajo", $paramIdHorarioTrabajo );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}
?>