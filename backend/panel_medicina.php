<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Panel de Medicina</h2>	
    <?php include_once 'includes/templates/admin_nav.php'; ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
