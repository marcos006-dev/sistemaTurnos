<?php

    require_once "../helpers/head.php";
    require_once "../conexion/conexion.php";

    try {
        $token = $_GET['token'];
        $sqlVerifToken = "SELECT * FROM `Usuarios` WHERE `token` = :token";
        $statement = $conexion->prepare( $sqlVerifToken );
        $statement->bindParam( ":token", $token );
        $statement->execute();
    } catch ( Exception $e ) {
        die( $e->getMessage() );
    }

?>

<?php if ( $statement->rowCount() > 0 ): ?>


<section class="doctor_part section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-center">Recuperar Contraseña</h1>

                <form action="./guardarPass.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <div class="form-group">
                        <label for="password">Por favor ingrese su nueva contraseña</label>:
                        <input type="password" class="form-control" id="password" name="password" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="repPassword">Por favor repita su nueva contraseña</label>:
                        <input type="password" class="form-control" id="repPassword" name="repPassword" >
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Cambiar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php require_once "../helpers/footer.php";?>

	<?php else: ?>

		<?php

            echo '<script language = javascript>
		alert("Còdigo de recuperaciòn invalido, vuelva a intentarlo")
		self.location = "index.php"
		</script>';

        ?>

	<?php endif?>