<?php
    function productos_json(&$boletos, &$camisas = 0) {
        $dias = array(0 => 'estudiante', 1 => 'docente');
        $total_boletos = array_combine($dias, $boletos);
        $json = array();

        foreach ($total_boletos as $key => $boletos) {
            if((int) $boletos > 0) {
                $json[$key] = (int) $boletos;
            }
        }
        $camisas = (int) $camisas;
        if($camisas > 0) {
            $json['camisas'] = $camisas;
        }
        return json_encode($json);
    }
/*
    function eventos_json(&$eventos) {
        $eventos_json = array();
        foreach ($eventos as $evento) {
            $eventos_json['eventos'][] = $evento;
        }
        return json_encode($eventos_json);
    }
*/
function usuario_autenticado() {
    if(!revisar_usuario()) {
        header('Location:login.php');
    }
}
function revisar_usuario() {
    return isset($_SESSION['usuario']);
}
?>