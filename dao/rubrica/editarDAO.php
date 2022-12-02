<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");
function buscarRubricaDAO($idRubrica)
{
    try {
        $conn = getConnection();

        $sql = "SELECT r.IdCriterio, r.IdPeriodo,r.idciclo, r.Porcentaje, r.IdGrado, r.idmateria, r.IdRubrica, r.semestre FROM rubrica r WHERE r.IdRubrica = " . $idRubrica;
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCriterio" => $row['IdCriterio'],
                    "idPeriodo" => $row['IdPeriodo'],
                    "idciclo" => $row['idciclo'],
                    "porcentaje" => $row['Porcentaje'],
                    "idRubrica" => $row['IdRubrica'],
                    "idGrado" => $row['IdGrado'],
                    "idmateria" => $row['idmateria'],
                    "semestre" => $row['semestre']
                );
            }

            $_SESSION["rubrica"] = $registro;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
function updateRubricaDAO($rubrica)
{
    try {
        $conn = getConnection();
        $sql = "UPDATE rubrica SET IdCriterio = " . $rubrica['criterio'] . ", Porcentaje = " . $rubrica['porcentaje'] . ", IdGrado =" . $rubrica['grado'] . ", idciclo= " . $rubrica['idciclo'] . ",IdUsuarioMod =1, FechaMod = now(), idmateria = ".$rubrica['materia'] .", semestre = " . $rubrica['semestre'] . " WHERE IdRubrica = " . $rubrica['idRubrica'] . "";
        echo $sql;
        $result = $conn->query($sql);
        return $rubrica["idRubrica"];
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}      
?>