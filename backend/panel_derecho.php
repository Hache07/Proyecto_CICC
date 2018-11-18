<?php
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
    include_once 'includes/templates/header.php'; 
?>

<section class="admin seccion contendor">
    <h2>Panel de Derecho</h2>	
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
        <hr>
    </div>
    <nav>
        <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
        <a href="registrados.php">Registrados</a>|
        <a href="insert_derecho.php">Agregar Invitado</a>|
        <a href="insert_derecho.php">Agregar Expositor</a>|
        <a href="insert_derecho.php">Agregar Tema</a>|
        <a href="insert_derecho.php">Crear Administrador</a>|
    </nav>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
