<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
session_start();

function consultaRubricaDAO($filtro)
{
    try {
        $conn = getConnection();
        $filGrado = '';
        $filAnio = '';
        $filMateria = '';

        if ($filtro['grado'] != '') {
            $filGrado = "AND g.IdGrado =" . $filtro['grado'] . " ";
        }

        if ($filtro['anio'] != '') {
            $filAnio = "AND r.anio =" . $filtro['anio'] . " ";
        }
        if ($filtro['materia'] != '') {
            $filMateria = "AND r.idmateria =" . $filtro['materia'] . " ";
        }

        $sql = "SELECT r.IdRubrica," .
                      "c.Criterio," .
                      "p.Periodo, " .
                      "r.Porcentaje, " .
                      "g.Grado, " .
                      "r.anio, " .
                      "m.nombre AS materia, " .
                      "CASE r.semestre WHEN 0 THEN 'No especificado' WHEN 1 THEN 'Primer semestre' WHEN 2 THEN 'Segundo semestre' END AS semestre " .
                 "FROM rubrica r " .
            "LEFT JOIN criterios c ON r.IdCriterio = c.IdCriterio " .
            "LEFT JOIN periodos p ON r.IdPeriodo = p.IdPeriodo " .
            "LEFT JOIN grados g ON r.IdGrado = g.IdGrado " .
            "LEFT JOIN materias m ON r.idmateria = m.idmateria " .
                "WHERE r.IdRubrica > 0 " .
                       $filGrado .
                       $filAnio . 
                       $filMateria .
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
                    "anio" => $row['anio'],
                    "materia" => $row['materia'],
                    "semestre" => $row['semestre']
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
?>