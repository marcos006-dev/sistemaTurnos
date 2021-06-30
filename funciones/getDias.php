<?php

function getDias( $paramConexion ) {
    try {
        $sqlDias = "SELECT * FROM `DiasDoctores`";
        $statement = $paramConexion->prepare( $sqlDias );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>