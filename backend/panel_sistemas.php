<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php'; 
?>

<section class="admin seccion contendor">
    <h2>Panel de Tecnologia</h2>	
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
        <hr>
    </div>
    <nav>
        <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
        <a href="registrados.php"> Ver registrados</a>|
        <a href="v_invitados.php">Ver invitados</a>|
        <a href="v_expositores.php">Ver expositores</a>|
        <a href="v_temas.php">Ver temas</a>|
        <a href="crear_admin.php">Crear Administrador</a>
    </nav>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
