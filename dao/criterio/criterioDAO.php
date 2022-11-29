<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function consultaCriterios(){
   try {
       $conexion = getConnection();

       $sql = "SELECT c.IdCriterio, c.Criterio FROM criterios c WHERE c.Activo = 1;";
       
       $result = $conexion -> query($sql);
       
        $contador=0;
       if ($result -> num_rows > 0) {
        while ($registro = $result -> fetch_assoc()) {
            $valores[0][0]=$registro['IdCriterio'];
            $valores[0][1]=$registro['Criterio'];

            $registros[$contador] = $valores;
            $contador=$contador+1;
        }
       }
        return $registros;
   } catch(Exception $e){
    echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
   }
}
function consultaCriteriosDAO($filtros){
    try {
        $conexion = getConnection();
 
        $filCriterio = '';
        $filActivo = '';

        if ($filtros['criterio'] != '') {
            $filCriterio = "AND c.Criterio like '%" . $filtros['criterio'] . "%' ";
        }
        
        if ($filtros['checkActivo'] != '') {
            $filActivo = "AND c.activo = " . $filtros['checkActivo'] . " ";
        }

        $sql = "SELECT c.IdCriterio, c.Criterio, CASE c.Activo WHEN 1 THEN 'Activo' ELSE 'Inactivo' END AS Activo FROM criterios c WHERE c.Criterio IS NOT NULL " .
        $filCriterio .
        $filActivo;
        
        $result = $conexion -> query($sql);
        echo $sql;
         $contador=0;
        if ($result -> num_rows > 0) {
         while ($registro = $result -> fetch_assoc()) {
             echo $registro['Criterio'];
             $valores = array(
                "IdCriterio" => $registro['IdCriterio'],
                "Criterio" => $registro['Criterio'],
                "Activo" => $registro['Activo']
            );
 
             $registros[$contador] = $valores;
             $contador=$contador+1;
         }
        }
         return $registros;
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
function insertCriterioDAO($criterio){
    try {
        $conexion = getConnection();
 
        $sql = "insert into criterios(Criterio,Activo,idUsuario,FechaAlta,IdUsuarioMod,FechaMod) value('". $criterio['criterio'] . "', 1,". $criterio['idUsuario'] . ",now(),null,null)";
        echo $sql;
        $result = $conexion -> query($sql);
        
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }

 function updateCriterioDAO($criterio){
    try{
      $conn = getConnection();
      $sql="UPDATE criterios SET Criterio='".$criterio['criterio'] ."', Activo=".$criterio['activo'] .", IdUsuario=".$criterio['idUsuario'] ." WHERE IdCriterio=".$criterio['idCriterio'] ." ";
      $result = $conn->query($sql);
      echo $sql;
     // return $criterio["idAlumno"];
  }  catch (Exception $e) {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
  } finally {
      $conn->close();
  }
  
  }

  function buscarCriterioDAO($IdCriterio)
{
    try {
        $conn = getConnection();

        $sql = "SELECT c.IdCriterio, c.Criterio, CASE c.Activo WHEN 1 THEN 'checked' ELSE '' END AS Activo FROM criterios c WHERE c.IdCriterio= " . $IdCriterio;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCriterio" => $row['IdCriterio'],
                    "criterio" => $row['Criterio'],
                    "activo" => $row['Activo']
                );
            }

            $_SESSION["criterio"] = $registro;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
?>