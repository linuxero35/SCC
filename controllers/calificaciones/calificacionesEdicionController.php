<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");

$idCalificacion = 0;
try {  

  

  if (!empty($_GET)) {

    $idCalificacion = $_GET['idCalificacion'];
    
    $calificacion = consultaCalificacion($idCalificacion);


    $calificacionDetalle = consultaCalificacionDetalle($idCalificacion, $calificacion['Grado']);

    $_SESSION["calificacion"] = $calificacion;
    $_SESSION["calificacionDetalle"] = $calificacionDetalle;

   
    echo "controller";
    print_r($_SESSION["calificacion"]);
  }

} catch (Exception $e) {
  echo $e->getMessage();
}
echo "calificacion:".$idCalificacion;
header("Location: ../../calificaciones/edicion.php?idCalificacion=".$idCalificacion);
exit();
?>