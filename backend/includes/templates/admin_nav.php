<div class="admin-navbar">
    <div class="alert alerta" role="alert">
        Bienvenido <?php echo $_SESSION['usuario']; ?>
        <hr>
    </div>
    <div class="">
        <nav>
            <a href="admin_area.php"><i class="fa fa-home"></i> Home</a>|
            <a href="registrados.php"> Ver registrados</a>|
            <a href="v_invitados.php">Ver invitados</a>|
            <a href="v_expositores.php">Ver expositores</a>|
            <a href="v_temas.php">Ver temas</a>|
            <a href="crear_admin.php">Crear Administrador</a>
        </nav>
    </div>
</div>