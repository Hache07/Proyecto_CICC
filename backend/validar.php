<?php
class Validar {
    private $user;
    private $error_pass;

    public function __construct($user, $pass) {
        $this->$nombre = "";
        $this->$pass = "";

        $this->error_nombre = $this->validar_nombre($user);
    }
    private function variable_iniciada($variable) {
        if(isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    private function validar_nombre($user) {
        if(!$this->variable_iniciada($user)) {
            return "Escribe un nombre de usuario";

        } else {
            $this->$user = $user;
        }   
        if(strlen($user) < 6) {
            return "El nombre debe tener mayor a 6 caracteres";
        }
        if(strlen($user) > 24) {
            return "El usuarion ingresado es muy largo";
        }
        return "";
    }
}