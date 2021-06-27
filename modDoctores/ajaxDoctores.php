<?php

require_once "../conexion/conexion.php";
require_once "../funciones/getDias.php";
require_once "../funciones/getHorariosTrabajo.php";

$accion = $_GET['accion'];
$id = ( !empty( $_GET['id'] ) ) ? $_GET['id'] : 0;

if ( $accion == "getDias" ) {
    $resultDias = getDias( $conexion );

    if ( !$resultDias ) {
        $respuestaJsonDias = array( 'estado' => 200, 'mensaje' => 'No hay registros cargados!' );
    } else {
        $respuestaJsonDias = array( 'estado' => 200, 'mensaje' => $resultDias->fetchAll( PDO::FETCH_ASSOC ) );
    }
    echo json_encode( $respuestaJsonDias );
}

if ( $accion == "getHorarTrab" ) {

    $resultGetHorarTrabajo = getHorariosTrabajo( $conexion );

    while ( $rowHorar = $resultGetHorarTrabajo->fetch( PDO::FETCH_ASSOC ) ) {
        if ( $rowHorar['idHorarioTrabajo'] == $id ) {
            $respuestaJsonHorar = array( 'estado' => 200, 'mensaje' => $rowHorar );
        }
    }
    echo json_encode( $respuestaJsonHorar );
}
?>