<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getTipoUsuario.php";


    $rowTipoUsuario = getTipoUsuario( $conexion );


    // var_dump( $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) );
    // var_dump();
?>
<?php if (isset( $_SESSION['nombreUsuario'])): ?>

<section class="doctor_part section_padding">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-center">Agregar Usuario</h1>

                <form id="formAgregDoctor" action="resultFormAgregarUsuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombreDoctor">Ingrese un nombre de Usuario:</label>
                        <input type="text" required class="single-input" id="nombreUsuario" name="nombreDoctor"
                            aria-describedby="nombreDoctor" autofocus>
                        <small class="text-danger" id="alertNombreUsuario"></small>
                    </div>
                    <div class="form-group">
                        <label for="apellidoDoctor">Ingrese una Contraseña:</label>
                        <input type="password" required class="single-input" id="contrasena" name="contrasena"
                            aria-describedby="apellidoDoctor" autofocus>
                        <small class="text-danger" id="alertContrasena"></small>

                    </div>
                    <div class="form-group">
                        <label for="apellidoDoctor">Vuelva a Ingrese la misma Contraseña:</label>
                        <input type="password" required class="single-input" id="contrasenaVerificacion"
                            name="contrasenaVerificacion" aria-describedby="apellidoDoctor" autofocus>
                        <small class="text-danger" id="alertContrasenaVerificada"></small>

                    </div>


                    <div class="form-group">
                        <label for="comboTipoUsuario">Seleccione el Tipo de Usuario:</label>
                        <select id="comboTipoUsuario" required class="form-control bg-secondary text-dark"
                            name="comboTipoUsuario">
                            <option value="0" selected disabled>Elija</option>
                            <?php while ( $tipoUsu = $rowTipoUsuario->fetch( PDO::FETCH_ASSOC ) ): ?>
                            <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>">
                                <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                            <?php endwhile?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="EstadoUsuario">Seleccione el Estado del Usuario:</label>
                        <select id="comboEstadoUsuario" required class="form-control bg-secondary text-dark"
                            name="estadoUsuario">
                            <option value="0" selected disabled>Elija</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group" id="tablaTurnosxDia">

                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" id="btnGuardarUsuario" class="btn btn-primary form-control">Guardar
                            Usuario</button>
                        <small class="text-danger" id="alertBtn"></small>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php

    require_once "../helpers/footer.php";

?>

<?php else: ?>
<?php 
echo '<script language = javascript>
    alert("Debe iniciar sesion para acceder a este modulo, vuelva a intentarlo")
    self.location = "../modLogin/index.php"
    </script>';

 ?>
<?php endif ?>