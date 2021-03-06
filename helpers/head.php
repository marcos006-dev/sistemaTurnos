<?php

    session_start();

?>

<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Turnos Online</title>
        <link rel="icon" href="../assets/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="../assets/css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <!-- themify CSS -->
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="../assets/css/flaticon.css">
        <!-- magnific popup CSS -->
        <link rel="stylesheet" href="../assets/css/magnific-popup.css">
        <!-- nice select CSS -->
        <!-- <link rel="stylesheet" href="../assets/css/nice-select.css"> -->
        <!-- swiper CSS -->
        <link rel="stylesheet" href="../assets/css/slick.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.25/af-2.3.7/b-1.7.1/r-2.2.9/sp-1.3.0/datatables.min.css" />

    </head>

    <body>
        <!--::header part start::-->
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="../index.php"> <img src="../assets/img/logo.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sacar turno</a>
                            </li>

                            <?php if ( !isset( $_SESSION['nombreUsuario'] ) ): ?>

                              <li class="nav-item">
                                <a class="nav-link" href="../modLogin/index.php">Iniciar Sesion</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Listado turnos</a>
                          </li>
                          <?php if ( $_SESSION['descripcionTipoUsuario'] == "Administrador" ): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../modDoctores/index.php">Doctores</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="../modUsuarios/index.php">Usuarios</a>
                          </li>
                      <?php endif?>
                      <li class="nav-item">
                          <a class="nav-link" href="../modLogin/logout.php">Cerrar Sesion <b> (<?php echo $_SESSION["nombreUsuario"] . "|" . $_SESSION["descripcionTipoUsuario"]; ?>)</b></a>
                      </li>

                  <?php endif?>

                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="services.html">services</a>
                                        <a class="dropdown-item" href="dep.html">depertments</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li> -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="blog.html">blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <!-- <a class="btn_2 d-none d-lg-block" href="#">HOT LINE- 09856</a> -->
                    </nav>
                </div>
            </div>
        </div>
    </header>