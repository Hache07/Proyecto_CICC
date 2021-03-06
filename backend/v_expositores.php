<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Expositores</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Empresa</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            try {
                require_once('includes/funciones/conexion.php');

                $sql = "SELECT * FROM `expositores`";
                $result = $conexion->query($sql);

                while($registrados = $result->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $registrados['id_expositor']; ?></th>
                        <td><?php echo $registrados['nombre_expositor']." ".$registrados['apellido_expositor'];?></td>
                        <td><?php echo $registrados['nacionalidad']; ?></td>
                        <td><?php echo $registrados['correo']; ?></td>
                        <td><?php echo $registrados['telefono']; ?></td>
                        <td><?php echo $registrados['empresa']; ?></td>
                        <td>
                            <a href="eliminar.php?id=<?php echo $registrados['id_evento']; ?>" class="float-right ml-3 mr-4">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="index.php?id=<?php echo $dato['id_color']; ?>" class="float-right">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
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