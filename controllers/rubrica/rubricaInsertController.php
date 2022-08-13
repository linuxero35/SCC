<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/capturaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/editarService.php");


try {
    if (!empty($_POST)) {
        $rubrica = array(
            "criterio" => $_POST['idCriterio'],
            "porcentaje" => $_POST['txtap'],
            "periodo" => $_POST['idPeriodo'],
            "grado" => $_POST['idGrado'],
            "idRubrica" => $_POST['idRubrica'],
            "anio" => $_POST['txtanio']
        );
        print_r($rubrica);
        if(isset($_POST['idRubrica'])) {
            updateRubrica($rubrica);
            header("Location: ../../rubricas/consulta.php");
            exit();
          } else  {
            insertarRubrica($rubrica);
          }
      
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../rubricas/captura.php");
exit();
?>