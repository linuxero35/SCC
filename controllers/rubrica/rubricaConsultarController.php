<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/consultaService.php");


try {
    if (!empty($_POST)) {

        $filtro = array(
            "grado" => $_POST['idGrados'],
            "idciclo" => $_POST['idciclo'],
            "materia" => $_POST['idMateria'],
            "semestre" => $_POST['semestre']
        );

      consultaRubrica($filtro);
      print_r($filtro);
    }

    
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../rubricas/consulta.php");
exit();


?>