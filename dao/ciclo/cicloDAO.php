<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/conexiones/mysql_conexion.php");

function buscarCiclosDAO()
{
    try {
        $conn = getConnection();

        $sql = "SELECT c.IdCiclo, c.Ciclo, c.fechainicio, c.fechafin FROM ciclo c ORDER BY c.IdCiclo DESC";

        $result = $conn->query($sql);

        $contador = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCiclo" => $row['IdCiclo'],
                    "ciclo" => $row['Ciclo'],
                    "fechainicio" => $row['fechainicio'],
                    "fechafin" => $row['fechafin']
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

function buscarCiclosFiltrosDAO($ciclo)
{
    try {
        $conn = getConnection();

        $filCiclo = "";
        $filActivo = "";

        if($ciclo['ciclo'] != ''){
            $filCiclo = "AND c.ciclo like '%" . $ciclo['ciclo'] . "%' ";
        }

        if($ciclo['activo'] != ''){
            $filActivo = "AND c.activo = " . $ciclo['activo'] . " ";
        }

        $sql = "SELECT c.IdCiclo, c.Ciclo, c.fechainicio, c.fechafin, CASE WHEN c.activo = 1 THEN 'Activo' ELSE 'Inactivo' END AS activo FROM ciclo c WHERE c.idciclo > 0 " . $filCiclo . $filActivo . ' ORDER BY c.fechainicio DESC, c.fechafin desc';

        echo $sql;

        $result = $conn->query($sql);

        $contador = 0;
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "IdCiclo" => $row['IdCiclo'],
                    "Ciclo" => $row['Ciclo'],
                    "Fechainicio" => $row['fechainicio'],
                    "Fechafin" => $row['fechafin'],
                    "Activo" =>  $row['activo'],
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
