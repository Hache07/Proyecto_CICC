<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XXI Congreso - UDABOL</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme|Anton|Bree+Serif|Josefin+Sans|Merriweather+Sans" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/progressbar.css"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

    <span class="arriba fas fa-angle-up"></span>
    <div class="ini">        
        <div class="row container-fluid">
            <div class="col-sm-12 col-md-8 plena">
                Acreditada como PLENA mediante R.M 288/01
            </div>
            <div class="col-sm-12 col-md-4">
                <nav class="redes float-right">
                    <a href="https://www.facebook.com/udaboldigital/" target="_blank"><i class="fab fa-facebook-f " aria-hidden="true"></i></a>
                    <a href="https://twitter.com/UdabolBO" target="_blank"><i class="fab fa-twitter " aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/channel/UCtewN9HnGr45aUCRygmv2gQ" target="_blank"><i class="fab fa-youtube " aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/udabolpostgradocochabamba/"><i class="fab fa-instagram " aria-hidden="true"></i></a>                        
                </nav>
            </div>
        </div>
    </div><!--.ini-->
    <div class="navbar sticky-top">
        <nav class="navbar-expand-lg navbar-dark container-fluid row">
            <div class="logo col-md-3 col-sm-12" >
                <a href="index.php"><img src="IMG/logo.png" alt="logo udabol" style="width: 80%; margin-left:30px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse enlace-admin navbar-collapse col-md-6 col-sm-12" id="navbarNavDropdown" style="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="facultad.php">Conferencias <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="c_medicina.php">Calendario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="expositores.php">Expositores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="registro.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservaciones
                        </a>
                        <div class="dropdown-menu drop-sub submenu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="panel_sistemas.php">Tecnologia</a>
                            <a class="dropdown-item" href="panel_arquitectura.php">Arquitectura</a>
                            <a class="dropdown-item" href="panel_derecho.php">Derecho</a>
                            <a class="dropdown-item" href="panel_medicina.php">Medicina</a>
                        </div>
                    </li>   
                </ul> 
            </div>
            <div class="link-cerrar col-md-3 col-sm-12">
                <a class="nav-link float-right cerrar" href="cerrar.php">Iniciar sesion</a>
            </div> 
        </nav>
    </div>

    <?php include_once 'includes/templates/cuenta_regresiva.php'; ?>

    <?php
    /** EXPOSITORES **/
        try {
            require_once('includes/funciones/conexion.php');
            $sql = "SELECT * FROM `invitados`";
            $result = $conexion->query($sql);
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
    ?>

    <section class="contendor invitados">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">
    <?php while($invitados = $result->fetch_assoc()) { ?>
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado']; ?>">
                        <img src="img/<?php echo $invitados['url_imagen'];?>" alt="Foto invitado Rafael">
                        <p><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?></p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado<?php echo $invitados['id_invitado']; ?>">
                    <h2><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?></h2>
                    <img src="img/<?php echo $invitados['url_imagen'];?>" alt="Foto invitado Rafael">
                    <p><?php echo $invitados['descripcion']; ?></p>
                </div>
            </div>
    <?php } ?>
        </ul>
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>