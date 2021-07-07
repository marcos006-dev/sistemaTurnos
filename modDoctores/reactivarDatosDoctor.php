<?php

function getReactivarDatosDoctores( $paramConexion, $paramIdDoctor ) {
    try {
        $sqlHogetReactivarDatosDoctores = "UPDATE Personas p1, Doctores d1 SET p1.estadoPersona = 1 WHERE p1.idPersona = d1.idPersona AND d1.idDoctor = :idDoctor";
        $statement = $paramConexion->prepare( $sqlHogetReactivarDatosDoctores );
        $statement->bindParam( ":idDoctor", $paramIdDoctor );

        $statement->execute();
        return $statement->rowCount() > 0 ? true : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>