<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/ciclo/cicloCapturaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/ciclo/cicloEditarService.php");

try {
    if (!empty($_POST)) {

        $IdCiclo = 0;

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        if(isset($_POST['IdCiclo'])){
            $IdCiclo = $_POST['IdCiclo'];
        } else {
            $checkActivo = 1;
        }

        $ciclo = array(
            "idUsuario" => "1",
            "activo" => $checkActivo,
            "idCiclo" =>  $IdCiclo,
            "fechainicio" => $_POST['txtanioinicia'],
            "fechafin" => $_POST['txtaniofin'],
            "anioinicio" => substr($_POST['txtanioinicia'],0,4),
            "aniofin" => substr($_POST['txtaniofin'],0,4)
        );

        print_r($ciclo);

        if (isset($_POST['IdCiclo'])) {
            updateCicloDAO($ciclo);
           header("Location: ../../ciclo/cicloConsulta.php");
           exit();
        } else {
            insertarCiclo($ciclo);
        }
        
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../ciclo/cicloCaptura.php");
exit();
?>