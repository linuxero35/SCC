<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");

try {
  if (!empty($_GET)) {

    $idCalificacion = $_GET['idCalificacion'];
    
    $calificacion = consultaCalificacion($idCalificacion);

    $calificacionDetalle = consultaCalificacionDetalle($idCalificacion);

    $_SESSION["calificacion"] = $calificacion;
    $_SESSION["calificacionDetalle"] = $calificacionDetalle;

    echo "controller";
    print_r($_SESSION["calificacion"]);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

//header("Location: ../../calificaciones/edicion.php");
//exit();
?>