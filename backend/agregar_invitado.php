<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

    if(isset($_POST['submit'])):
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $descripcion = $_POST['descripcion'];


        $directorio = "/uploads/";
        if(move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . $directorio . $_FILES['file']['name'])) {
            $imagen_url = $_FILES['file']['name'];
            $resultado = "Registro exitoso";

            try {
                require_once('includes/funciones/conexion.php');
                $stmt = $conexion->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $nombre, $apellido, $descripcion, $imagen_url);
                $stmt->execute();
                $stmt->close();
                $conexion->close();
                header('Location:agregar_invitado.php?exitoso=1');
            } catch(Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        }
    endif;
?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Panel de administración</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>

    <?php if(isset($_GET['exitoso'])): ?>
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <strong>El registro se realizo con exito!</strong> 
            </div>
        </div>
        <?php header( "refresh:3; url=agregar_invitado.php" ); ?>
    <?php endif;?>

    <form class="invitado" method="POST" action="agregar_invitado.php" enctype="multipart/form-data">
       <div class="form-invitado col-md-6">
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                </div>
                <div class="col">
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido" required>
                </div>
            </div><br>
            <div class="form-group">
                <label for="descripcion">Descripción: </label>
                <textarea class="form-control" class="descripcion" name="descripcion" id="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group row">
                <label for="imagen" class="col-sm-2 col-form-label">Imagen: </label>
                <div class="col-sm-10">            
                    <input type="file" class="form-control" class="imagen" name="file" id="imagen" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn button btn-block" id="alerta">Agregar</button>
        </div>
    </form>
</section>

<?php include_once 'includes/templates/footer.php'; ?>