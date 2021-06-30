<?php
    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";
    require_once "../funciones/getEspecialidades.php";
    require_once "../funciones/getHorariosTrabajo.php";

    $rowEspecialidades = getEspecialidades( $conexion );
    $rowHorariosTrabajo = getHorariosTrabajo( $conexion );

    // var_dump( $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) );
    // var_dump();
?>
<section class="doctor_part section_padding">

 <div class="container">
    <div class="row">
      <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-center">Cargar Doctor</h1>

        <form id="formAgregDoctor" action="#" method="#">
            <div class="form-group">
                <label for="nombreDoctor">Ingrese un nombre:</label>
                <input type="text" class="single-input" id="nombreDoctor" name="nombreDoctor" aria-describedby="nombreDoctor" autofocus>
                <small class="text-danger" id="alertNombre"></small>
            </div>
            <div class="form-group">
                <label for="apellidoDoctor">Ingrese un apellido:</label>
                <input type="text" class="single-input" id="apellidoDoctor" name="apellidoDoctor" aria-describedby="apellidoDoctor" autofocus>
                <small class="text-danger" id="alertApellido"></small>

            </div>
            <div class="form-group">
                <label for="dniDoctor">Ingrese un dni:</label>
                <input type="number" class="single-input" id="dniDoctor" name="dniDoctor" aria-describedby="dniDoctor" autofocus>
                <small class="text-danger" id="alertDni"></small>

            </div>
            <div class="form-group">
                <label for="telefonoDoctor">Ingrese un telefono:</label>
                <input type="number" class="single-input" id="telefonoDoctor" name="telefonoDoctor" aria-describedby="telefonoDoctor" autofocus>
                <small class="text-danger" id="alertTelefono"></small>

            </div>

            <div class="form-group">
                <label for="correoDoctor">Ingrese un Correo:</label>
                <input type="text" class="single-input" id="correoDoctor" name="correoDoctor" aria-describedby="correoDoctor" autofocus>
                <small class="text-danger" id="alertCorreo"></small>

            </div>

            <div class="form-group">
                        <label for="comboEspecialidades">Seleccione una Especialidad:</label>
						<select id="comboEspecialidades" class="form-control bg-secondary text-dark" name="comboEspecialidades">
				            <option value="0" selected disabled>Elija</option>
							<?php while ( $especial = $rowEspecialidades->fetch( PDO::FETCH_ASSOC ) ): ?>
    							<option value="<?php echo $especial['idEspecialidad']; ?>"><?php echo $especial['descripcionEspecialidad']; ?></option>
                            <?php endwhile?>
					    </select>
			</div>
            <div class="form-group">
                        <label for="comboHorariosTrabajos">Seleccione un Horario:</label>
						<select id="comboHorariosTrabajos" class="form-control bg-secondary text-dark" name="comboHorariosTrabajos">
				            <option value="0" selected disabled>Elija</option>
                            <?php while ( $horTrab = $rowHorariosTrabajo->fetch( PDO::FETCH_ASSOC ) ): ?>
    							<option value="<?php echo $horTrab['idHorarioTrabajo']; ?>"><?php echo $horTrab['descripcionHorario']; ?></option>
                            <?php endwhile?>
					    </select>
			</div>
            <div class="form-group" id="tablaTurnosxDia">

            </div>
        <div class="form-group mt-5">
            <button type="submit" id="btnGuardarDoctor" class="btn btn-success form-control">Guardar Doctor</button>
            <small class="text-danger" id="alertBtn"></small>
        </div>
        <div class="form-group">
        <input type="button" class=" btn btn-danger form-control" onClick="location.href='index.php'" value="Cancelar">
        </div>
        </form>
      </div>
    </div>
  </div>
</section>


<?php

    require_once "../helpers/footer.php";

?>