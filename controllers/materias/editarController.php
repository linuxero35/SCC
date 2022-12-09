<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/criterios/criteriosService.php");

try {
  if (!empty($_GET)) {

    $idCriterio = $_GET['IdCriterio'];

    buscarCriterio($idCriterio);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../criterios/editar.php");
exit();
?>