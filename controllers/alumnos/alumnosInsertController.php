<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/capturaService.php");


try{
if (!empty($_POST)) {

    $activo = 0;

    if(isset($_POST['activo'])) {
      $activo = 1;
    }

    $alumno = array(
        "nombre" => $_POST['txtn'],
        "apePat" => $_POST['txtap'],
        "apeMat" => $_POST['txtam'],
        "correo" => $_POST['txtc'],
        "activo" => $activo,
        "generacion" => $_POST['txtg'],
        "grado" => $_POST['idGrado'],
        "anio" => $_POST['txtan'],
        "numLista" => $_POST['txtno'],
        "sexo" => $_POST['filSexo']
    );
    print_r ($alumno);
    insertarAlumno($alumno);
}
}catch(Exception $e){
 echo $e -> getMessage();
}

header("Location: ../../alumnos/captura.php");
exit();
?>