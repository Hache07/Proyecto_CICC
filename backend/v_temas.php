<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Temas</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php
            try {
                require_once('includes/funciones/conexion.php');

                $sql = "SELECT * FROM `t_sistemas`";
                $result = $conexion->query($sql);

                while($registrados = $result->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $registrados['id_evento']; ?></th>
                        <td><?php echo utf8_encode($registrados['nombre_evento']); ?></td>
                        <td><?php echo $registrados['fecha_evento']; ?></td>
                        <td><?php echo $registrados['hora_evento']; ?></td>
                    </tr>
            <?php }
                $conexion->close();
            } catch(Exception $e) {
                $error = $e->getMessage();
            }
        ?>
     
    </tbody>
</table>

</section>


<?php include_once 'includes/templates/footer.php'; ?>