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
?>