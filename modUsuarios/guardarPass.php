<?php

require_once '../conexion/conexion.php';

if ( empty( $_POST['password'] ) || empty( $_POST['repPassword'] ) || empty( $_POST['token'] ) ) {
    echo '<script language = javascript>
		self.location = "../modLogin/index.php"
		</script>';
}

try {

    $password = $_POST['password'];
    $repPassword = $_POST['repPassword'];
    $token = $_POST['token'];

    if ( $password != $repPassword ) {

        echo "<script type=\"text/javascript\">
  			alert(\"Las contraseñas no coinciden por favor verifique!\");
  			self.location = \"recuperacionPass.php?token=$token\";
  		</script>";
    }

    $sqlVerifToken = "SELECT * FROM `Usuarios` WHERE `token` = :token";
    $statement = $conexion->prepare( $sqlVerifToken );
    $statement->bindParam( ":token", $token );
    $statement->execute();
} catch ( Exception $e ) {
    die( $e->getMessage() );
}

if ( $statement->rowCount() > 0 ) {

    try {

        $sqlCambiarContra = "UPDATE `Usuarios` SET `contrasenaUsuario` = MD5(:contrasenaUsuario), token ='' WHERE `token` = :token";
        $statement = $conexion->prepare( $sqlCambiarContra );
        $statement->bindParam( ":contrasenaUsuario", $password );
        $statement->bindParam( ":token", $token );
        $statement->execute();

        echo '<script language = javascript>
		alert("Contraseña guardado correctamente!!!")
		self.location = "../modLogin/index.php"
		</script>';
    } catch ( Exception $e ) {
        echo $e->getMessage();

        die();
        echo "<script type=\"text/javascript\">
  			alert(\"Error al guardar la nueva contraseña, intentelo mas tarde\");
  			self.location = \"recuperacionPass.php?token=$token\";
  		</script>";
    }

} else {

    echo "<script type=\"text/javascript\">
  			alert(\"Clave de recuperaciòn ya utilizada, vuelva a pedir una nueva\");
  			self.location = \"../modLogin/index.php\";
  		</script>";

}

?>