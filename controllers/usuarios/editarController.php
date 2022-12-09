<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/usuarios/usuariosCapturaService.php");

try {
  if (!empty($_GET)) {

    $idusuario = $_GET['IdUsuario'];

    buscarUsuario($idusuario);
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

header("Location: ../../usuarios/editar.php");
exit();
?>