<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/capturaService.php");

try {
  if (!empty($_GET)) {

    $idAlumno = $_GET['IdAlumno'];

    buscarAlumno($idAlumno);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../alumnos/editar.php");
exit();
?>