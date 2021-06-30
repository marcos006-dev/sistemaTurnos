<?php 
//Proceso de conexión con la base de datos

require_once'../conexion/conexion.php';


//Inicio de variables de sesión
if (!isset($_SESION)) {
	session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['password'];

/*echo($usuario);
echo($contrasena);
*/
//Consultar si los datos son están guardados en la base de datos

$sql = "SELECT * FROM Usuarios u1, TipoUsuario t1 WHERE u1.idTipoUsuario = t1.idTipoUsuario AND u1.nombreUsuario = :nombreUsuario AND u1.contrasenaUsuario = :contrasenaUsuario";
$statement = $paramConexion->prepare($sql);
$statement->bindParam( ":nombreUsuario", $usuario);
$statement->bindParam( ":contrasenaUsuario", $contrasena);
$statement->execute();
$rowUsuarios = $statement->rowCount() > 0 ? $statement : "";
echo($rowUsuarios);


if ($fila = $rowUsuarios->fetch( PDO::FETCH_ASSOC )) {

	$_SESSION['idUsuario'] = $fila['idUsuario'];  
	$_SESSION['nombreUsuario'] = $fila['nombreUsuario'];
	$_SESSION['idTipoUsuario'] = $fila['idTipoUsuario'];	
	
	header('location: ../index.php');
}else{

	echo '<script language = javascript>
	alert("A ingresado mal su usuario o su clave, vuelva a intentarlo")
	self.location = "index.php"
	</script>';


}
?>