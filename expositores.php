<?php
    try {
        require_once('includes/funciones/conexion.php');

        $sql = "SELECT * FROM `invitados`";
        $result = $conexion->query($sql);

    } catch(Exception $e) {
        $error = $e->getMessage();
    }
?>

<section class="contendor invitados">
            <h2>Nuestros Invitados</h2>
            <ul class="lista-invitados clearfix">
    <?php while($invitados = $result->fetch_assoc()) { ?>
                <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado']; ?>">
                            <img src="img/<?php echo $invitados['url_imagen'];?>" alt="Foto invitado Rafael">
                            <p><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?></p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado<?php echo $invitados['id_invitado']; ?>">
                        <h2><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?></h2>
                        <img src="img/<?php echo $invitados['url_imagen'];?>" alt="Foto invitado Rafael">
                        <p><?php echo $invitados['descripcion']; ?></p>
                    </div>
                </div>
    <?php } ?>
            </ul>
        </section>
    <?php $conexion->close(); ?>