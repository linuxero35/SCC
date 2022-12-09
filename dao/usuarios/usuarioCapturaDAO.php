<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
function insertUsuarioDAO($usuario){
    try {
        $conexion = getConnection();
 
        $sql = "INSERT INTO usuario(Usuario, Nombre, ApellidoPat, ApellidoMat, Correo, Activo, FechaAlta, IdUsuarioAlta, FechaMod, IdUsuarioMod, Password, IdRole, idtipousuario) VALUES ('".$usuario['usuario']."','".$usuario['nombre']."','".$usuario['apellidoPat']."','".$usuario['apellidoMat']."','".$usuario['usuario']."',1,now(),1,Null,Null,'".$usuario['password']."',1,1)";
        echo $sql;
        $result = $conexion -> query($sql);
        
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }

 
  ?>