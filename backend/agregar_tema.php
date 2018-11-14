<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

    if(isset($_POST['submit'])):
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $id_cat = $_POST['categorias'];
        $id_invitado = $_POST['invitado'];

        try {
            require_once('includes/funciones/conexion.php');
            $stmt = $conexion->prepare("SELECT cat_evento, COUNT(DISTINCT nombre_evento) FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento=categoria_evento.id_categoria WHERE id_cat_evento = ? ");
            $stmt->bind_param("s", $id_cat);
            $stmt->execute();
            $stmt->bind_result($cat_evento, $total);
            $stmt->store_result();
            $sql = "INSERT INTO `eventos` (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv, clave) VALUES (?,?,?,?,?,?)";
            $stmt_two = $conexion->prepare($sql);
            $stmt->fetch();
            (int) $total = $total;
            $total++;
            $clave = strtolower(substr($cat_evento, 0, 5))."_".$total;
            $stmt_two->bind_param("ssssss", $nombre, $fecha, $hora, $id_cat, $id_invitado, $clave);
            $stmt_two->execute();
            $stmt_two->close();
            $stmt->close();
            $conexion->close();
            header('Location:agregar_tema.php?exitoso=1');
        } catch(Exception $e) {
            echo "Error: ". $e->getMessage();
        } 

    endif;
?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    
    <?php include_once 'includes/templates/admin_nav.php'; ?>
    <h2>Agregar Tema</h2>
    <div class="form-invitado col-md-5">
        <form action="agregar_tema.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre tema:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el tema a exponer">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
                <div class="form-group col-md-6">
                    <label for="hora">Hora:</label>
                    <input type="time" class="form-control" id="hora" name="hora">
                </div>
            </div>

            <div class="form-group">
                <label for="invitado">Expositor:</label>
                <?php
                
                try {
                    require_once('includes/funciones/conexion.php');
                    $sql = "SELECT `id_invitado`, `nombre_invitado`, `apellido_invitado` FROM `invitados` ";
                    $res_invitados = $conexion->query($sql);
                    echo "<select class='custom-select' name='invitado'>";
                    while($invitados = $res_invitados->fetch_assoc()) { ?>
                        <option value="<?php echo $invitados['id_invitado']; ?>">
                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                        </option>
                <?php }
                    echo "</select>";
                } catch(Exception $e) {
                    echo "Error: ". $e->getMessage();
                } 
                
                ?>
            </div>

            <button type="submit" class="btn btn-block button">Registrar</button>
        </form>

        <?php if(isset($_GET['exitoso'])): ?>
            <div class="mensaje">
                <p>Registro exitoso</p>
            </div>
        <?php endif;?>

        <?php $conexion->close(); ?>
    </div>
</section>

<?php include_once ('includes/templates/footer.php'); ?>