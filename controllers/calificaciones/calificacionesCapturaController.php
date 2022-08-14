<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/capturaService.php");


try{
if (!empty($_POST)) {

    $calificacion = array(
        "calificacion" => $_POST['txtCalificacion'],
        "idMateria" => $_POST['txtMateria'],
        "anio" => $_POST['txtAnio'],
        "idPeriodo" => $_POST['txtPeriodo'],
        "idAlumno" => $_POST['txtIdAlumno']
    );

    print_r ($calificacion);

    if(isset($_POST['idCalificacion'])) {
     // updateAlumno($Calificacion);
     // header("Location: ../../alumnos/lista.php");
      //exit();
    } else  {
        capturaCalificaciones($alumno);
    }
}
}catch(Exception $e){
 echo $e -> getMessage();
}

header("Location: ../../alumnos/captura.php");
exit();
?>