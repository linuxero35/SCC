<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/calificaciones/capturaDAO.php");

function capturaCalificaciones($filtro)
{
    try {
        return capturaCalificacionesDAO($filtro);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>