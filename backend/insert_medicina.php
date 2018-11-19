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

<section class="admin seccion contendor" >
<h2>Panel de Medicina</h2>   
<div class="alert alerta" role="alert">
	Bienvenido <?php echo $_SESSION['usuario']; ?>
	<hr>
</div>
<nav>
    <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
    <a href="">Registrados</a>|
    <a href="#modal1">Agregar Invitado</a>|
    <a href="#modal2">Agregar Expositor</a>|
    <a href="#modal3">Agregar Tema</a>|
    <a href="crear_admin.php">Crear Administrador</a>|
    <a href="cerrar.php">Cerrar sesión</a>|
</nav>


    <?php if(isset($_GET['exitoso'])): ?>
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <strong>El registro se realizo con exito!</strong> 
            </div>
        </div>
        <?php header( "refresh:3; url=agregar_invitado.php" ); ?>
    <?php endif;?>

    
    <div id="modal1" class="modalmask-b">
        <div class="modalbox-b movedown-b">
            <a href="#close" title="Close" class="close">X</a>
            <h2>Agregar invitado</h2>
            <form class="invitado" method="POST" action="agregar_invitado.php" enctype="multipart/form-data">
                <div class="form-invitado col-md-12">
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
        </div>
    </div>
</section>

<section class="admin seccion contendor">
    <?php if(isset($_GET['exitoso'])): ?>
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <strong>El registro se realizo con exito!</strong> 
            </div>
        </div>
        <?php header( "refresh:3; url=agregar_expositor.php" ); ?>
    <?php endif;?>

    <div id="modal2" class="modalmask-b">
    <div class="modalbox-b movedown-b">
    <a href="#close" title="Close" class="close">X</a>
    <h2>Agregar expositor</h2>
    <form class="invitado" method="POST" action="agregar_expositor.php" enctype="multipart/form-data">
       <div class="form-invitado col-md-12">
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
    </div>
    </div>
</section>




<?php
    include_once 'includes/funciones/funciones.php';

    if(isset($_POST['submit'])) {
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
    }

 /*   $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $id_cat = $_POST['categorias'];
    $id_invitado = $_POST['invitado'];
*/
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
?>
    <section class="admin seccion contendor">
        <?php 
            if(isset($_GET['exitoso'])) { ?>      
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <strong>El registro se realizo con exito!</strong> 
                    </div>
                </div>
        <?php   header( "refresh:3; url=agregar_tema.php" ); 
            } ?>
        
        
        <div id="modal3" class="modalmask-b">
        <div class="modalbox-b movedown-b">
        <a href="#close" title="Close" class="close">X</a>
        <h2>Agregar Tema</h2>
        <div class="form-invitado col-md-12">
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
        </div>
        </div>
    </section>


<?php include_once 'includes/templates/footer.php'; ?>

<script>
function mostrar(){
document.getElementById('exp').style.display = 'block';}
</script>