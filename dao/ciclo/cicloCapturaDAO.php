<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/conexiones/mysql_conexion.php");

function insertarCicloDAO($cliclo)
{
    try {
        $conn = getConnection();

        $sql = "INSERT INTO ciclo(ciclo, idusuarioalta, fechaalta, idusuariomod, fechamod, fechainicio, fechafin, activo) values('" . $cliclo['anioinicio'] . '-' . $cliclo['aniofin'] . "',1,now(),null,null,'" . $cliclo['fechainicio'] . "','" . $cliclo['fechafin'] . "',1);";

        echo $sql;

        $result = $conn->query($sql);
        
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
