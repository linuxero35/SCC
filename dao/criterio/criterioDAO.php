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

?>