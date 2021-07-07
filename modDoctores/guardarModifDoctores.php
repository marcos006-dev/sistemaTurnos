<?php

function modificarDatosDoctor( $paramConexion, $paramDatosDoctorModif ) {

    modifEstadoHorariosxDia( $paramConexion, $paramDatosDoctorModif );
    try {
        $paramConexion->beginTransaction();

        // inserccion de los datos en la tabla de personas
        $sqlModifPersona = "UPDATE `Personas` SET `nombrePersona`=:nombrePersona,`apellidoPersona`=:apellidoPersona,`dniPersona`=:dniPersona,`telefonoPersona`=:telefonoPersona,`emailPersona`=:emailPersona WHERE `dniPersona` = :dniPersona";
        $statement = $paramConexion->prepare( $sqlModifPersona );
        $statement->bindParam( ":nombrePersona", $paramDatosDoctorModif["nombreDoctor"] );
        $statement->bindParam( ":apellidoPersona", $paramDatosDoctorModif["apellidoDoctor"] );
        $statement->bindParam( ":dniPersona", $paramDatosDoctorModif["dniDoctor"] );
        $statement->bindParam( ":telefonoPersona", $paramDatosDoctorModif["telefonoDoctor"] );
        $statement->bindParam( ":emailPersona", $paramDatosDoctorModif["correoDoctor"] );
        $statement->execute();

        $sqlModifDoctor = "UPDATE `Doctores` SET `idEspecialidad`=:idEspecialidad WHERE `idDoctor` =:idDoctor";

        $statement = $paramConexion->prepare( $sqlModifDoctor );
        $statement->bindParam( ":idEspecialidad", $paramDatosDoctorModif["idEspecialidadDoctor"] );
        $statement->bindParam( ":idDoctor", $paramDatosDoctorModif["idDoctor"] );
        $statement->execute();
        modifDatosxDiaDoctor( $paramConexion, $paramDatosDoctorModif );
        $paramConexion->commit();
        return array( 'estado' => 200, 'mensaje' => 'Datos Modificados correctamente' );

    } catch ( PDOException $e ) {
        $paramConexion->rollback();
        return array( 'estado' => 500, 'mensaje' => $e->getMessage() );
        // die();
    }

}

function modifDatosxDiaDoctor( $paramConexion, $paramDatosDoctorModif ) {

    $arrayCantTurnosModif = $paramDatosDoctorModif["cantTurnosxDiaDoctorModificar"];
// inseccion de la cantidad de turnos por dia del doctor

    for ( $i = 0; $i < count( $arrayCantTurnosModif ); $i++ ) {
        $sqlModifTurnosxDiaDoctor = "UPDATE `TurnosxDia` SET `cantTurnosDisp`= :cantTurnosDisp WHERE `idTurnosxDia` = :idTurnosxDia";
        $statement = $paramConexion->prepare( $sqlModifTurnosxDiaDoctor );
        $statement->bindParam( ":cantTurnosDisp", $arrayCantTurnosModif[$i][1] );
        $statement->bindParam( ":idTurnosxDia", $arrayCantTurnosModif[$i][0] );
        $statement->execute();
    }

}

function guardarDatosxDiaDoctor( $paramConexion, $paramDatosHorariosDoctorInsertar ) {
    modifEstadoHorariosxDia( $paramConexion, $paramDatosHorariosDoctorInsertar );
    $arrayCantTurnosInsert = $paramDatosHorariosDoctorInsertar["cantTurnosxDiaDoctor"];
// inseccion de la cantidad de turnos por dia del doctor
    try {
        $paramConexion->beginTransaction();
        for ( $i = 0; $i < count( $arrayCantTurnosInsert ); $i++ ) {
            $sqlInsertarTurnosxDiaDoctor = "INSERT INTO `TurnosxDia`(`idDoctor`, `idDia`, `idHorarioTrabajo`, `cantTurnosDisp`) VALUES (:idDoctor, :idDia, :idHorarioTrabajo, :cantTurnosDisp)";
            $statement = $paramConexion->prepare( $sqlInsertarTurnosxDiaDoctor );
            $statement->bindParam( ":idDoctor", $paramDatosHorariosDoctorInsertar["idDoctor"] );
            $statement->bindParam( ":idDia", $arrayCantTurnosInsert[$i][0] );
            $statement->bindParam( ":idHorarioTrabajo", $arrayCantTurnosInsert[$i][1] );
            $statement->bindParam( ":cantTurnosDisp", $arrayCantTurnosInsert[$i][2] );
            $statement->execute();
        }
        $paramConexion->commit();
        return array( 'estado' => 200, 'mensaje' => 'Datos Modificados correctamente' );
    } catch ( PDOException $e ) {
        $paramConexion->rollback();
        return array( 'estado' => 500, 'mensaje' => $e->getMessage() );
        // die();
    }
}
function modifEstadoHorariosxDia( $paramConexion, $paramDatosDoctorModif ) {

    try {
        $paramConexion->beginTransaction();

        $sqlModifEstxDia = "UPDATE `TurnosxDia` SET `estadoHorario`= 0 WHERE `idDoctor` = :idDoctor";
        $statement = $paramConexion->prepare( $sqlModifEstxDia );
        $statement->bindParam( ":idDoctor", $paramDatosDoctorModif["idDoctor"] );
        $statement->execute();

        $sqlModifEstxDia = "UPDATE `TurnosxDia` SET `estadoHorario`= 1 WHERE `idHorarioTrabajo` = :idHorarioTrabajo AND `idDoctor` = :idDoctor";
        $statement = $paramConexion->prepare( $sqlModifEstxDia );
        $statement->bindParam( ":idDoctor", $paramDatosDoctorModif["idDoctor"] );
        $statement->bindParam( ":idHorarioTrabajo", $paramDatosDoctorModif["idHorarioTrabajoDoctor"] );
        $statement->execute();

        $paramConexion->commit();
        return array( 'estado' => 200, 'mensaje' => 'Datos Modificados correctamente' );
    } catch ( PDOException $e ) {
        $paramConexion->rollback();
        return array( 'estado' => 500, 'mensaje' => $e->getMessage() );
        // die();
    }
}

?>