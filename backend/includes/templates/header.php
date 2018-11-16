<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back-End | Congreso</title>

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","", $archivo);
    ?>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/colorbox.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
</head>
<body>

    <!--<div class="header">
        <ul class="navbar">
            <li><a href="">Inicio</a></li>
            <li><a href="">Servicios</a>
                <ul>
                    <li><a href="">Calendario</a></li>
                    <li><a href="">Expositores</a></li>
                    <li><a href="">Invitados</a>
                        <ul>
                            <li><a href="">Calendario</a></li>
                            <li><a href="">Expositores</a></li>
                            <li><a href="">Invitados</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">Contacto</a></li>
            <li><a href="">Ver</a>
                <ul>
                    <li><a href="">Calendario</a></li>
                    <li><a href="">Expositores</a></li>
                    <li><a href="">Invitados</a></li>
                </ul>
            </li>
        </ul>
    </div>-->


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

    <div class="navbar">
		<nav class="navegacion container">
			<ul class="menu">
				<li><a href="#">Inicio</a></li>
                <li><a href="#">Nosotros</a>
                    <ul class="submenu">
						<li><a href="#">Servicio #1</a></li>
                        <li><a href="#">Servicio #2</a>
                            <ul class="submenu sub">
                                <li><a href="#">Servicio #1</a></li>
                                <li><a href="#">Servicio #2</a></li>
                                <li><a href="#">Servicio #3</a></li>
                            </ul>
                        </li>
						<li><a href="#">Servicio #3</a></li>
					</ul></li>
				<li><a href="#">Servicios</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</nav>
</div>

