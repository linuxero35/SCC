<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/ciclo/cicloConsultaService.php");
session_start();

try {
    if (!empty($_POST)) {

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $ciclo = array(
            "ciclo" => $_POST['txtCiclo'],
            "activo" => $checkActivo
        );

        $registros = buscarCiclosFiltros($ciclo);
        $_SESSION["listaCiclos"] = $registros;

    }
    
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../ciclo/cicloConsulta.php");

exit();
