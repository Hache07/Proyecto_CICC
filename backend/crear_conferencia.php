<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php';

    if(isset($_POST['submit'])) {
        $carrera = $_POST['nombre-carrera'];
        $conferencia = $_POST['nombre-conferencia'];
        $date = $_POST['fecha-conferencia'];

        try {
            require_once('includes/funciones/conexion.php');
            $stmt = $conexion->prepare("INSERT INTO conferencias(carrera, nombre_conferencia, fecha_inicio) VALUES (?,?,?)");
            $stmt->bind_param('sss', $carrera, $conferencia, $date);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
?>

<section class="admin seccion contendor">
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
    </div>
    <h2 class="mt-3">Crear conferencia</h2>
    <div class="form-invitado col-md-5">
        <form action="crear_conferencia.php" method="POST">
            <div class="form-group">
                <label for="">Facultad o carrera:</label>
                <input type="text" class="form-control" name="nombre-carrera" placeholder="Ingrese la carrera">
            </div>
            <div class="form-group">
                <label for="">Nombre conferencia:</label>
                <input type="text" class="form-control" name="nombre-conferencia" placeholder="Ingrese el nombre de la conferencia">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha inicio:</label>
                <input type="date" name="fecha-conferencia" class="form-control" id="fecha" required>
            </div>
            <div>
                <input type="submit" name="submit" class="btn button btn-block mt-2" value="Agregar">
            </div>
        </form>
    </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>