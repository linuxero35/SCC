<?php
function getConnection()
{
    $conexion = NULL;

    try { 
        echo 'conexion';
        define('DB_SERVER', 'localhost:3306');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'P@ssword34');
        define('DB_DATABASE', 'Telebachillerato');

        $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        return $conexion;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>