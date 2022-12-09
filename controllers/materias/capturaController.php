<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/criterios/criteriosService.php");

try {
    if (!empty($_POST)) {

        $idCriterio = 0;

        if(isset($_POST['IdCriterio'])){
            $idCriterio = $_POST['IdCriterio'];
        }

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $criterio = array(
            "idUsuario" => "1",
            "activo" => $checkActivo,
            "criterio" => $_POST['txtIdCriterio'],
            "idCriterio" =>  $idCriterio
        );

        print_r($criterio);

        if (isset($_POST['IdCriterio'])) {
             updateCriterio($criterio);
           header("Location: ../../criterios/consulta.php");
           exit();
        } else {
            insertCriterio($criterio);
        }
        
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../criterios/captura.php");
exit();
?>