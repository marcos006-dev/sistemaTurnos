<?php

require_once '../conexion/conexion.php';


// $asignarDoctor = $_POST['asignarComboDoctor'];
$asignarNombreUsuario = $_POST['asignarNombreUsuario'];
$asignarContrasena = $_POST['asignarContrasena'];
$asignarTipoUsuario = $_POST['asignarComboTipoUsuario'];
$asignarIdpersona = $_POST['idPersona'];

if ( !empty($asignarNombreUsuario) && !empty($asignarContrasena) && !empty($asignarTipoUsuario)) {
    
      $sqlInsertarPersonaUsuario = "INSERT INTO `Usuarios`( `nombreUsuario`, `contrasenaUsuario`, `estadoUsuario`, `idTipoUsuario`, `idPersona`, `token`) VALUES (:nombreUsuario,MD5(:asignarContrasena),'1',:asignarTipoUsuario,:asignarIdpersona,'')";
        $statement = $conexion->prepare( $sqlInsertarPersonaUsuario );
        // $statement->bindParam( ":asignarDoctor", $asignarDoctor );
        $statement->bindParam( ":nombreUsuario", $asignarNombreUsuario );
        $statement->bindParam( ":asignarContrasena", $asignarContrasena );
        $statement->bindParam( ":asignarTipoUsuario", $asignarTipoUsuario );
        $statement->bindParam( ":asignarIdpersona", $asignarIdpersona );
        $statement->execute();

        echo json_encode(true);

}else{
echo json_encode(false);
}

?>