<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/conexiones/mysql_conexion.php");

function buscarCiclosDAO()
{
    try {
        $conn = getConnection();

        $sql = "SELECT c.IdCiclo, c.Ciclo FROM ciclo c ORDER BY c.IdCiclo DESC";

        $result = $conn->query($sql);

        $contador = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCiclo" => $row['IdCiclo'],
                    "ciclo" => $row['Ciclo']
                );

                $registros[$contador] = $registro;
                $contador = $contador + 1;
            }

            return $registros;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
