<?php
    session_start();
    include_once 'includes/templates/header.php'; 
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