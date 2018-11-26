<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Registrados</h2>
    <?php include_once 'includes/templates/admin_nav.php'; ?>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha registro</th>
            <!-- <th scope="col">Articulos adquiridos</th>-->
            <!-- <th scope="col">Regalo</th> -->
            <th scope="col">Total pagado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            try {
                require_once('includes/funciones/conexion.php');

                $sql = "SELECT * FROM `registrados` INNER JOIN `regalos`";
                $sql .= "ON registrados.regalo=regalos.id_regalo";
                $result = $conexion->query($sql);

                while($registrados = $result->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $registrados['id_registrado']; ?></th>
                        <td><?php echo $registrados['nombre_registrado']." ".$registrados['apellido_registrado'];?></td>
                        <td><?php echo $registrados['email_registrado']; ?></td>
                        <td>
                            <?php $fecha = $registrados['fecha_registro']; 
                                echo date('jS F, Y H:i', strtotime($fecha));
                            ?>
                        </td>
                        <td>$<?php echo $registrados['total_pagado']; ?></td>
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