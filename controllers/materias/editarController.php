<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/materias/editarService.php");

try {
  if (!empty($_GET)) {

    $IdMateria = $_GET['IdMateria'];

    buscarMateria($IdMateria);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../materias/editar.php");
exit();
?>