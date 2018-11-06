<?php
session_start();

$_SESSION = array();

//borre también la cookie de sesión. ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    header('Location:login.php');
}

// Finalmente, destruir la sesión.
session_destroy();
?>