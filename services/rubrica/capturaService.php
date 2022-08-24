<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/rubrica/rubricaDAO.php");

function insertarRubrica($rubrica)
{
    try {
        insertaRubricaDAO($rubrica);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function buscarRubricasParametros($filtros)
{
    try {
       return consultaRubricasParametros($filtros);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function construirTabla($filtros) {
    try {
        $rubricas = buscarRubricasParametros($filtros);

        
     } catch (Exception $e) {
         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
     }
}
?>