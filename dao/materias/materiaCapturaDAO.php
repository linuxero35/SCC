<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function insertMateriasDAO($materia){
    try {
        $conexion = getConnection();
 
        $sql = "insert into materias (Nombre,IdUsuarioAlta,FechaAlta,IdUsuarioMod,FechaMod,Active)values ('". $materia['nombre'] ."',1,Now(),NULL,NULL, 1)";
        echo $sql;
        $result = $conexion -> query($sql);
        
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
?>