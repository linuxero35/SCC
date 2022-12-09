<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/criterios/criteriosService.php");
session_start();
try {
    if (!empty($_POST)) {

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            print_r($_POST['activo']);
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $filtros = array(
            "criterio" => $_POST['txtCriterio'],
            "checkActivo" => $checkActivo
        );

      $registros = consultaCriterio($filtros);

      print_r($registros);

      $_SESSION["listaCriterios"]=$registros;
      
      print_r($filtros);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../criterios/consulta.php");
exit();


?>