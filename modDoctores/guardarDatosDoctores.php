<?php

function guardarDatosDoctor( $paramConexion, $paramDatosDoctorGuardar ) {

    try {
        $paramConexion->beginTransaction();
        // inserccion de los datos en la tabla de personas
        $sqlInsertarPersona = "INSERT INTO `Personas`(`nombrePersona`, `apellidoPersona`, `dniPersona`, `telefonoPersona`, `emailPersona`) VALUES (:nombrePersona, :apellidoPersona, :dniPersona, :telefonoPersona, :emailPersona)";
        $statement = $paramConexion->prepare( $sqlInsertarPersona );
        $statement->bindParam( ":nombrePersona", $paramDatosDoctorGuardar["nombreDoctor"] );
        $statement->bindParam( ":apellidoPersona", $paramDatosDoctorGuardar["apellidoDoctor"] );
        $statement->bindParam( ":dniPersona", $paramDatosDoctorGuardar["dniDoctor"] );
        $statement->bindParam( ":telefonoPersona", $paramDatosDoctorGuardar["telefonoDoctor"] );
        $statement->bindParam( ":emailPersona", $paramDatosDoctorGuardar["correoDoctor"] );
        $statement->execute();
        $idPersonaInsertada = $paramConexion->lastInsertId();
        // return $idPersonaInsertada;
        // inserccion en la tabla de doctores
        $sqlInsertarPersona = "INSERT INTO `Doctores`(`idPersona`, `idEspecialidad`) VALUES (:idPersona, :idEspecialidad)";
        $statement = $paramConexion->prepare( $sqlInsertarPersona );
        $statement->bindParam( ":idPersona", $idPersonaInsertada );
        $statement->bindParam( ":idEspecialidad", $paramDatosDoctorGuardar["idEspecialidadDoctor"] );
        $statement->execute();
        $idDoctorInsertado = $paramConexion->lastInsertId();

        $arrayCantTurnos = $paramDatosDoctorGuardar["cantTurnosxDiaDoctor"];
        // inseccion de la cantidad de turnos por dia del doctor

        for ( $i = 0; $i < count( $arrayCantTurnos ); $i++ ) {
            // var_dump( $arrayCantTurnos[$i] );

            $sqlInsertarTurnosxDiaDoctor = "INSERT INTO `TurnosxDia`(`idDoctor`, `idDia`, `idHorarioTrabajo`, `cantTurnosDisp`) VALUES (:idDoctor, :idDia, :idHorarioTrabajo, :cantTurnosDisp)";
            $statement = $paramConexion->prepare( $sqlInsertarTurnosxDiaDoctor );
            $statement->bindParam( ":idDoctor", $idDoctorInsertado );
            $statement->bindParam( ":idDia", $arrayCantTurnos[$i][0] );
            $statement->bindParam( ":idHorarioTrabajo", $arrayCantTurnos[$i][1] );
            $statement->bindParam( ":cantTurnosDisp", $arrayCantTurnos[$i][2] );
            $statement->execute();
        }
        $paramConexion->commit();
        return array( 'estado' => 200, 'mensaje' => 'Datos agregados correctamente' );

    } catch ( PDOException $e ) {
        $paramConexion->rollback();
        return array( 'estado' => 500, 'mensaje' => $e->getMessage() );
        // die();
    }

}

?>