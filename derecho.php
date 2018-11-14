<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>XXI Concreso - UDABOL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Acme|Anton|Bree+Serif|Josefin+Sans|Merriweather+Sans" rel="stylesheet">

    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","", $archivo);
    ?>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

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
<body class="cuerpo">

    <span class="arriba fas fa-angle-up"></span>
    <div class="barra">
        <div class="contendor clearfix">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png" alt="logo udabol"></a>
            </div>
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="navegacion-principal clearfix">
                <a href="facultad.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="expositores.php">Expositores</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
    </div><!--.barra-->

    <div class="ini">        
        <div class="row container-fluid">
            <div class="col-md-8 plena">

            </div>
            <div class="col-md-4">
                <nav class="redes">
                    <a href="https://www.facebook.com/udaboldigital/" target="_blank"><i class="fab fa-facebook-f " aria-hidden="true"></i></a>
                    <a href="https://twitter.com/UdabolBO" target="_blank"><i class="fab fa-twitter " aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/channel/UCtewN9HnGr45aUCRygmv2gQ" target="_blank"><i class="fab fa-youtube " aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/udabolpostgradocochabamba/"><i class="fab fa-instagram " aria-hidden="true"></i></a>                        
                </nav>
            </div>
        </div>
    </div><!--.inicio-->

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