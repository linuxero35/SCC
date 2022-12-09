<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/SCC/conexiones/mysql_conexion.php');
session_start();

function buscarCicloDAO($IdCiclo)
{
    try {
        $conn = getConnection();

        $sql = "SELECT c.IdCiclo, c.fechainicio, c.fechafin, c.activo FROM ciclo c WHERE c.IdCiclo = " . $IdCiclo;

        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idCiclo" => $row['IdCiclo'],
                    "fechainicio" => $row['fechainicio'],
                    "fechafin" => $row['fechafin'],
                    "activo" => $row['activo']
                );
            }

            $_SESSION["ciclo"] = $registro;

            print_r($_SESSION["ciclo"]);
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}

function updateCicloDAO($ciclo)
{
    try {
        $conn = getConnection();

        $sql = "UPDATE ciclo set ciclo = '" . $ciclo['anioinicio'] . '-' . $ciclo['aniofin'] . "', fechainicio='" . $ciclo['fechainicio'] . "', fechafin='" . $ciclo['fechafin'] . "', activo=" . $ciclo['activo'] . ", fechamod=now(), idusuariomod=1 where idciclo=" . $ciclo['idCiclo'];

        echo $sql;
        
        $result = $conn->query($sql);
        
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}


?>