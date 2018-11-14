<?php

$conexion = new mysqli("127.0.0.1","root","","congreso_cicc");
	if ($conexion->connect_error) {
        echo $error -> $conexion->connect_error;
    }
		