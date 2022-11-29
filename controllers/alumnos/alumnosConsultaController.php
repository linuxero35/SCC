<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/alumnos/consultaService.php");


try {
    if (!empty($_POST)) {

        $filtro = array(
            "nombre" => $_POST['filn'],
            "apePat" => $_POST['filap'],
            "apeMat" => $_POST['filam'],
            "grado" => $_POST['filGrado'],
            "activo" => $_POST['filActivo'],
            "semestre" => $_POST['semestre'],
             "sexo" => $_POST['filSexo']
        );

      consultaAlumnos($filtro);
      print_r($filtro);
    }

    
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../alumnos/lista.php");
exit();


?>