<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/capturaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/editarService.php");


try {
    if (!empty($_POST)) {

        $IdRubrica = "";

        if (isset($_POST['idRubrica'])) {
            $IdRubrica = $_POST['idRubrica'];
        }
        $rubrica = array(
            "criterio" => $_POST['idCriterio'],
            "porcentaje" => $_POST['txtap'],
            "grado" => $_POST['idGrado'],
            "idRubrica" => $IdRubrica,
            "idciclo" => $_POST['idciclo'],
            "materia" => $_POST['idMateria'],
            "semestre" => $_POST['semestre']
        );

        print_r($rubrica);

        if (isset($_POST['idRubrica'])) {
            updateRubrica($rubrica);

         header("Location: ../../rubricas/consulta.php");
           exit();
        } else {
            insertarRubrica($rubrica);
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

 header("Location: ../../rubricas/captura.php");
exit();
?>