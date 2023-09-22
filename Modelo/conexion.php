<?php
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $base_datos = "db_agenda";

        $conexión = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

        if (!$conexión) {
            die("Error al conectar: " . mysqli_connect_error());
        }

?>