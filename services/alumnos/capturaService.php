<?php
require_once "/wamp64/www/SCC/dao/alumnos/capturaDAO.php";

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