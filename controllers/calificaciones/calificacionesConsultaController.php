<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/calificaciones/calificacionesServices.php");
session_start();
try {
    if (!empty($_POST)) {

        $filtros = array(
            "idGrado" => $_POST['txtIdGrado'],
            "idPeriodo" => $_POST['txtPeriodo'],
            "idMateria" => $_POST['txtMateria'],
            "idAlumno" => $_POST['txtIdAlumno'],
            "idsemestre" => $_POST['semestre'],
            "idciclo" => $_POST['idciclo']
        );

      $registros = consultaCalificaciones($filtros);
      $_SESSION["listaCalificaciones"]=$registros;
      print_r($filtros);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
//header("Location: ../../calificaciones/consulta.php");
//exit();


?>