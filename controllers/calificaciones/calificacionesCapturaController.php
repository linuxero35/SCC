<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");


try {
    if (!empty($_POST)) {

        $calificacion = array(
            "IdMateria" => $_POST['txtMateria'],
            "IdGrado" => $_POST['txtIdGrado'],
            "IdPeriodo" => $_POST['txtPeriodo'],
            "IdAlumno" => $_POST['txtIdAlumno'],
            "calificacion" => "0",
            "IdUsuario" => "1",
            "Activo" => "1"
        );

        print_r($calificacion);

        if (isset($_POST['idCalificacion'])) {
            // updateAlumno($Calificacion);
            // header("Location: ../../alumnos/lista.php");
            //exit();
        } else {
            capturaCalificaciones($calificacion);
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../calificaciones/captura.php");
exit();
?>