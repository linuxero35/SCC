<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/ciclo/cicloEditarService.php");

try {
  if (!empty($_GET)) {

    $idCiclo = $_GET['IdCiclo'];

    consultaCiclo($idCiclo);

    print_r($_SESSION["ciclo"]);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../ciclo/editarCiclo.php");
exit();
?>