<?php
require_once "../helpers/head.php";
require_once "../conexion/conexion.php";

try {
    $sqlListadoDoctores = "SELECT d1.idDoctor, e1.descripcionEspecialidad, p1.* FROM Doctores d1, Especialidades e1, Personas p1 WHERE d1.idPersona = p1.idPersona AND d1.idEspecialidad = e1.idEspecialidad";
    $statement = $conexion->prepare( $sqlListadoDoctores );
    $statement->execute();
    $rowDoctores = $statement->rowCount() > 0 ? $statement : "";
} catch ( Exception $e ) {
    die( $e->getMessage() );
}

?>

<?php if (isset( $_SESSION['nombreUsuario'])): ?>

<section class="doctor_part section_padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <?php if ( empty( $rowDoctores ) ): ?>

          <div class="alert alert-warning" role="alert">
            Aun no hay registros cargados
        </div>
    <?php else: ?>

      <h1 class="text-center">Listado doctores</h1>
      <a href="formAgregDoctor.php" class="btn btn-primary mb-3 text-left">Agregar Doctor</a>
      <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Nombre Apellido</th>
                <th class="text-center">Dni</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Crreo</th>
                <th class="text-center">Especialidad</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>

            <?php while ( $doctores = $rowDoctores->fetch( PDO::FETCH_ASSOC ) ): ?>
                <tr>
                    <td class="text-center"><?php echo $doctores['nombrePersona'] . " " . $doctores['apellidoPersona']; ?></td>
                    <td class="text-center"><?php echo $doctores['dniPersona']; ?></td>
                    <td class="text-center"><?php echo $doctores['telefonoPersona']; ?></td>
                    <td class="text-center"><?php echo $doctores['emailPersona']; ?></td>
                    <td class="text-center"><?php echo $doctores['descripcionEspecialidad']; ?></td>

                    <td class="text-center"><?php echo "<a href='formEditarDoctores.php?id=" . $doctores['idDoctor'] . "' class='btn btn-warning'>Editar</a>" ?></td>
                    <?php if ($doctores['estadoPersona'] == "1"): ?>

                        <td class="text-center"><?php echo "<a href='formEliminarDoctores.php?id=" . $doctores['idDoctor'] . "' class='btn btn-danger eliminar' onclick='eliminarDatos(event)'>Eliminar</a>" ?></td>
                    <?php else: ?>
                        <td class="text-center"><?php echo "<a href='formEliminarDoctores.php?id=" . $doctores['idDoctor'] . "' class='btn btn-primary' onclick='eliminarDatos(event)'>Reactivar</a>" ?></td>
                    <?php endif ?>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
<?php endif?>
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