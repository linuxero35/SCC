<?php
function getConnection()
{
    $conexion = NULL;

    try {
       // echo 'conexion';
        
        if (!defined("DB_SERVER")) {
            define('DB_SERVER', 'localhost:3306');
        }

        if (!defined("DB_USERNAME")) {
            define('DB_USERNAME', 'root');
        }

        if (!defined("DB_PASSWORD")) {
            define('DB_PASSWORD', '');
        }

        if (!defined("DB_DATABASE")) {
            define('DB_DATABASE', 'Telebachillerato');
        }

        $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        return $conexion;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>