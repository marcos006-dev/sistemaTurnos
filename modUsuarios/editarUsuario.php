<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getTipoUsuario.php";
    require_once "../funciones/getEspecialidades.php";

    $rowTipoUsuario = getTipoUsuario( $conexion );
    $rowEspecialidades = getEspecialidades( $conexion );
    // $rowDoctores = getDoctores( $conexion );

    $id = $_GET['id'];

    // echo $id;
    try {
        $sqlEditarDoctores = "SELECT * FROM Doctores d1, Personas p1, Usuarios u1 WHERE d1.idPersona = p1.idPersona AND u1.idPersona = p1.idPersona AND u1.idUsuario = :idDoctor";
        $statement = $conexion->prepare( $sqlEditarDoctores );
        $statement->bindParam( ":idDoctor", $id );
        $statement->execute();
        $rowDoctoresEditar = $statement->rowCount() > 0 ? $statement : "";
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }

    $rowDoctoresEditar = $rowDoctoresEditar->fetchAll( PDO::FETCH_ASSOC )[0];
    // var_dump( $rowDoctoresEditar );

    // $rowHorariosTrabajoDoctor = getHorariosTrabajoDoctor( $conexion, $rowDoctoresEditar["idDoctor"] )->fetchAll( PDO::FETCH_ASSOC )[0];

    // echo $id;
    // var_dump( $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) );
    // var_dump();
?>
<?php if ( isset( $_SESSION['nombreUsuario'] ) ): ?>

    <section class="doctor_part section_padding">

        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-center">Editar Usuario</h1>

                    <form id="formAgregDoctor" action="./guardarModifUsuarios.php" method="POST">
                        <input type="hidden" name="idDoctor" id="idDoctor" value="<?php echo $rowDoctoresEditar["idDoctor"] ?>">
                        <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $rowDoctoresEditar["idPersona"] ?>">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $rowDoctoresEditar["idUsuario"] ?>">
                        <div class="form-group">
                            <label for="nombrePersona">Modifique su nombre:</label>
                            <input type="text" class="form-control bg-secondary text-dark" id="nombrePersona"
                            name="nombrePersonaEditar" aria-describedby="nombrePersona" autofocus value="<?php echo $rowDoctoresEditar["nombrePersona"]; ?>">
                            <small id="alertNombre"></small>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPersona">Modifique su apellido:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="apellidoPersona"
                            name="apellidoPersonaEditar" aria-describedby="apellidoPersona" autofocus value="<?php echo $rowDoctoresEditar["apellidoPersona"]; ?>">
                            <small id="alertApellido"></small>

                        </div>
                        <div class="form-group">
                            <label for="dniPersona">Modifique su dni:</label>
                            <input type="number" class="form-control  bg-secondary text-dark" id="dniPersona"
                            name="dniPersonaEditar" aria-describedby="dniPersona" autofocus value="<?php echo $rowDoctoresEditar["dniPersona"]; ?>">
                            <small id="alertDni"></small>

                        </div>
                        <div class="form-group">
                            <label for="telefonoPersona">Modifique su telefono:</label>
                            <input type="number" class="form-control  bg-secondary text-dark" id="telefonoPersona"
                            name="telefonoPersonaEditar" aria-describedby="telefonoPersona" autofocus value="<?php echo $rowDoctoresEditar["telefonoPersona"]; ?>">
                            <small id="alertTelefono"></small>

                        </div>

                        <div class="form-group">
                            <label for="correoPersona">Modifique su Correo:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="correoPersona"
                            name="correoPersonaEditar" aria-describedby="correoPersona" autofocus value="<?php echo $rowDoctoresEditar["emailPersona"]; ?>">
                            <small id="alertCorreo"></small>

                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Modifique su nombre de Usuario:</label>
                            <input type="text" class="form-control  bg-secondary text-dark" id="nombreUsuario"
                            name="nombreUsuarioEditar" aria-describedby="nombrenombreUsuarioDoctor" autofocus value="<?php echo $rowDoctoresEditar["nombreUsuario"]; ?>">
                            <small id="alertNombreUsuario"></small>
                        </div>
                        <!-- <div class="form-group">
                            <label for="apellidoDoctor">Modifique su Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark" id="contrasena"
                            name="contrasenaEditar" aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasena"></small>

                        </div>
                        <div class="form-group">
                            <label for="apellidoDoctor">Vuelva a Ingrese la misma Contraseña:</label>
                            <input type="password" class="form-control  bg-secondary text-dark"
                            id="contrasenaVerificacion" name="contrasenaVerificacionEditar"
                            aria-describedby="apellidoDoctor" autofocus>
                            <small id="alertContrasenaVerificada"></small>

                        </div> -->
                        <div class="form-group">
                            <label for="comboEspecialidades">Seleccione una Especialidad:</label>
                            <select id="comboEspecialidades" class="form-control bg-secondary text-dark" name="comboEspecialidades">
                                <option value="0" selected disabled>Elija</option>
                                <?php while ( $especial = $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) ): ?>
<?php if ( $especial["idEspecialidad"] == $rowDoctoresEditar["idEspecialidad"] ): ?>
                                       <option value="<?php echo $especial['idEspecialidad']; ?>" selected><?php echo $especial['descripcionEspecialidad']; ?></option>
                                   <?php else: ?>
                                    <option value="<?php echo $especial['idEspecialidad']; ?>"><?php echo $especial['descripcionEspecialidad']; ?></option>

                                <?php endif?>
<?php endwhile?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comboTipoUsuario">Seleccione el Tipo de Usuario:</label>
                        <select id="comboTipoUsuario" class="form-control bg-secondary text-dark"
                        name="comboTipoUsuarioEditar">
                        <option value="0" selected disabled>Elija</option>
                        <?php while ( $tipoUsu = $rowTipoUsuario->fetch( PDO::FETCH_ASSOC ) ): ?>
<?php if ( $rowDoctoresEditar["idTipoUsuario"] == $tipoUsu["idTipoUsuario"] ): ?>

                                <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>" selected>
                                    <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>">
                                        <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                                    <?php endif?>
<?php endwhile?>
                            </select>
                            <small id="alertTipoUsuario"></small>
                        </div>

                        <div class="form-group">

                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" id="btnGuardarUsuario" class="btn btn-warning form-control">Modificar
                            Usuario</button>
                            <small id="alertBtn"></small>

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
<?php endif?>