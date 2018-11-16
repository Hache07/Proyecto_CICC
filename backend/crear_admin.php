<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php'; 
?>

<section class="admin seccion contendor">
    
    <?php include_once 'includes/templates/admin_nav.php'; 
    
        if(isset($_POST['submit'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $pass = $_POST['pass'];

            $password = password_hash($password, PASSWORD_DEFAULT);          
            if (password_verify($pass, $password)) {
                require_once('includes/funciones/conexion.php');
                $stmt = $conexion->prepare("INSERT INTO admis (usuario, hash_pass) VALUES (?,?)");
                $stmt->bind_param("ss", $usuario, $password);
                $stmt->execute();

                if($stmt->error) {
                        echo '<div class="container-fluid">
                                <div class="alert alert-danger" role="alert">
                                    <strong>El usuario ingresado ya existe</strong> 
                                </div>
                            </div>';
                        //header( "refresh:3; url=crear_admin.php" ); 
                } else {
                        echo '<div class="container-fluid">
                                <div class="alert alert-success" role="alert">
                                    <strong>Nuevo administrador creado!</strong> 
                                </div>
                            </div>';
                        //header( "refresh:3; url=crear_admin.php" ); 
                }
                $stmt->close();
                $conexion->close();
            } else {
                echo '<div class="container-fluid">
                        <div class="alert alert-danger" role="alert">
                            <strong>Las contraseñas no coinciden</strong> 
                        </div>
                      </div>';
                //header( "refresh:3; url=crear_admin.php" ); 
            }
        }
    ?>

    <h2>Crear administrador</h2>
    <div class="form-invitado col-md-5">
        <form action="crear_admin.php" method="POST" class="login form-horizontal">
            <div class="form-group row">
                <label for="usuario_txt" class="col-md-5 col-sm-12 col-form-label">Usuario: </label>
                <div class="col-md-7 col-sm-12">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa un usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario_txt" class="col-sm-5 col-form-label">Contraseña: </label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa su contraseña">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario_txt" class="col-sm-5 col-form-label">Repita la contraseña: </label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Ingresa su contraseña">
                </div>
            </div>
            <input type="submit" name="submit" class="button btn btn-block" value="Crear">
        </form>
    </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>