<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");
session_start();
try {
    
    if (!empty($_GET)) {
         $IdCalificacion = $_GET['IdAlumno'];

      $registros = consultaTablaCalificaciones($IdCalificacion);
      echo print_r($registros);
      $_SESSION["listaTablaCalificaciones"]=$registros;
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

if(isset($_GET['tipo'])){
    header("Location: ../../calificaciones/calificacionesAlumnos2.php");
} else {
    header("Location: ../../calificaciones/calificacionesAlumnos.php");
}

exit();


?>