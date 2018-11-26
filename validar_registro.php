<?php
    if(isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $regalo = $_POST['regalo'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');

        $boletos = $_POST['boletos'];
        $numero_boletos = $boletos;
        $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
        $precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($boletos, $camisas);
        
        try {
            require_once('includes/funciones/conexion.php');
            $stmt = $conexion->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, regalo, total_pagado) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssis", $nombre, $apellido, $email, $fecha, $pedido, $regalo, $total);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
            header('location: validar_registro.php?exitoso=1');
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    include_once 'includes/templates/head.php'; 
?>

<section class="seccion contendor">
    <h2>Resumen registro</h2>
    <?php
        if(isset($_GET['exitoso'])) {
            if($_GET['exitoso'] == "1") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>PayPal!</strong> Registro exitoso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>PayPal!</strong> Registro exitoso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
        }
    ?>
    
</section>

<?php include_once 'includes/templates/footer.php'; ?>