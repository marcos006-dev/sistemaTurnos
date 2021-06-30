<?php 
	
session_start();

if (isset($_SESSION['usuario'])){	
	#session_destroy();
	session_destroy();
	
	echo '<script language = javascript>
	alert("Su sesion ha terminado correctamente")
	self.location = "../index.php"
	</script>';
	
}else{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesion, por favor registrese")
	self.location = "../index.php"
	</script>';
}
?>