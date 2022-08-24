<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");
function buscarRubricaDAO($idRubrica)
{
    try {
        $conn = getConnection();

        $sql = "SELECT r.IdCriterio, r.IdPeriodo,r.anio, r.Porcentaje, r.IdGrado, r.IdRubrica FROM rubrica r WHERE r.IdRubrica = " . $idRubrica;
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCriterio" => $row['IdCriterio'],
                    "idPeriodo" => $row['IdPeriodo'],
                    "anio" => $row['anio'],
                    "porcentaje" => $row['Porcentaje'],
                    "idRubrica" => $row['IdRubrica'],
                    "idGrado" => $row['IdGrado']
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
        $sql = "UPDATE rubrica SET IdCriterio = " . $rubrica['criterio'] . ", IdPeriodo = " . $rubrica['periodo'] . ", Porcentaje = " . $rubrica['porcentaje'] . ", IdGrado =" . $rubrica['grado'] . ", anio= " . $rubrica['anio'] . ",IdUsuarioMod =1, FechaMod = now() WHERE IdRubrica = " . $rubrica['idRubrica'] . "";
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