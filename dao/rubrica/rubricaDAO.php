<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function insertaRubricaDAO($rubrica)
{
    try {
        $conn = getConnection();
        $sql = "INSERT INTO rubrica(idCriterio, idPeriodo, Porcentaje, anio, IdGrado, IdUsuarioAlta, FechaAlta, IdUsuarioMod, FechaMod)" .
        "VALUES (" . $rubrica["criterio"] ."," . $rubrica["periodo"] ."," .$rubrica["porcentaje"]. "," . $rubrica["anio"] . "," . $rubrica["grado"] . ",1,Now(),NULL,NULL)";
        echo $sql;
        $result = $conn->query($sql);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
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
        $contador = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               
                $registro = array(
                    "idRubrica" => $row['IdRubrica'],
                    "idCriterio" => $row['IdCriterio'],
                    "criterio" => $row['criterio']
                );
                
                $registros[$contador++] = $registro;
            }

            return $registros;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} 
?>