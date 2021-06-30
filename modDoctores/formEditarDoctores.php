<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getEspecialidades.php";
    require_once "../funciones/getHorariosDoctor.php";
    require_once "../funciones/getHorariosTrabajo.php";

    $id = $_GET["id"];

    try {
        $sqlListadoDoctores = "SELECT * FROM Doctores d1, Personas p1 WHERE d1.idPersona = p1.idPersona AND d1.idDoctor = :idDoctor";
        $statement = $conexion->prepare( $sqlListadoDoctores );
        $statement->bindParam( ":idDoctor", $id );
        $statement->execute();
        $rowDoctoresEditar = $statement->rowCount() > 0 ? $statement : "";
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }
    $rowDoctoresEditar = $rowDoctoresEditar->fetchAll( PDO::FETCH_ASSOC )[0];

    $rowEspecialidades = getEspecialidades( $conexion );

    $rowHorariosTrabajoDoctor = getHorariosTrabajoDoctor( $conexion, $rowDoctoresEditar["idDoctor"] )->fetchAll( PDO::FETCH_ASSOC )[0];

    $rowHorariosTrabajo = getHorariosTrabajo( $conexion );
?>
<section class="doctor_part section_padding">

    <div class="container">
        <div class="row">
          <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-center">Modificar Doctor: </h1>
            <input type="hidden" name="idDoctor" id="idDoctor" value="<?php echo $rowDoctoresEditar["idDoctor"] ?>">
            <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $rowDoctoresEditar["idPersona"] ?>">
            <form id="formAgregDoctor" action="#" method="#">
                <div class="form-group">
                    <label for="nombreDoctor">Ingrese un nombre:</label>
                    <input type="text" class="single-input" id="nombreDoctor" name="nombreDoctor" aria-describedby="nombreDoctor" autofocus value="<?php echo $rowDoctoresEditar["nombrePersona"]; ?>">
                    <small class="text-danger" id="alertNombre"></small>
                </div>
                <div class="form-group">
                    <label for="apellidoDoctor">Ingrese un apellido:</label>
                    <input type="text" class="single-input" id="apellidoDoctor" name="apellidoDoctor" aria-describedby="apellidoDoctor" autofocus value="<?php echo $rowDoctoresEditar["apellidoPersona"]; ?>">
                    <small class="text-danger" id="alertApellido"></small>

                </div>
                <div class="form-group">
                    <label for="dniDoctor">Ingrese un dni:</label>
                    <input type="number" class="single-input" id="dniDoctor" name="dniDoctor" aria-describedby="dniDoctor" autofocus value="<?php echo $rowDoctoresEditar["dniPersona"]; ?>">
                    <small class="text-danger" id="alertDni"></small>

                </div>
                <div class="form-group">
                    <label for="telefonoDoctor">Ingrese un telefono:</label>
                    <input type="number" class="single-input" id="telefonoDoctor" name="telefonoDoctor" aria-describedby="telefonoDoctor" autofocus value="<?php echo $rowDoctoresEditar["telefonoPersona"]; ?>">
                    <small class="text-danger" id="alertTelefono"></small>

                </div>

                <div class="form-group">
                    <label for="correoDoctor">Ingrese un Correo:</label>
                    <input type="text" class="single-input" id="correoDoctor" name="correoDoctor" aria-describedby="correoDoctor" autofocus value="<?php echo $rowDoctoresEditar["emailPersona"]; ?>">
                    <small class="text-danger" id="alertCorreo"></small>

                </div>

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
                <label for="comboHorariosTrabajosEditar">Seleccione un Horario:</label>
                <select id="comboHorariosTrabajosEditar" class="form-control bg-secondary text-dark" name="comboHorariosTrabajosEditar">
                    <option value="0" selected disabled>Elija</option>
                    <?php while ( $horTrab = $rowHorariosTrabajo->fetch( PDO::FETCH_ASSOC ) ): ?>
<?php if ( $rowHorariosTrabajoDoctor["idHorarioTrabajo"] == $horTrab["idHorarioTrabajo"] ): ?>

                           <option value="<?php echo $horTrab['idHorarioTrabajo']; ?>" selected><?php echo $horTrab['descripcionHorario']; ?></option>
                       <?php else: ?>
                           <option value="<?php echo $horTrab['idHorarioTrabajo']; ?>"><?php echo $horTrab['descripcionHorario']; ?></option>

                       <?php endif?>
<?php endwhile?>
               </select>
           </div>
           <div class="form-group" id="tablaTurnosxDiaEditar">

           </div>
           <div class="form-group mt-5">
            <button type="submit" id="btnGuardarDoctor" class="btn btn-primary form-control">Guardar Doctor</button>
            <small class="text-danger" id="alertBtn"></small>
        </div>
        <div class="form-group">
            <!-- <button onclick="location.href='index.php'" class="btn btn-warning form-control">Cancelar</button> -->
        </div>
    </form>
</div>
</div>
</div>
</section>

<?php

    require_once "../helpers/footer.php";

?>