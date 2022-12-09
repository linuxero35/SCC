<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/materias/materiasService.php");
session_start();
try {
    if (!empty($_POST)) {

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            print_r($_POST['activo']);
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $materia = array(
            "nombre" => $_POST['txtmateria'],
            "checkActivo" => $checkActivo
        );

      $registros = consultaMaterias($materia);

      print_r($registros);

      $_SESSION["listaMaterias"]=$registros;
      
      print_r($materia);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../materias/consulta.php");
exit();


?>