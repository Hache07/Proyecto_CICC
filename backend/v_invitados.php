<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Invitados</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php
            try {
                require_once('includes/funciones/conexion.php');

                $sql = "SELECT * FROM `invitados`";
                $result = $conexion->query($sql);

                while($registrados = $result->fetch_assoc()) { ?>
                    <tr class="">
                        <th scope="row"><?php echo $registrados['id_invitado']; ?></th>
                        <td><?php echo $registrados['nombre_invitado']." ".$registrados['apellido_invitado'];?></td>
                        <td><?php echo $registrados['descripcion']; ?></td>
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