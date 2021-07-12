<?php

include_once '../conexion/conexion.php';

$nombrePersona = $_POST['nombrePersona'];
$apellidoPersona = $_POST['apellidoPersona'];
$dniPersona = $_POST['dniPersona'];
$telefonoPersona = $_POST['telefonoPersona'];
$correoPersona = $_POST['correoPersona'];

$nombreUsuario = $_POST['nombreUsuario'];
$contrasenaUsuario = $_POST['contrasena'];
$tipoUsuario = $_POST['tipoUsuario'];

if ( !empty( $nombrePersona ) && !empty( $apellidoPersona ) && !empty( $dniPersona ) && !empty( $telefonoPersona ) && !empty( $correoPersona ) && !empty( $nombreUsuario ) && !empty( $contrasenaUsuario ) && !empty( $tipoUsuario ) ) {

    // inserccion de los datos en la tabla de personas
    $sqlInsertarPersona = "INSERT INTO `Personas`(`nombrePersona`, `apellidoPersona`, `dniPersona`, `telefonoPersona`,
  `emailPersona`) VALUES (:nombrePersona, :apellidoPersona, :dniPersona, :telefonoPersona, :emailPersona)";
    $statement = $conexion->prepare( $sqlInsertarPersona );
    $statement->bindParam( ":nombrePersona", $nombrePersona );
    $statement->bindParam( ":apellidoPersona", $apellidoPersona );
    $statement->bindParam( ":dniPersona", $dniPersona );
    $statement->bindParam( ":telefonoPersona", $telefonoPersona );
    $statement->bindParam( ":emailPersona", $correoPersona );
    $statement->execute();
    $idPersonaInsertada = $conexion->lastInsertId();

    // inserccion en la tabla de doctores
    $sqlInsertarDoctor = "INSERT INTO `Doctores`(`idPersona`, `idEspecialidad`) VALUES (:idPersona, 3)";
    $statemente = $conexion->prepare( $sqlInsertarDoctor );

    $statemente->bindParam( ":idPersona", $idPersonaInsertada );
    $statemente->execute();

    // inserccion en la tabla de doctores
    $sqlInsertarUsuario = "INSERT INTO `Usuarios`(`nombreUsuario`, `contrasenaUsuario`, `estadoUsuario`, `idTipoUsuario`, `idPersona`, `token`) VALUES (:nombreUsuario,MD5(:contrasena),'1',:tipoUsuario,:idPersona,'')";
    $statemente = $conexion->prepare( $sqlInsertarUsuario );
    $statemente->bindParam( ":nombreUsuario", $nombreUsuario );
    $statemente->bindParam( ":contrasena", $contrasenaUsuario );
    $statemente->bindParam( ":tipoUsuario", $tipoUsuario );
    $statemente->bindParam( ":idPersona", $idPersonaInsertada );
    $statemente->execute();

    echo json_encode( true );

} else {

    echo json_encode( false );

}

?>