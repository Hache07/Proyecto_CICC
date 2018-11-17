<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="admin seccion contendor">
    <h2>Panel de Medicina</h2>	
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
        <hr>
    </div>
    <nav>
        <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
        <a href="registrados.php">Registrados</a>|
        <a href="agregar_invitado.php">Agregar Invitado</a>|
        <a href="agregar_expositor.php">Agregar Expositor</a>|
        <a href="agregar_tema.php">Agregar Tema</a>|
        <a href="crear_admin.php">Crear Administrador</a>|
        <a href="cerrar.php">Cerrar sesión</a>|
    </nav>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
