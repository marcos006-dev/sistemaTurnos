<?php

require_once '../conexion/conexion.php';
require_once 'sendEmail.php';

$idUsuario = $_GET['idUsuario'];

// echo $idUsuario;
// die();

try {
    $sqlListadoUsuarios = "SELECT * FROM Usuarios u1, Personas p1 WHERE u1.idPersona = p1.idPersona AND u1.idUsuario = :idUsuario";
    $statement = $conexion->prepare( $sqlListadoUsuarios );
    $statement->bindParam( ":idUsuario", $idUsuario );
    $statement->execute();
    // echo $statement->rowCount();
} catch ( Exception $e ) {
    die( $e->getMessage() );
}

// die();
if ( $statement->rowCount() > 0 ) {

    try {
        $rowUsuario = $statement->fetch( PDO::FETCH_ASSOC );
        $uniqidStr = md5( uniqid( mt_rand() ) );
        $sqlRecupUsu = "UPDATE `Usuarios` SET `token` = :token WHERE `idUsuario` = :idUsuario ";
        $statement = $conexion->prepare( $sqlRecupUsu );
        $statement->bindParam( ":idUsuario", $rowUsuario["idUsuario"] );
        $statement->bindParam( ":token", $uniqidStr );
        // $statement->execute();
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }

    if ( $statement->execute() ) {
        // echo "Token" . $uniqidStr;
        sendEmail( $rowUsuario["emailPersona"], $uniqidStr );

        echo '<script language = javascript>
		alert("Se a enviado un correo de recuperacion, por favor revise su bandeja de mensajes!")
		self.location = "index.php"
		</script>';

    } else {
        echo '<script language = javascript>
		alert("Error al enviar el correo, vuelva a intentarlo")
		self.location = "index.php"
		</script>';
    }

} else {

    echo '<script language = javascript>
	alert("Correo ingresado incorrectamente, vuelva a intentarlo")
	self.location = "index.php"
	</script>';
}
?>
