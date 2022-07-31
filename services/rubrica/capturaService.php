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
?>