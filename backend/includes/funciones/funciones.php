<?php
function usuario_autenticado() {
    if(!revisar_usuario()) {
        header('Location:login.php');
    }
}
function revisar_usuario() {
    return isset($_SESSION['usuario']);
}

function formatear_pedido($articulos) {
    $articulos = json_decode($articulos, true);
    $pedido = '';

    if(array_key_exists('un_dia', $articulos)):
        $pedido .= 'Pase 1 dia: '.$articulos['un_dia']."<br/>";
    endif;
    if(array_key_exists('un_2dias', $articulos)):
        $pedido .= 'Pase 2 dia: '.$articulos['un_2dias']."<br/>";
    endif;
    if(array_key_exists('pase_completo', $articulos)):
        $pedido .= 'Pase completo: '.$articulos['pase_completo']."<br/>";
    endif;
    if(array_key_exists('camisas', $articulos)):
        $pedido .= 'Camisas: '.$articulos['camisas']."<br/>";
    endif;
    if(array_key_exists('etiquetas', $articulos)):
        $pedido .= 'Etiquetas: '.$articulos['etiquetas']."<br/>";
    endif;
    return $pedido;
}

function formatear_eventos_a_sql($eventos) {
    $eventos = json_decode($eventos, true);
    $sql = "SELECT `nombre_evento` FROM eventos WHERE clave = 'a' ";

    // foreach($eventos['eventos'] as $evento):
    //     $sql .= " OR clave = '{$evento}'";
    // endforeach;

    return $sql;
}
?>