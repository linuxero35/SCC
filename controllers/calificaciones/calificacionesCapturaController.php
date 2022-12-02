<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/calificaciones/calificacionesServices.php");


try {
    if (!empty($_POST)) {

        $idcalificacion = 0;

        if (isset($_POST['idCalificacion'])) {
            $idcalificacion = $_POST["idCalificacion"];
        }

        $calificacion = array(
            "IdMateria" => $_POST['txtMateria'],
            "IdGrado" => $_POST['txtIdGrado'],
            "IdPeriodo" => $_POST['txtPeriodo'],
            "IdAlumno" => $_POST['txtIdAlumno'],
            "calificacion" => "0",
            "IdUsuario" => "1",
            "Activo" => "1",
            "IdCalificacion" => $idcalificacion,
            "idciclo" => $_POST["idciclo"],
            "idsemestre" => $_POST["semestre"]
        );

        print_r($calificacion);

        if (isset($_POST['idCalificacion'])) {
            updateCalificaciones($calificacion);

            $count = 1;

            if (isset($_POST['criterios'])) {

                print_r(array_keys($_POST['criterios']));
                $criterioskeys = array_keys($_POST['criterios']);
  
                foreach($criterioskeys as &$key) {
 
                 $calificacioncriterio = array(
                     "IdCalificacion"=>$idcalificacion,
                     "IdCalificacionCriterio" => $key,
                     "calificacion" => $_POST['criterios'][$key],
                     "IdUsuarioAlta" => 1
                 );
 
                 updateCalificacionesCriterio($calificacioncriterio);
                }
             }

            

          //  header("Location: ../../alumnos/lista.php");
          //  exit();
        } else {
            $criterioskeys = array_keys($_POST['criterios']);
            $calificacionf = 0;

            foreach($criterioskeys as &$key) {
                $calificacionf += number_format($_POST['calificaciones'][$key], 2);
               echo $_POST['calificaciones'][$key] . '<br>';
               echo $calificacionf. '<br>';
            }

            $calificacion['calificacion'] = $calificacionf;

            echo  'final:' . $calificacion['calificacion'];

            $idcalificacion = capturaCalificaciones($calificacion);

            foreach($criterioskeys as &$key) {

                $calificacioncriterio = array(
                    "IdCalificacion" => $idcalificacion,
                    "IdCriterio" => $key,
                    "calificacion" => $_POST['criterios'][$key],
                    "calificacionf" => $_POST['calificaciones'][$key],
                    "IdUsuarioAlta" => 1
                );

                capturaCalificacionesCriterio($calificacioncriterio);
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../calificaciones/captura.php");
exit();
