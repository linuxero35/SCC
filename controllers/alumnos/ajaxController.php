<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/consultaService.php");

if (isset($_GET['idGrado'])) {

    $idGrado = intval($_GET['idGrado']);
    $idAlumno = intval($_GET['idAlumno']);
    $filtro = array(
        "idGrado" => $idGrado
    );
    $selectAlumnos = consultaAlumnoSelect($filtro,  $idAlumno, 'required');
    echo $selectAlumnos;
}
?>