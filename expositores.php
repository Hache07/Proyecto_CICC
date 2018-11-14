<?php include_once 'includes/templates/head.php'; ?> 

<?php
    try {
        require_once('includes/funciones/conexion.php');

        $sql = "SELECT * FROM `expositores`";
        $result = $conexion->query($sql);
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
?>

<section class="seccion contendor invitados">
    <h2>Nuestros Expositores</h2>
    <ul class="lista-invitados clearfix">
    <?php while($expositores = $result->fetch_assoc()) { ?>
        <li>
            <div class="invitado">
                <a class="invitado-info" href="#invitado<?php echo $expositores['id_expositor']; ?>">
                    <img src="img/<?php echo $expositores['url_imagen'];?>" alt="Foto invitado Rafael">
                    <p><?php echo $expositores['nombre_expositor']." ".$expositores['apellido_expositor']; ?></p>
                </a>
            </div>
        </li>
        <div style="display:none;">
            <div class="invitado-info" id="invitado<?php echo $expositores['id_expositor']; ?>">
                <h2><?php echo $expositores['nombre_expositor']." ".$expositores['apellido_expositor']; ?></h2>
                <img src="img/<?php echo $expositores['url_imagen'];?>" alt="Foto invitado Rafael">
                <p class="mt-2"><?php echo $expositores['descripcion']; ?></p>
                <p><?php echo "<h5><b>NACIONALIDAD: </b>".$expositores['nacionalidad']." - ".$expositores['empresa']."</h5>"; ?></p>
                <p><?php echo "<h5><b>CONTACTO: </b>".$expositores['correo']." - ".$expositores['telefono']."</h5>"; ?></p>
            </div>
        </div>
    <?php } ?>
    </ul>
</section>
<?php $conexion->close(); ?>


<?php include_once 'includes/templates/footer.php'; ?>