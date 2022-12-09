<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/capturaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");

if (isset($_GET['idGrado'])) {
    $idCiclo = intval($_GET['idCiclo']);
    $idSemestre = intval($_GET['idSemestre']);
    $idGrado = intval($_GET['idGrado']);
    $idPeriodo = intval($_GET['idPeriodo']);
    $idMateria = intval($_GET['idMateria']);
    
    $filtro = array(
        "IdCiclo" => $idCiclo,
        "IdSemestre" => $idSemestre,
        "IdGrado" => $idGrado,
        "IdPeriodo" => $idPeriodo,
        "IdMateria" => $idMateria
    );

    if (isset($_GET['idCalificacion'])) {
        $idCalificacion = intval($_GET['idCalificacion']);
        $rows = consultaCalificacionDetalle($idCalificacion, $idGrado);
        //echo "calificaciones";
       // print_r($rows);
        $html = tablaHTML($rows);
    } else {
        $html = construirTabla($filtro);
        //echo "calificaciones 2";
    }

    echo $html;
}
?>