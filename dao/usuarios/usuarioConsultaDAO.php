<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
function consultaUsuarioDAO($usuario){
    try {
        $conexion = getConnection();
        $filusuario = '';
        $filapellidoPat = '';
        $filapellidoMat = '';
        $filnombre = '';
        $filactivo = '';
        if($usuario['usuario'] != ''){
            $filusuario = "AND u.usuario like '%".$usuario['usuario']."%' ";
        }
        if($usuario['apellidoPat'] != ''){
            $filapellidoPat = "AND u.apellidoPat like '%".$usuario['apellidoPat']."%' ";
        }
        if($usuario['apellidoMat'] != ''){
            $filapellidoMat = "AND u.apellidoMat like  '%".$usuario['apellidoMat']."%' ";
        }
        if($usuario['nombre'] != ''){
            $filnombre = "AND u.nombre like '%".$usuario['nombre']."%' ";
        }
        if($usuario['checkActivo'] != ''){
            $filactivo = "AND u.activo = ".$usuario['checkActivo']." ";
        }
        $sql ="select u.usuario, CONCAT(u.Nombre,' ',u.ApellidoPat,' ',u.ApellidoMat) AS nombre,u.idUsuario, CASE WHEN u.activo = 1 THEN 'Activo' ELSE 'Inactivo' END AS activo from usuario u where u.idusuario >0  " .$filusuario.$filapellidoMat.$filapellidoPat.$filnombre.$filactivo;
        echo $sql;
        $contador = 0;
        $result = $conexion -> query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $checkActivo = '';

                if(isset($_POST['activo'])) {
                    print_r($_POST['activo']);
                    $checkActivo = '1';
                } else  {
                    $checkActivo = '0';
                }
                $registro = array(
                    "usuario" => $row['usuario'],
                    "Activo" => $row['activo'],
                    "nombre" => $row['nombre'],
                    "IdUsuario" => $row['idUsuario']
                    
                );

                $registros[$contador++] = $registro;
            }
            return $registros;
        }

    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
  ?>



