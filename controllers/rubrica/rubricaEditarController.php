<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/editarService.php");

try {
  if (!empty($_GET)) {

    $idRubrica = $_GET['IdRubrica'];

    buscarRubrica($idRubrica);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../rubricas/editar.php");
exit();
?>