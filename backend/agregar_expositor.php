<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

    if(isset($_POST['submit'])):
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nacionalidad = $_POST['nacionalidad'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $empresa = $_POST['empresa'];
        $descripcion = $_POST['descripcion'];


        $directorio = "/uploads/";
        if(move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . $directorio . $_FILES['file']['name'])) {
            $imagen_url = $_FILES['file']['name'];
            $resultado = "Registro exitoso";

            try {
                require_once('includes/funciones/conexion.php');
                $stmt = $conexion->prepare("INSERT INTO expositores (nombre_expositor, apellido_expositor, nacionalidad, correo, telefono, empresa, descripcion, url_imagen) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssss", $nombre, $apellido, $nacionalidad, $correo, $telefono, $empresa, $descripcion, $imagen_url);
                $stmt->execute();
                $stmt->close();
                $conexion->close();
                header('Location:agregar_expositor.php?exitoso=1');
            } catch(Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        }
    endif;
?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    
    <?php include_once 'includes/templates/admin_nav.php'; ?>

    <?php if(isset($_GET['exitoso'])): ?>
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <strong>El registro se realizo con exito!</strong> 
            </div>
        </div>
        <?php header( "refresh:3; url=agregar_expositor.php" ); ?>
    <?php endif;?>
    <h2>Agregar expositor</h2>
    <form class="invitado" method="POST" action="agregar_expositor.php" enctype="multipart/form-data">
       <div class="form-invitado col-md-6">
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
                </div>
                <div class="col">
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" required>
                </div>
            </div><br>
            <div class="row">
                <div class="col col-md-5">
                    <label for="nombre">Nacionalidad: </label>
                    <input type="text" name="nacionalidad" id="nombre" class="form-control" placeholder="" required>
                </div>
                <div class="col col-md-7">
                    <label for="apellido">Empresa: </label>
                    <input type="text" name="empresa" id="apellido" class="form-control" placeholder="" required>
                </div>
            </div><br>
            <div class="row">
                <div class="col col-md-7">
                    <label for="nombre">Correo: </label>
                    <input type="email" name="correo" id="nombre" class="form-control" placeholder="" required>
                </div>
                <div class="col col-md-5">
                    <label for="apellido">Telefono: </label>
                    <input type="text" name="telefono" id="apellido" class="form-control" placeholder="" required>
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