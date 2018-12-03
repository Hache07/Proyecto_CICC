<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php';

    if(isset($_POST['submit'])){
        $facultad = $_POST['carrera'];
        $nombre = $_POST['nombre-congreso'];
        $fecha = $_POST['fecha'];

        try {
            require_once('includes/funciones/conexion.php');
            $stmt = $conexion->prepare("SELECT nombre_carrera, COUNT(DISTINCT nombre_congreso) FROM congresos INNER JOIN carreras ON congresos.id_carr=carreras.id_carrera WHERE id_carr = ? ");
            $stmt->bind_param("s", $id_cat);
            $stmt->execute();
            $stmt->bind_result($cat_evento, $total);
            $stmt->store_result();
            $sql = "INSERT INTO `congresos` (nombre_congreso, fecha_inicio, id_carr) VALUES (?,?,?)";
            $stmt_two = $conexion->prepare($sql);
            $stmt->fetch();
            (int) $total = $total;
            $total++;
            $clave = strtolower(substr($cat_evento, 0, 5))."_".$total;
            $stmt_two->bind_param("sss", $nombre, $fecha, $facultad);
            $stmt_two->execute();
            $stmt_two->close();
            $stmt->close(); 
        } catch(Exception $e) {
            echo "Error: ". $e->getMessage();
        } 
    }       
?>

    

    <section class="admin seccion contendor">
        <?php include_once 'includes/templates/admin_nav.php';  
            if(isset($_GET['exitoso'])) { ?>      
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <strong>El registro se realizo con exito!</strong> 
                    </div>
                </div>
        <?php } ?>

        <h2>Crear congreso</h2>
        <div class="form-invitado col-md-5">
            <form action="crear_congreso.php" method="POST">
                <div class="form-group mt-3">
                    <label for="carrera">Facultad o carrera:</label>
                    <?php
                        try {
                            require_once('includes/funciones/conexion.php');
                            $sql = "SELECT `id_carrera`, `nombre_carrera` FROM `carreras` ";
                            $res_carreras = $conexion->query($sql);
                            echo "<select class='custom-select' name='carrera'>";
                            while($carrera = $res_carreras->fetch_assoc()) { 
                    ?>
                                <option value="<?php echo $carrera['id_carrera']; ?>">
                                    <?php echo $carrera['nombre_carrera'] ; ?>
                                </option>
                    <?php   }
                            echo "</select>";
                        } catch(Exception $e) {
                            echo "Error: ". $e->getMessage();
                        } 
                    ?>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre congreso:</label>
                    <input type="text" name="nombre-congreso" class="form-control" id="nombre" placeholder="Ingrese nombre del congreso" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha inicio:</label>
                    <input type="date" name="fecha" class="form-control" id="fecha" required>
                </div>
                <input type="submit" name="submit" class="btn btn-block button" value="Agregar">
            </form>
            <?php $conexion->close(); ?>
        </div>
    </section>

    <?php include_once ('includes/templates/footer.php'); ?>