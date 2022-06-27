<?php

include '../conexiones/mysql_conexion.php';

function consultaGrados($IdUsuario, $Password){
   try {
       $conexion = getConnection();

       $sql = "SELECT g.IdGrado, g.Grado FROM grados g WHERE g.Activo = 1";
       
       $result = $conexion -> query($sql);

       if ($result -> num_rows > 0) {
        while ($registro = $result -> fetch_assoc()) {
            echo $registro['IdGrado'];
            echo $registro['Grado'];
        }
       }

   } catch(Exception $e){
    echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
   }
}
?>