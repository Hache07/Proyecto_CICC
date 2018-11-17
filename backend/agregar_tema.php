    <?php
        include_once 'includes/funciones/funciones.php';
        session_start();
        usuario_autenticado();

        //if(isset($_POST['submit'])){
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
            } catch(Exception $e) {
                echo "Error: ". $e->getMessage();
            } 
        //}       
    ?>

    <?php include_once 'includes/templates/header.php'; ?>

    <section class="admin seccion contendor">
        <?php include_once 'includes/templates/admin_nav.php';  
            if(isset($_GET['exitoso'])) { ?>      
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <strong>El registro se realizo con exito!</strong> 
                    </div>
                </div>
        <?php   header( "refresh:3; url=agregar_tema.php" ); 
            } ?>

        <h2>Agregar Tema</h2>
        <div class="form-invitado col-md-5">
            <form action="agregar_tema.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre tema:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el tema a exponer" required>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hora">Hora:</label>
                        <input type="time" name="hora" class="form-control" id="hora" required>
                    </div>
                </div>
                
                <div class="form-check">
                    <label for="categoria">Categoria:</label>
                    <?php
                        try {

                            require_once('includes/funciones/conexion.php');
                            $sql = "SELECT * FROM `categoria_evento`";
                            $res = $conexion->query($sql);
                            while ($cat_eventos = $res->fetch_assoc()) {
                                echo '<div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="categorias" value='.$cat_eventos['id_categoria'].' required>'." ".$cat_eventos['cat_evento'].'
                                        </label>
                                      </div>';
                            } 
                        } catch (Exception $e) {
                            echo "Error:" . $e->getMessage();
                        }
                    ?>
                </div>
   
                <div class="form-group mt-3">
                    <label for="invitado">Expositor:</label>
                    <?php
                        try {
                            require_once('includes/funciones/conexion.php');
                            $sql = "SELECT `id_invitado`, `nombre_invitado`, `apellido_invitado` FROM `invitados` ";
                            $res_invitados = $conexion->query($sql);
                            echo "<select class='custom-select' name='invitado'>";
                            while($invitados = $res_invitados->fetch_assoc()) { 
                    ?>
                                <option value="<?php echo $invitados['id_invitado']; ?>">
                                    <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                </option>
                    <?php   }
                            echo "</select>";
                        } catch(Exception $e) {
                            echo "Error: ". $e->getMessage();
                        } 
                    ?>
                </div>
                <button type="submit" class="btn btn-block button">Registrar</button>
            </form>
            <?php $conexion->close(); ?>
        </div>
    </section>

    <?php include_once ('includes/templates/footer.php'); ?>