<?php

if (!empty($_POST)) {



    require_once "../conexion/conexion.php";
// ID PARA CADA TABLA
    $idDoctor = $_POST["idDoctor"];
    $idPersona = $_POST["idPersona"];
    $idUsuario = $_POST["idUsuario"];

// DATOS DE LA PERSONA
    $nombrePersonaEditar = $_POST["nombrePersonaEditar"];
    $apellidoPersonaEditar = $_POST["apellidoPersonaEditar"];
    $dniPersonaEditar = $_POST["dniPersonaEditar"];
    $telefonoPersonaEditar = $_POST["telefonoPersonaEditar"];
    $correoPersonaEditar = $_POST["correoPersonaEditar"];

// DATOS DEL USUARIOS

    $nombreUsuarioEditar = $_POST["nombreUsuarioEditar"];
    // $contrasenaEditar = $_POST["contrasenaEditar"];
    $comboTipoUsuarioEditar = $_POST["comboTipoUsuarioEditar"];

// DATOS DEL DOCTOR

    $comboEspecialidades = $_POST["comboEspecialidades"];

    try {
        $conexion->beginTransaction();
    // modificacion de los datos en la tabla de personas
        $sqlInsertarPersona = "UPDATE `Personas` SET `nombrePersona`= :nombrePersona,`apellidoPersona`= :apellidoPersona,`dniPersona`= :dniPersona,`telefonoPersona`= :telefonoPersona,`emailPersona`= :emailPersona WHERE `idPersona` = :idPersona ";
        $statement = $conexion->prepare( $sqlInsertarPersona );
        $statement->bindParam( ":nombrePersona", $nombrePersonaEditar );
        $statement->bindParam( ":apellidoPersona", $apellidoPersonaEditar );
        $statement->bindParam( ":dniPersona", $dniPersonaEditar );
        $statement->bindParam( ":telefonoPersona", $telefonoPersonaEditar );
        $statement->bindParam( ":emailPersona", $correoPersonaEditar );
        $statement->bindParam( ":idPersona", $idPersona );
        $statement->execute();

    // modificacion en la tabla de usuario
        $sqlInsertarPersona = "UPDATE `Usuarios` SET `nombreUsuario`=:nombreUsuario,`idTipoUsuario`= :idTipoUsuario WHERE `idUsuario` = :idUsuario ";
        $statement = $conexion->prepare( $sqlInsertarPersona );
        $statement->bindParam( ":nombreUsuario", $nombreUsuarioEditar );
        // $statement->bindParam( ":contrasenaUsuario", $contrasenaEditar );
        $statement->bindParam( ":idTipoUsuario", $comboTipoUsuarioEditar );
        $statement->bindParam( ":idUsuario", $idUsuario );
        $statement->execute();

    // modificacion de los datos de la tabla doctores
        $sqlInsertarTurnosxDiaDoctor = "UPDATE `Doctores` SET `idEspecialidad`=:idEspecialidad WHERE `idDoctor` = :idDoctor ";
        $statement = $conexion->prepare( $sqlInsertarTurnosxDiaDoctor );
        $statement->bindParam( ":idDoctor", $idDoctor );
        $statement->bindParam( ":idEspecialidad", $comboEspecialidades );
        $statement->execute();

        $conexion->commit();
    // echo "bien";
    // return array( 'estado' => 200, 'mensaje' => 'Datos agregados correctamente' );

        echo '<script language = javascript>
        alert("Datos Modificados correctamente!!!")
        self.location = "index.php"
        </script>';

    } catch ( PDOException $e ) {
        $conexion->rollback();
    // echo $e->getMessage();
        echo '<script language = javascript>
        alert("Error al modificar los datos, por favor contacte con el administrador")
        self.location = "index.php"
        </script>';
    // return array( 'estado' => 500, 'mensaje' => $e->getMessage() );
    // die();
    }
}else{
    header("location: index.php");
}
?>