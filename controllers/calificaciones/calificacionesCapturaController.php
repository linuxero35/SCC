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
            $idcalificacion = capturaCalificaciones($calificacion);

            $count = 1;

            while(isset($_POST['criterio_'.$count])){

                $calificacioncriterio = array(
                    "IdCalificacion" => $idcalificacion,
                    "IdCriterio" => $_POST['criterio_'.$count],
                    "calificacion" => $_POST['calificacion_'.$count],
                    "IdUsuarioAlta" => 1
                );

                $count = $count + 1;
                capturaCalificacionesCriterio($calificacioncriterio);
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../calificaciones/captura.php");
exit();
?>