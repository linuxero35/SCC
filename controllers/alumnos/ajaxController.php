<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/consultaService.php");

if (isset($_GET['idGrado'])) {

    $idGrado = intval($_GET['idGrado']);
    $filtro = array(
        "idGrado" => $idGrado
    );
    $selectAlumnos = consultaAlumnoSelect($filtro, 0, 'required');
    echo $selectAlumnos;
}
?>