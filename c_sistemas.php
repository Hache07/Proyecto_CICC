<?php include_once 'includes/templates/head.php'; ?>

<section class="seccion contendor">
    <h2>Calendario de evento Sistemas</h2>
    <?php
        try {
            require_once('includes/funciones/conexion.php');

            $sql = "SELECT `id_evento`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` "; 
            $sql .= "FROM `t_sistemas` ";
            $sql .= "INNER JOIN `categoria_evento` ";
            $sql .= "ON t_sistemas.id_cat_evento = categoria_evento.id_categoria ";

            $sql .= "INNER JOIN `invitados` ";
            $sql .= "ON t_sistemas.id_inv = invitados.id_invitado ";

            $sql .= "ORDER BY `id_evento` ";
            $result = $conexion->query($sql);
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php
            $eventos = $result->fetch_all(MYSQLI_ASSOC); 
            $dias = array();
            foreach($eventos as $evento) {
                $dias[] = $evento['fecha_evento'];
            } 
            $dias = array_values(array_unique($dias));
            $dia_actual = $evento['fecha_evento'];
            foreach($dias as $data) {
        ?>
            <h3 class="calendar">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo $data; ?>
            </h3>
        <?php
                foreach ($eventos as $dataEventos) {
                    if($data == $dataEventos['fecha_evento']) {  
        ?>
                    <div class="dia">
                        <p class="titulo"><?php echo utf8_encode($dataEventos['nombre_evento']); ?></p>
                        <p class="hora"><i class="fa fa-clock mr-1" aria-hidden="true"></i><?php echo $dataEventos['fecha_evento']." ".$dataEventos['hora_evento']. " hrs"; ?></p>
                        <p>
                            <?php $categoria_evento = $dataEventos['cat_evento']; 
                                switch ($categoria_evento) {
                                    case 'Talleres':
                                        echo '<i class="fa fa-code" aria-hidden="true"></i> Taller';
                                        break;
                                    case 'Conferencias':
                                        echo '<i class="fa fa-comment" aria-hidden="true"></i> Conferencias';
                                        break;
                                    case 'Seminario':
                                        echo '<i class="fa fa-university" aria-hidden="true"></i> Seminarios';
                                        break;
                                    default:
                                        echo "";
                                        break;
                                }
                            ?>
                        </p>
                        <p>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a href=""><?php echo $dataEventos['nombre_invitado']. " ".$dataEventos['apellido_invitado']; ?></a> <?php //echo $evento['nombre_invitado']. " ".$evento['apellido_invitado']; ?> 
                        </p>      
                    </div>
        <?php
                    }  
                }
            } 
        ?>
    </div>
    <?php $conexion->close(); ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>