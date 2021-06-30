<?php

require_once "../conexion/conexion.php";
require_once "../funciones/getDias.php";
require_once "../funciones/getHorariosTrabajo.php";
require_once "../funciones/getHorariosDoctor.php";
require_once "./guardarDatosDoctores.php";
require_once "../funciones/getDni.php";
require_once "../funciones/getTurnosxDiaDoctor.php";
require_once "borrarDatosDoctor.php";

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

// OPTIONS MODIFY MODDOCTORES
if ( $accion == "verificarTurnosDoctor" ) {

    $idDoctor = $_GET["idDoctor"];
    $idHorarioTrabajo = $_GET["idHorarioTrabajo"];

    $rowHorariosTrabajoDoctor = getHorariosxDiaDoctor( $conexion, $idDoctor, $idHorarioTrabajo );
    if ( $rowHorariosTrabajoDoctor ) {

        $arrayDatosHorarios = array();
        while ( $rowHorar = $rowHorariosTrabajoDoctor->fetch( PDO::FETCH_ASSOC ) ) {
            array_push( $arrayDatosHorarios, $rowHorar );
        }
        $respuestaJsonHorar = array( 'estado' => 200, 'mensaje' => $arrayDatosHorarios );
    } else {
        $respuestaJsonHorar = array( 'estado' => 200, 'mensaje' => false );

    }
    echo json_encode( $respuestaJsonHorar );
}

// BORRAR DOCTOR

if ( $accion == "borrarDoctor" ) {

    $idDoctor = $_GET["idDoctor"];

    // var_dump( $idDoctor );

    $resultBorradoDoctor = getBorrarDatosDoctores( $conexion, $idDoctor );
    // var_dump( $resultBorradoDoctor );
    if ( $resultBorradoDoctor ) {

        $respuestaJsonBorradoDoctor = array( 'estado' => 200, 'mensaje' => "Doctor dado de bajo correctamente" );
    } else {
        $respuestaJsonBorradoDoctor = array( 'estado' => 200, 'mensaje' => false );

    }
    echo json_encode( $respuestaJsonBorradoDoctor );
}

?>