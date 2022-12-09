<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function insertMateriasDAO($criterio){
    try {
        $conexion = getConnection();
 
        $sql = "insert into criterios(Criterio,Activo,idUsuario,FechaAlta,IdUsuarioMod,FechaMod) value('". $criterio['criterio'] . "', 1,". $criterio['idUsuario'] . ",now(),null,null)";
        echo $sql;
        $result = $conexion -> query($sql);
        
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
?>