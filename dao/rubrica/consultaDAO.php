<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
session_start();

function consultaRubricaDAO($filtro)
{
    try {
        $conn = getConnection();
        $filGrado = '';
        $filCiclo = '';
        $filMateria = '';
        $filSemestre = '';

        if ($filtro['grado'] != '') {
            $filGrado = "AND g.IdGrado =" . $filtro['grado'] . " ";
        }

        if ($filtro['idciclo'] != '') {
            $filCiclo = "AND r.idciclo =" . $filtro['idciclo'] . " ";
        }
        if ($filtro['materia'] != '') {
            $filMateria = "AND r.idmateria =" . $filtro['materia'] . " ";
        }
        if ($filtro['semestre'] != '' && $filtro['semestre'] != '0') {
            $filSemestre = "AND r.semestre =" . $filtro['semestre'] . " ";
        }

        $sql = "SELECT r.IdRubrica," .
                      "c.Criterio," .
                      "p.Periodo, " .
                      "r.Porcentaje, " .
                      "g.Grado, " .
                      "cl.ciclo, " .
                      "m.nombre AS materia, " .
                      "s.semestre " .
                 "FROM rubrica r " .
            "LEFT JOIN criterios c ON r.IdCriterio = c.IdCriterio " .
            "LEFT JOIN periodos p ON r.IdPeriodo = p.IdPeriodo " .
            "LEFT JOIN grados g ON r.IdGrado = g.IdGrado " .
            "LEFT JOIN ciclo cl ON r.idciclo = cl.idciclo " .
            "LEFT JOIN materias m ON r.idmateria = m.idmateria " .
            "LEFT JOIN semestres s ON s.idsemestre = r.semestre " .
                "WHERE r.IdRubrica > 0 " .
                       $filGrado .
                       $filCiclo . 
                       $filMateria .
                       $filSemestre .
                       "ORDER BY r.IdRubrica ASC";

        $contador = 0;
echo $sql;
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
                    "ciclo" => $row['ciclo'],
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