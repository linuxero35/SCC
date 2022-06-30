<?php

include '../conexiones/mysql_conexion.php';

function consultaGrados(){
   try {
       $conexion = getConnection();

       $sql = "SELECT g.IdGrado, g.Grado FROM grados g WHERE g.Activo = 1";
       
       $result = $conexion -> query($sql);
       
        $contador=0;
       if ($result -> num_rows > 0) {
        while ($registro = $result -> fetch_assoc()) {
            $valores[0][0]=$registro['IdGrado'];
            $valores[0][1]=$registro['Grado'];

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