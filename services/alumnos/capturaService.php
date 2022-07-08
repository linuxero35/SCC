<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/alumnos/capturaDAO.php");

function insertarAlumno($alumno)
{
    try{
      $idAlumno =  insertarAlumnoDAO($alumno);
        insertarAlumnoGrados($alumno, $idAlumno);

    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n"; 
    }
}
?>