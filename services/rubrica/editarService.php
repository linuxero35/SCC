<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/rubrica/editarDAO.php");

function buscarRubrica($idRubrica)
{
    try {
        buscarRubricaDAO($idRubrica);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
function updateRubrica($rubrica)
{
    try{
      updateRubricaDAO($rubrica);
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n"; 
    }
}

?>