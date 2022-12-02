<?php
include '../services/loginService.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IdUsuario = $_POST['IdUsuario'];
    $Password = $_POST['Password'];
    echo $IdUsuario;
    echo $Password;
    $valida=login($IdUsuario, $Password);
    if($valida){

       
            header("Location: ../home.php");
     
            
       
  
    exit();
    } else {
        $alumno=loginalumno($IdUsuario, $Password);
        header("Location: ../controllers/calificaciones/tablacalificacionesController.php?IdAlumno=".$alumno['idalumno'].'&tipo=2');
        exit();
    }

}
    


?>