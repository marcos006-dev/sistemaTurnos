<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getTipoUsuario.php";
    require_once "../funciones/getDoctores.php";


    $rowTipoUsuario = getTipoUsuario( $conexion );
    $rowDoctores = getDoctores($conexion)

    // var_dump( $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) );
    // var_dump();
?>
<?php if (isset( $_SESSION['nombreUsuario'])): ?>

<div style="margin-top: 7%;" class="container w3-bar w3-black">
    <button class="w3-bar-item w3-button form-control-lg" onclick="formulariosAlta('usuCompleto')">Agregar
        Usuario
        Completo</button>
    <button class="w3-bar-item w3-button  form-control-lg " onclick="formulariosAlta('asignarUsuario')">Asignar
        Usuario</button>
</div>

<div id="usuCompleto" class="formulario" style="display:none">

    <section class="doctor_part section_padding">

        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-center">Agregar Usuario Completo</h1>

                    <form id="formAgregDoctor">
                        <div class="form-group">
                            <label for="nombrePersona">Ingrese un nombre:</label>
                            <input type="text" class="form-control bg-secondary text-dark" id="nombrePersona"
                                name="nombrePersona" aria-describedby="nombrePersona" autofocus>
                            <small id="alertNombre"></small>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPersona">Ingrese un apellido:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="apellidoPersona"
                                name="apellidoPersona" aria-describedby="apellidoPersona" autofocus>
                            <small id="alertApellido"></small>

                        </div>
                        <div class="form-group">
                            <label for="dniPersona">Ingrese un dni:</label>
                            <input type="number" class="form-control  bg-secondary text-dark" id="dniPersona"
                                name="dniPersona" aria-describedby="dniPersona" autofocus>
                            <small id="alertDni"></small>

                        </div>
                        <div class="form-group">
                            <label for="telefonoPersona">Ingrese un telefono:</label>
                            <input type="number" class="form-control  bg-secondary text-dark" id="telefonoPersona"
                                name="telefonoPersona" aria-describedby="telefonoPersona" autofocus>
                            <small id="alertTelefono"></small>

                        </div>

                        <div class="form-group">
                            <label for="correoPersona">Ingrese un Correo:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="correoPersona"
                                name="correoPersona" aria-describedby="correoPersona" autofocus>
                            <small id="alertCorreo"></small>

                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Ingrese un nombre de Usuario:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="nombreUsuario"
                                name="nombreUsuario" aria-describedby="nombrenombreUsuarioDoctor" autofocus>
                            <small id="alertNombreUsuario"></small>
                        </div>
                        <div class="form-group">
                            <label for="apellidoDoctor">Ingrese una Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark" id="contrasena"
                                name="contrasena" aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasena"></small>

                        </div>
                        <div class="form-group">
                            <label for="apellidoDoctor">Vuelva a Ingrese la misma Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark"
                                id="contrasenaVerificacion" name="contrasenaVerificacion"
                                aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasenaVerificada"></small>

                        </div>


                        <div class="form-group">
                            <label for="comboTipoUsuario">Seleccione el Tipo de Usuario:</label>
                            <select id="comboTipoUsuario" class="form-control bg-secondary text-dark"
                                name="comboTipoUsuario">
                                <option value="0" selected disabled>Elija</option>
                                <?php while ( $tipoUsu = $rowTipoUsuario->fetch( PDO::FETCH_ASSOC ) ): ?>
                                <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>">
                                    <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                                <?php endwhile?>
                            </select>
                            <small id="alertTipoUsuario"></small>
                        </div>

                        <div class="form-group">

                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" id="btnGuardarUsuario" class="btn btn-primary form-control">Guardar
                                Usuario</button>
                            <small id="alertBtn"></small>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<div id="asignarUsuario" class="formulario" style="display:none">
    <section class="doctor_part section_padding">

        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-center">Asigne un Usuario </h1>

                    <form id="asignarFormAgregDoctor">

                        <div class="form-group">
                            <label for="comboTipoUsuario">Seleccione un Doctor:</label>
                            <select id="asignarTipoUsuario" class="form-control bg-secondary text-dark"
                                name="comboTipoUsuario">
                                <option value="0" selected disabled>Elija</option>
                                <?php while ( $doctor = $rowDoctores->fetch( PDO::FETCH_ASSOC ) ): ?>
                                <option value="<?php echo $doctor['idDoctor']; ?>">
                                    <?php echo $doctor['nombrePersona']." ".$doctor['apellidoPersona']; ?></option>
                                <?php endwhile?>
                            </select>
                            <small id="alertTipoUsuario"></small>
                        </div>


                        <div class="form-group">
                            <label for="nombreUsuario">Ingrese un nombre de Usuario:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="asignarNombreUsuario"
                                name="nombreUsuario" aria-describedby="nombrenombreUsuarioDoctor" autofocus>
                            <small id="alertNombreUsuario"></small>
                        </div>
                        <div class="form-group">
                            <label for="apellidoDoctor">Ingrese una Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark" id="asignarContrasena"
                                name="contrasena" aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasena"></small>

                        </div>
                        <div class="form-group">
                            <label for="apellidoDoctor">Vuelva a Ingrese la misma Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark"
                                id="asignarContrasenaVerificacion" name="contrasenaVerificacion"
                                aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasenaVerificada"></small>

                        </div>


                        <div class="form-group">
                            <label for="comboTipoUsuario">Seleccione el Tipo de Usuario:</label>
                            <select id="asignarComboTipoUsuario" class="form-control bg-secondary text-dark"
                                name="comboTipoUsuario">
                                <option value="0" selected disabled>Elija</option>
                                <?php while ( $tipoUsu = $rowTipoUsuario->fetch( PDO::FETCH_ASSOC ) ): ?>
                                <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>">
                                    <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                                <?php endwhile?>
                            </select>
                            <small id="alertTipoUsuario"></small>
                        </div>


                        <div class="form-group mt-5">
                            <button type="submit" id="asignarBtnGuardarUsuario"
                                class="btn btn-primary form-control">Guardar
                                Usuario</button>
                            <small id="alertBtn"></small>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>


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