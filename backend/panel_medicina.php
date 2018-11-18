<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php'; 
?>

<section class="admin seccion contendor">
    <h2>Panel de Medicina</h2>	
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
        <hr>
    </div>
    <div class="sticky-top-admin">
        <nav>
            <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
            <a href="registrados.php">Registrados</a>|
            <a href="insert_medicina.php">Agregar Invitado</a>|
            <a href="insert_medicina.php">Agregar Expositor</a>|
            <a href="insert_medicina.php">Agregar Tema</a>|
            <a href="insert_medicina.php">Crear Administrador</a>|
        </nav>
    </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
