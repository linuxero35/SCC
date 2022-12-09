<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/usuarios/usuariosCapturaService.php");

try {
    if (!empty($_POST)) {

        $idUsuario = 0;

        if(isset($_POST['IdUsuario'])){
            $idUsuario = $_POST['IdUsuario'];
        }

        $checkActivo = '';

        if(isset($_POST['activo'])) {
            $checkActivo = '1';
        } else  {
            $checkActivo = '0';
        }

        $usuario = array(
            "usuario" => $_POST['txtusuario'],
            "activo" => $checkActivo,
            "nombre" => $_POST['txtnombre'],
            "apellidoPat" => $_POST['txtap'],
            "apellidoMat" => $_POST['txtam'],
            "password" => $_POST['txtcontra'],
            "idUsuario" => $idUsuario
        );

        print_r($usuario);

        if (isset($_POST['IdUsuario'])) {
            updateUsuarios($usuario);
           header("Location: ../../usuarios/consulta.php");
           exit();
        } else {
            insertUsuario($usuario);
        }
        
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

header("Location: ../../usuarios/captura.php");
exit();
?>