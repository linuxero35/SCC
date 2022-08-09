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

function updateAlumno($alumno)
{
    try{
      $idAlumno = updateAlumnoDAO($alumno);
      updateAlumnoGrados($alumno, $idAlumno);
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n"; 
    }
}

function buscarAlumno($idAlumno)
{
    try{
        buscarAlumnoDAO($idAlumno);

    }catch(Exception $e){
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
?>