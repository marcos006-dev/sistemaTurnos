<?php

require_once "../conexion/conexion.php";
require_once "../funciones/getDias.php";
require_once "../funciones/getHorariosTrabajo.php";
require_once "./guardarDatosDoctores.php";
require_once "../funciones/getDni.php";

$accion = ( !empty( $_GET['accion'] ) ) ? $_GET['accion'] : false;
$id = ( !empty( $_GET['id'] ) ) ? $_GET['id'] : false;

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

if ( $accion == "verificarDni" ) {
    $dniDoctorVerificar = $_GET["dniDoctor"];

    if ( getDni( $conexion, $dniDoctorVerificar ) != false ) {
        echo json_encode( array( 'estado' => 200, 'mensaje' => 'Ya hay una persona con este dni, por favor verifique!' ) );
    } else {
        echo json_encode( array( 'estado' => 200, 'mensaje' => '' ) );
    }

    // echo json_encode( guardarDatosDoctor( $conexion, $datosInsertarxDia ) );
}

if ( !empty( $_POST ) ) {
    $datosInsertarxDia = json_decode( $_POST['datosArrayxDia'], true );
    echo json_encode( guardarDatosDoctor( $conexion, $datosInsertarxDia ) );
}

?>