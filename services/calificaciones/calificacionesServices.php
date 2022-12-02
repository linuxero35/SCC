<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/calificaciones/capturaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/calificaciones/consultaDAO.php");

function capturaCalificaciones($filtro)
{
    try {
        return capturaCalificacionesDAO($filtro);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function updateCalificaciones($filtro)
{
    try {
        return updateCalificacionesDAO($filtro);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


function updateCalificacionesCriterio($calificacioncriterio)
    {
        try {
           return updateCalificacionesCriterioDAO($calificacioncriterio);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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

    function consultaCalificaciones($filtros)
    {
        try {
           return consultaCalificacionesDAO($filtros);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    function consultaCalificacion($idCalificacion)
    {
        try {
           return consultaCalificacionDAO($idCalificacion);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    function consultaCalificacionDetalle($idCalificacion)
    {
        try {
           return consultaCalificacionDetalleDAO($idCalificacion);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    function consultaTablaCalificaciones($IdCalificacion)
    {
        try {
           return consultaTablaCalificacionesDAO($IdCalificacion);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    
?>