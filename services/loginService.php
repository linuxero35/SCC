<?php
 include '../dao/login.php';
function login($IdUsuario, $Password){
    return loginDAO($IdUsuario, $Password);
}

function loginalumno($IdUsuario, $Password){
    return loginAlumnoDAO($IdUsuario, $Password);
}

?>