    <?php include_once 'includes/templates/head.php'; ?>

    <section class="seccion contendor">
        <h2>Registro de usuarios</h2>
        <form action="" id="registro" class="registro" method="POST">
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

            <div id="paquetes" class="paquetes">
                <h3 class="ralew">Elige el número de boletos</h3>
                <ul class="lista-precios clearfix">
                    <li>
                        <div class="tabla-precio">
                            <h3>Estudiantes</h3>
                            <p class="numero">$30</p>
                            <ul>
                                <li class="ralew"><i class="fas fa-check"></i> Bocadillos gratis</li>
                                <li class="ralew"><i class="fas fa-check"></i> Todas las conferencias</li>
                                <li class="ralew"><i class="fas fa-check"></i> Material de apoyo</li>
                            </ul>
                            <div class="orden">
                                <label class="ralew" for="pase_dia">Boletos deseados:</label>
                                <input type="number" min="0" id="pase_dia" placeholder=" 0">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="tabla-precio">
                            <h3>Docentes</h3>
                            <p class="numero">$45</p>
                            <ul>
                                <li class="ralew"><i class="fas fa-check"></i> Bocadillos gratis</li>
                                <li class="ralew"><i class="fas fa-check"></i> Todas las conferencias</li>
                                <li class="ralew"><i class="fas fa-check"></i> Material de apoyo</li>
                            </ul>
                            <div class="orden">
                                <label class="ralew" for="pase_dosdias">Boletos deseados:</label>
                                <input type="number" min="0" id="pase_dosdias" placeholder=" 0">
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!--.paquetes-->

            <div id="eventos" class="eventos clearfix">
                <h3 class="ralew">Elige tus talleres</h3>
                <div class="caja">
                    <div id="viernes" class="contenido-dia clearfix">
                        <h4>Viernes</h4>
                        <div>
                            <p>Talleres:</p>
                            <label for=""><input type="checkbox" name="registro" id="taller_01" value="taller_01"><time>10:00</time> Resposive Web Design</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_02" value="taller_02"><time>12:00</time> Flexbox</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_04" value="taller_04"><time>17:00</time> Drupal</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_05" value="taller_05"><time>19:00</time> WordPress</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label for=""><input type="checkbox" name="registro" id="conf_01" value="conf_01"><time>10:00</time> Como ser Freelancer</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_02" value="conf_02"><time>17:00</time> Tecnologias del Futuro</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la Web</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label for=""><input type="checkbox" name="registro" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles</label>
                        </div>
                    </div><!--#viernes-->

                    <div id="sabado" class="contenido-dia clearfix">
                        <h4>Sabado</h4>
                        <div>
                            <p>Talleres:</p>
                            <label for=""><input type="checkbox" name="registro" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_07" value="taller_07"><time>12:00</time>PHP y MySQL</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 Y CSS3</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_11" value="taller_11"><time>21:00</time>PHP Medio y Avanzado</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label for=""><input type="checkbox" name="registro" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos dias</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label for=""><input type="checkbox" name="registro" id="sem_02" value="sem_02"><time>10:00</time> Aprende a programar en una mañana</label>
                            <label for=""><input type="checkbox" name="registro" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI y UX para moviles</label>
                        </div>
                    </div><!--#sabado-->

                    <div id="domingo" class="contenido-dia clearfix">
                        <h4>Domingo</h4>
                        <div>
                            <p>Talleres:</p>
                            <label for=""><input type="checkbox" name="registro" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y JQuery</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_15" value="taller_15"><time>17:00</time> Creando plantillas para WordPress</label>
                            <label for=""><input type="checkbox" name="registro" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label for=""><input type="checkbox" name="registro" id="conf_07" value="conf_07"><time>10:00</time> Como hacer Marketing en linea</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje debo empezar?</label>
                            <label for=""><input type="checkbox" name="registro" id="conf_09" value="conf_09"><time>19:00</time> Frameworks y Lbrerias Open Source</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label for=""><input type="checkbox" name="registro" id="sem_04" value="sem_04"><time>10:00</time> Creando una App en Android en una tarde</label>
                            <label for=""><input type="checkbox" name="registro" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en iOS en una tarde</label>
                        </div>
                    </div><!--#domingo-->
                </div>
            </div><!--#eventos-->

            <div id="resumen" class="resumen clearfix">
                <h3 class="ralew">Pago y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label class="ralew" for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                            <input type="number" min="0" id="camisa_evento" size="3" placeholder="0">
                        </div><!--.orden-->
                        <div class="orden">
                            <label class="ralew" for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                            <input type="number" min="0" id="etiquetas" size="3" placeholder="0">
                        </div><!--.orden-->
                        <div class="orden">
                            <label class="ralew" for="regalo">Seleccione un regalo: </label>
                            <select name="" id="regalo" required>
                                <option value="">- Seleccione un regalo --</option>
                                <option value="ETI">Etiquetas</option>
                                <option value="PUL">Pulcera</option>
                                <option value="PLU">Pluma</option>
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
                        <input type="submit" id="btnRegistro" class="button" value="Pagar">
                    </div><!--.total-->
                </div><!--.caja-->
            </div><!--#resumen-->
        </form>        
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>
