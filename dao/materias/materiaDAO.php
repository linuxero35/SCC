<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function consultaMateriasDAO()
{
    try {
        $conexion = getConnection();

        $sql = "SELECT m.IdMateria, m.Nombre FROM materias m WHERE m.Active = 1;";

        $result = $conexion->query($sql);

        $contador = 0;

        if ($result->num_rows > 0) {
            while ($registro = $result->fetch_assoc()) {
                $valores[0][0] = $registro['IdMateria'];
                $valores[0][1] = $registro['Nombre'];

                $registros[$contador] = $valores;
                $contador = $contador + 1;
            }
        }
        return $registros;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
function consultaMateriaDAO($materia){
    try {
        $conexion = getConnection();
 
        $filCriterio = '';
        $filActivo = '';

        if ($materia['nombre'] != '') {
            $filCriterio = "AND m.nombre like '%" . $materia['nombre'] . "%' ";
        }
        
        if ($materia['checkActivo'] != '') {
            $filActivo = "AND m.active = " . $materia['checkActivo'] . " ";
        }

        $sql = "SELECT m.IdMateria, m.Nombre, CASE m.Active WHEN 1 THEN 'Activo' ELSE 'Inactivo' END AS Activo FROM materias m WHERE m.nombre IS NOT NULL " .
        $filCriterio .
        $filActivo;
        
        $result = $conexion -> query($sql);
        echo $sql;
         $contador=0;
        if ($result -> num_rows > 0) {
         while ($materia = $result -> fetch_assoc()) {
             echo $materia['Nombre'];
             $valores = array(
                "IdMateria" => $materia['IdMateria'],
                "Nombre" => $materia['Nombre'],
                "Activo" => $materia['Activo']
            );
 
             $materias[$contador] = $valores;
             $contador=$contador+1;
         }
        }
         return $materias;
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
?>