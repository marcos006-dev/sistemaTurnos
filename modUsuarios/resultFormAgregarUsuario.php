<?php

$nombreUsuario = $_POST['nombreUsuario'];


if ($nombreUsuario != "") {
    echo json_encode('se envio y se recibieron los datos');
}else{
    echo json_encode('no se enviaron los datos');

}


?>