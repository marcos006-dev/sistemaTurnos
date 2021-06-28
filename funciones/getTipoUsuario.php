<?php

function getTipoUsuario( $paramConexion ) {
    try {
        $sqlTipoUsuario = "SELECT * FROM `TipoUsuario`";
        $statement = $paramConexion->prepare( $sqlTipoUsuario );
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement : false;
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
}

?>