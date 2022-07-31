<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/consultaService.php");


try {
    if (!empty($_POST)) {

        $filtro = array(
            "grado" => $_POST['idGrados'],
            "anio" => $_POST['filan']
        );

      consultaRubrica($filtro);
      print_r($filtro);
    }

    
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../rubricas/consulta.php");
exit();


?>