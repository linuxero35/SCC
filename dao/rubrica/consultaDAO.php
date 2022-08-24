<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
session_start();

function consultaRubricaDAO($filtro)
{
    try {
        $conn = getConnection();
        $filGrado = '';
        $filAnio = '';

        if ($filtro['grado'] != '') {
            $filGrado = "AND g.IdGrado =" . $filtro['grado'] . " ";
        }

        if ($filtro['anio'] != '') {
            $filAnio = "AND r.anio =" . $filtro['anio'] . " ";
        }

        $sql = "SELECT r.IdRubrica," .
                      "c.Criterio," .
                      "p.Periodo, " .
                      "r.Porcentaje, " .
                      "g.Grado, " .
                      "r.anio " .
                 "FROM rubrica r " .
            "LEFT JOIN criterios c ON r.IdCriterio = c.IdCriterio " .
            "LEFT JOIN periodos p ON r.IdPeriodo = p.IdPeriodo " .
            "LEFT JOIN grados g ON r.IdGrado = g.IdGrado " .
                "WHERE r.IdRubrica > 0 " .
                       $filGrado .
                       $filAnio . 
                       "ORDER BY r.IdRubrica ASC";

        $contador = 0;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['IdRubrica'];
                 //echo "rubrica: " . $row["IdRubrica"] . " - Apellido: " . $row["Criterio"] . " " . $row["Periodo"] . " ". $row["Porcentaje"]." " . $row["Grado"]. " ".$row['anio']. "<br>";
                $registro = array(
                    "idRubrica" => $row['IdRubrica'],
                    "criterio" => $row['Criterio'],
                    "periodo" => $row['Periodo'],
                    "porcentaje" => $row['Porcentaje'],
                    "grado" => $row['Grado'],
                    "anio" => $row['anio']
                );

                $registros[$contador++] = $registro;
            }
            $_SESSION["consultaRubrica"] = $registros;
        } else {
            echo "0 results";
            $_SESSION["consultaRubricaMsg"] = 'No se encontraron registros con los campos solicitados';
        }

        echo $sql;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function consultaAnio()
{
    try {
        $conn = getConnection();
        $sql = "SELECT DISTINCT YEAR(CURDATE()) AS anioFinal,MIN(r.anio) AS anioInicio FROM rubrica r ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $registro = array(
                    "anioInicial" => $row['anioInicio'],
                    "anioFinal" => $row['anioFinal']
                );
                return $registro;
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} 

function consultaRubricasParametros($filtros)
{
    try {
        $conn = getConnection();

        $sql = "select r.IdRubrica," .
                      "c.IdCriterio," .
                      "c.criterio " .
                 "from rubrica r " .
            "left join criterios c ON r.IdCriterio = c.IdCriterio " .
                "where r.IdGrado = " . $filtros['IdGrado'] . " " .
                  "and r.idperiodo = " . $filtros['IdPeriodo'];

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $registro = array(
                    "idRubrica" => $row['IdRubrica'],
                    "idCriterio" => $row['IdCriterio'],
                    "criterio" => $row['criterio']
                );
                return $registro;
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} 
?>