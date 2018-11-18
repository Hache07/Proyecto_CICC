    <?php
        include_once 'includes/funciones/funciones.php';
        session_start();
        usuario_autenticado();
        include_once 'includes/templates/header.php'; 
    ?>

    <div class="container-portada">
        <div class="capa-gradient"></div>
        <div class="container-detalles">
            <div class="detalles">
                <h4>Administrador - 2018</h4>
                <p>Gran opción para realizar una carrera, un futuro y un camino en la vida.</p>
                <button class="button b-admin">Ver detalles</button>
                <button class="button b-admin-2">Sobre nosotros</button>
            </div>  
        </div>
    </div>

    <?php include_once 'includes/templates/footer.php'; ?>
