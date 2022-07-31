<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function insertaRubricaDAO($rubrica)
{
    try {
        $conn = getConnection();
        $sql = "INSERT INTO rubrica(idCriterio, idPeriodo, Porcentaje, anio, IdGrado, IdUsuarioAlta, FechaAlta, IdUsuarioMod, FechaMod)" .
        "VALUES (" . $rubrica["criterio"] ."," . $rubrica["periodo"] ."," .$rubrica["porcentaje"]. "," . $rubrica["anio"] . "," . $rubrica["grado"] . ",1,Now(),NULL,NULL)";
        echo $sql;
        $result = $conn->query($sql);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
?>