<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
?>
<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Crear administradores</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>

    <div class="form-invitado col-md-5">
        <form action="crear_admin.php" method="POST" class="login form-horizontal">
            <div class="form-group row">
                <label for="usuario_txt" class="col-sm-3 col-form-label">Usuario: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa un usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario_txt" class="col-sm-3 col-form-label">Contraseña: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa un contraseña">
                </div>
            </div>
            <input type="submit" name="submit" class="button btn btn-block" value="Crear">
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])):
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
            if(strlen($usuario) < 5):
                echo "El nombre de usuario debe tener mayor a 5 caracteres";
            endif;

            $opciones = array(
                'cost' => 12,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_RANDOM)
            );
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            
            try {
                require_once('includes/funciones/conexion.php');
                $stmt = $conexion->prepare("INSERT INTO admis (usuario, hash_pass) VALUES (?,?)");
                $stmt->bind_param("ss", $usuario, $hashed_password);
                $stmt->execute();

                if($stmt->error):
                    echo "<div class='mensaje error'>";
                    echo "Hubo un error";
                    echo "</div>";
                else:
                    echo "<div class='mensaje'>";
                    echo "Se inserto correctamente el nuevo admi";
                    echo "</div>";
                endif;

                $stmt->close();
                $conexion->close();
            } catch(Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        endif;
    ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>