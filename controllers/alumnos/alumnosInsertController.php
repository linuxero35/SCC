<?php
include "../../services/alumnos/capturaService.php";

try{
if (!empty($_POST)) {
    $alumno = array(
        "nombre" => $_POST['txtn'],
        "apePat" => $_POST['txtap'],
        "apeMat" => $_POST['txtam'],
        "correo" => $_POST['txtc'],
        "activo" => $_POST['txtac'],
        "generacion" => $_POST['txtg'],
        "grado" => $_POST['txtgr'],
        "anio" => $_POST['txtan'],
        "numero" => $_POST['txtno']
    );

    insertarAlumno($alumno);
}
}catch(Exception $e){
 echo $e -> getMessage();
}

//header("Location: ../../alumnos/captura.php");
//exit();
?>