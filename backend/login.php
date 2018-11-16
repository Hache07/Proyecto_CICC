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
				<li><a href="login.php">Inicio</a></li>
                <li><a href="login.php">Nosotros</a>
				<li><a href="login.php">Servicios</a></li>
				<li><a href="login.php">Contacto</a></li>
			</ul>
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
                <label for="usuario_txt" class="col-sm-3 col-form-label">Usuario:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario_txt" class="col-sm-3 col-form-label">Contraseña:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                </div>
            </div>
            <button type="submit" name="submit" class="button btn btn-block">Iniciar sesion</button>
        </div>
    </form>      
</section>

<?php include_once 'includes/templates/footer.php'; ?>