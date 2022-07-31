<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/capturaService.php");


try {
    if (!empty($_POST)) {
        $rubrica = array(
            "criterio" => $_POST['idCriterio'],
            "porcentaje" => $_POST['txtap'],
            "periodo" => $_POST['idPeriodo'],
            "grado" => $_POST['idGrados'],
            "anio" => $_POST['txtanio']
        );
        print_r($rubrica);
        insertarRubrica($rubrica);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../rubricas/captura.php");
exit();
?>