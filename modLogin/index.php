<?php
require("../helpers/head.php");


?>
<section class="doctor_part section_padding">

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <form action="login.php" method="POST">

                <h1>Sistema de login</h1>
                <div class="form-group">
                    <p>Usuario: <input type="text" class="form-control mt-2" placeholder="ingrese su nombre" name="usuario"></p>
                    <p>Contraseña: <input type="password" class="form-control mt-2" placeholder="ingrese su contraseña" name="password"></p>
                    <input type="submit" value="Ingresar" class="form-control btn btn-primary mt-4">

                </div>
            </form>
        </div>
    </div>
</div>

</section>
<?php
require("../helpers/footer.php");
?>