<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-End | Congreso</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

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
                <a href="index.php"><img src="uploads/logo.png" alt="logo udabol" style="width: 80%; margin-left:30px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-6 col-sm-12" id="navbarNavDropdown">
                <ul class="navbar-nav" style="">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Contacto <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="login.php">Servicios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carreras</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registros</a>
                    </li>
                     
                </ul> 
            </div>
            <div class="link-cerrar col-md-3 col-sm-12">
            </div> 
        </nav>
    </div>

    

    <?php
        session_start();
        if(isset($_POST['submit'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            try {
                require_once('includes/funciones/conexion.php');
                $stmt = $conexion->prepare("SELECT * FROM admis WHERE usuario = ? ");
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $stmt->bind_result($id, $nombre_usuario, $password_usuario);
                while($stmt->fetch()) {
                    if(password_verify($password, $password_usuario)) {
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['id'] = $id;
                        header('Location: admin_area.php');
                    } else { 
    ?>                  <div class="container-fluid mt-2">
                            <div class="alert alert-danger" role="alert">
                                <strong>Error en la autentificacion</strong> 
                            </div>
                        </div>
    <?php               header( "refresh:3; url=login.php" ); 
                    }
                }
                $stmt->close();
                $conexion->close();
            } catch(Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        }
    ?>

    <section class="seccion contendor">
        <h2 class="login">Iniciar sesión</h2> 
        <form action="login.php" method="POST" class="login form-horizontal">
            <div class="form-invitado col-md-5">
                <div class="form-group row">
                    <label for="usuario_txt" class="col-sm-12 col-md-3 col-form-label">Usuario:</label>
                    <div class="col-sm-12 col-md-9">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usuario_txt" class="col-sm-12 col-md-3 col-form-label">Contraseña:</label>
                    <div class="col-sm-12 col-md-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                    </div>
                </div>
                <button type="submit" name="submit" class="button btn btn-block">Iniciar sesion</button>
            </div>
        </form>      
    </section>

<?php include_once 'includes/templates/footer.php'; ?>