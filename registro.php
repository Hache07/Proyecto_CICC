    <?php include_once 'includes/templates/head.php'; ?>

    <section class="seccion contendor">
        <h2>Registro de usuarios</h2>
        <form action="validar_registro.php" id="registro" class="registro" method="POST">
            <div id="datos_usuario" class="registro caja clearfix">
                <div class="campo">
                    <label class="bold ralew" for="nombre">Nombre : </label>
                    <input type="text" id="nombre" name="nombre" placeholder=" Ingresa tu nombre" required>
                </div>
                <div class="campo">
                    <label class="bold ralew" for="apellido">Apellido : </label>
                    <input type="text" id="apellido" name="apellido" placeholder=" Ingresa tu apellido" required>
                </div>
                <div class="campo">
                    <label class="bold ralew" for="email">Email : </label>
                    <input type="email" id="email" name="email" placeholder=" Ingresa tu email" required>
                </div>
                <div id="error"></div>
            </div><!--#datos_usuario-->
            
            <div class="precios seccion seccion-precios">
                <div id="paquetes" class="paquetes">
                    <h3 class="ralew mb-4">Elige el número de boletos</h3>
                    <ul class="lista-precios clearfix">
                        <li>
                            <div class="tabla-precio">
                                <h3>Estudiantes</h3>
                                <p class="numero">$30</p>
                                <ul>
                                    <li><i class="fas fa-check"></i> Bocadillos gratis</li>
                                    <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                    <li><i class="fas fa-check"></i> Material de apoyo</li>
                                </ul>
                                <div class="orden">
                                    <label class="ralew" for="pase_dia">Boletos deseados:</label>
                                    <input type="number" min="0" id="pase_dia" size="3" name="boletos[estudiante][cantidad]" placeholder=" 0">
                                    <input type="hidden" value="30" name="boletos[estudiante][precio]">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tabla-precio">
                                <h3>Docentes</h3>
                                <p class="numero">$45</p>
                                <ul>
                                    <li><i class="fas fa-check"></i> Bocadillos gratis</li>
                                    <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                    <li><i class="fas fa-check"></i> Material de apoyo</li>
                                </ul>
                                <div class="orden">
                                    <label class="ralew" for="pase_dosdias">Boletos deseados:</label>
                                    <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[docente][cantidad]" placeholder=" 0">
                                    <input type="hidden" value="45" name="boletos[docente][precio]">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!--.paquetes-->
            </div>

            <section class="seccion contendor">
                <h3>Calendario de evento Sistemas</h3>
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

                <div class="calendario calendar-none" id="calendario">
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
                            <h3 class="calendar mb-0">
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
                                        <a href="expositores.php"><?php echo $dataEventos['nombre_invitado']. " ".$dataEventos['apellido_invitado']; ?></a> <?php //echo $evento['nombre_invitado']. " ".$evento['apellido_invitado']; ?> 
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

            <div id="resumen" class="resumen clearfix">
                <h3 class="ralew">Pago y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label class="ralew" for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                            <input type="number" name="pedido_extra[camisas][cantidad]" min="0" id="camisa_evento" size="3" placeholder="0">
                            <input type="hidden" name="pedido_extra[camisas][precio]" value="10">
                        </div><!--.orden-->
                        <div class="orden mt-3">
                            <label class="ralew" for="regalo">Seleccione un regalo: </label>
                            <select name="regalo" id="regalo" required>
                                <option value="">- Seleccione un regalo --</option>
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulcera</option>
                                <option value="3">Pluma</option>
                            </select>
                        </div><!--.orden-->
                        <input type="button" id="calcular" class="button" value="calcular">
                    </div><!--.extras-->
                    <div class="total">
                        <p class="bold">Resumen:</p>
                        <div id="lista-productos">
                            
                        </div>
                        <p class="bold">Total:</p>
                        <div id="suma-total">
                            
                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido" value="total_pedido">
                        <input type="submit" name="submit" id="btnRegistro" class="button" value="Pagar">
                    </div><!--.total-->
                </div><!--.caja-->
            </div><!--#resumen--> 
        </form>   
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>
