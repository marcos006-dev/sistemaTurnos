<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getTipoUsuario.php";


    $rowTipoUsuario = getTipoUsuario( $conexion );


    // var_dump( $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) );
    // var_dump();
?>
<section class="doctor_part section_padding">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-center">Agregar Usuario</h1>

                <form id="formAgregDoctor" action="#" method="#">
                    <div class="form-group">
                        <label for="nombreDoctor">Ingrese un nombre de Usuario:</label>
                        <input type="text" class="single-input" id="nombreDoctor" name="nombreDoctor"
                            aria-describedby="nombreDoctor" autofocus>
                        <small class="text-danger" id="alertNombre"></small>
                    </div>
                    <div class="form-group">
                        <label for="apellidoDoctor">Ingrese una Contraseña:</label>
                        <input type="text" class="single-input" id="apellidoDoctor" name="apellidoDoctor"
                            aria-describedby="apellidoDoctor" autofocus>
                        <small class="text-danger" id="alertApellido"></small>

                    </div>
                    <div class="form-group">
                        <label for="apellidoDoctor">Vuelva a Ingrese la misma Contraseña:</label>
                        <input type="text" class="single-input" id="apellidoDoctor" name="apellidoDoctor"
                            aria-describedby="apellidoDoctor" autofocus>
                        <small class="text-danger" id="alertApellido"></small>

                    </div>


                    <div class="form-group">
                        <label for="comboEspecialidades">Seleccione el Tipo de Usuario:</label>
                        <select id="comboEspecialidades" class="form-control bg-secondary text-dark"
                            name="comboEspecialidades">
                            <option value="0" selected disabled>Elija</option>
                            <?php while ( $tipoUsu = $rowTipoUsuario->fetch( PDO::FETCH_ASSOC ) ): ?>
                            <option value="<?php echo $tipoUsu['idTipoUsuario']; ?>">
                                <?php echo $tipoUsu['descripcionTipoUsuario']; ?></option>
                            <?php endwhile?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comboHorariosTrabajos">Seleccione el Estado del Usuario:</label>
                        <select id="comboHorariosTrabajos" class="form-control bg-secondary text-dark"
                            name="comboHorariosTrabajos">
                            <option value="0" selected disabled>Elija</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group" id="tablaTurnosxDia">

                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" id="btnGuardarDoctor" class="btn btn-primary form-control">Guardar
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