<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";

    try {
        $sqlListadoUsuarios = "SELECT u1.idUsuario, u1.nombreUsuario, u1.estadoUsuario, tu.descripcionTipoUsuario  FROM Usuarios u1, TipoUsuario tu WHERE tu.idTipoUsuario = u1.idTipoUsuario";
        $statement = $conexion->prepare( $sqlListadoUsuarios );
        $statement->execute();
        $rowUsuarios = $statement->rowCount() > 0 ? $statement : "";
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }

?>

<?php if ( isset( $_SESSION['nombreUsuario'] ) ): ?>

    <section class="doctor_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if ( empty( $rowUsuarios ) ): ?>

                        <div class="alert alert-warning" role="alert">
                            Aun no hay registros cargados
                        </div>
                    <?php else: ?>

                        <h1 class="text-center">Listado de Usuarios</h1>
                        <a href="formAgregarUsuarios.php" class="btn btn-primary mb-3 text-left">Agregar Usuario</a>
                        <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre de Usuario</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Tipo de Usuario</th>
                                    <th class="text-center">Recuperar Cuenta</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ( $Usuarios = $rowUsuarios->fetch( PDO::FETCH_ASSOC ) ): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $Usuarios['nombreUsuario']; ?></td>
                                        <td class="text-center"><?php echo $Usuarios['estadoUsuario'] == "1" ? "Activo" : "Inactivo"; ?></td>
                                        <td class="text-center"><?php echo $Usuarios['descripcionTipoUsuario']; ?></td>

                                        <td class="text-center">
                                            <?php echo "<a href='enviarCorreo.php?idUsuario=" . $Usuarios['idUsuario'] . "' class='btn btn-success' onclick='recuperarUsuario(event)'>Recuperar Cuenta</a>" ?>
                                        </td>

                                        <td class="text-center">
                                            <?php echo "<a href='editarUsuario.php?id=" . $Usuarios['idUsuario'] . "' class='btn btn-warning'>Editar</a>" ?>
                                        </td>
                                        <?php if ( $Usuarios["estadoUsuario"] == "1" ): ?>

                                            <td class="text-center">
                                                <?php echo "<a href='modSuscripciones/modifSuscripcion/editarFormSuscriptor.php?id=" . $Usuarios['idUsuario'] . "' class='btn btn-danger' onclick='eliminarUsuario(event)'>Eliminar</a>" ?>
                                            </td>
                                        <?php else: ?>
                                            <td class="text-center">
                                                <?php echo "<a href='modSuscripciones/modifSuscripcion/editarFormSuscriptor.php?id=" . $Usuarios['idUsuario'] . "' class='btn btn-info' onclick='reactivarUsuario(event)'>Reactivar</a>" ?>
                                            </td>

                                        <?php endif?>
                                    </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    <?php endif?>

                </div>
            </div>
        </div>
    </section>
<?php else: ?>
<?php
    echo '<script language = javascript>
    alert("Debe iniciar sesion para acceder a este modulo, vuelva a intentarlo")
    self.location = "../modLogin/index.php"
    </script>';

?>
<?php endif?>
<?php

    require_once "../helpers/footer.php";

?>
