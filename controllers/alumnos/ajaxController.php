<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/consultaService.php");

if (isset($_GET['idGrado'])) {

    $idGrado = intval($_GET['idGrado']);

    $required = 'required';

    if(isset($_GET['required'])){
        $required = '';
    }

    if(isset($_GET['idAlumno'])){
        $idAlumno = intval($_GET['idAlumno']);
    }
    else{
        $idAlumno =0;
    }
    $filtro = array(
        "idGrado" => $idGrado
    );
    $selectAlumnos = consultaAlumnoSelect($filtro,  $idAlumno, $required);
    echo $selectAlumnos;
}
?>