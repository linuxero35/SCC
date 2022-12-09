<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/materias/capturaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/materias/editarService.php");

try {
    if (!empty($_POST)) {

        $idMateria = 0;

        if(isset($_POST['IdMateria'])){
            $idMateria = $_POST['IdMateria'];
        }

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $materia = array(
            "IdMateria" => $idMateria,
            "nombre" => $_POST['txtmateria'],
            "activo" => $checkActivo
            
        );

        print_r($materia);

        if (isset($_POST['IdMateria'])) {
            updateMateria($materia);
           header("Location: ../../materias/consulta.php");
           exit();
        } else {
            insertMaterias($materia);
        }
        
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../materias/captura.php");
exit();
?>