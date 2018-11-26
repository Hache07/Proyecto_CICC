<?php

include_once 'includes/funciones/conexion.php';

function borrar($id) {
    global $conexion;
    $sql = "DELETE FROM `t_sistemas` WHERE `t_sistemas`.`id_evento` = {$id}";
    $conexion->query($sql);
}

header('location:v_temas.php');
$id = isset($_GET['id_evento']) ? $_GET['id_evento'] : 0;
borrar($id);
die();

