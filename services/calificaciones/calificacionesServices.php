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
function capturaCalificacionesCriterio($calificacioncriterio)
    {
        try {
           return capturaCalificacionesCriterioDAO($calificacioncriterio);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

?>