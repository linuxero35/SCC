<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/usuarios/usuariosCapturaService.php");
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

        $usuario = array(
            "usuario" => $_POST['txtusuario'],
            "checkActivo" => $checkActivo,
            "nombre" => $_POST['txtnombre'],
            "apellidoPat" => $_POST['txtap'],
            "apellidoMat" => $_POST['txtam']
        );

      $registros = consultaUsuarios($usuario);

      print_r($registros);

      $_SESSION["listaUsuarios"]=$registros;
      
      print_r($usuario);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: ../../usuarios/consulta.php");
exit();


?>