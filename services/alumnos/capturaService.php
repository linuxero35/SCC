<?php
include "../../dao/alumnos/capturaDAO.php";

function insertarAlumno($alumno)
{
    try{
        insertarAlumnoDAO($alumno);
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n"; 
    }
}
?>