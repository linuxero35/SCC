<?php

try {
    if (!empty($_POST)) {

        $alumno = array(
            "nombre" => $_POST['filn'],
            "apePat" => $_POST['filap'],
            "apeMat" => $_POST['filam'],
            "Grado" => $_POST['filGrado']
        );
    }

    print_r($alumno);
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../alumnos/lista.php");
exit();
?>