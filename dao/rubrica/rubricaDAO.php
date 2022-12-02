<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function insertaRubricaDAO($rubrica)
{
    try {
        $conn = getConnection();
        $sql = "INSERT INTO rubrica(idCriterio, idPeriodo, Porcentaje, idciclo, IdGrado, IdUsuarioAlta, FechaAlta, IdUsuarioMod, FechaMod, idmateria,semestre)" .
        "VALUES (" . $rubrica["criterio"] .",1," .$rubrica["porcentaje"]. "," . $rubrica["idciclo"] . "," . $rubrica["grado"] . ",1,Now(),NULL,NULL, " .$rubrica["materia"] .",". $rubrica['semestre'].")";
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

        $filCiclo = '';
        $filGrado = '';
        $filSemestre = '';
        $filMateria = '';

        if($filtros['IdCiclo']!='' && $filtros['IdCiclo']!=0){
            $filCiclo = 'AND r.idciclo=' . $filtros['IdCiclo'] . ' ';
        }
        if($filtros['IdGrado']!='' && $filtros['IdGrado']!=0){
            $filGrado = 'AND r.idgrado=' .  $filtros['IdGrado'].' ';
        }
        if($filtros['IdSemestre']!='' && $filtros['IdSemestre']!=0){
            $filSemestre = 'AND r.semestre=' .  $filtros['IdSemestre'] . ' ';
        }
        if($filtros['IdMateria']!='' && $filtros['IdMateria']!=0){
            $filMateria = 'AND r.idmateria=' .  $filtros['IdMateria'] . ' ';
        }

        $sql = "select r.IdRubrica," .
                      "c.IdCriterio," .
                      "c.criterio," .
                      "r.porcentaje " .
                 "from rubrica r " .
            "left join criterios c ON r.IdCriterio = c.IdCriterio " .
                "where r.IdGrado > 0 " . 
                $filCiclo .
                $filGrado .
                $filSemestre .
                $filMateria;

               
        $result = $conn->query($sql);
        $contador = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               
                $registro = array(
                    "idRubrica" => $row['IdRubrica'],
                    "idCriterio" => $row['IdCriterio'],
                    "criterio" => $row['criterio'],
                    "porcentaje" => $row['porcentaje']
                );
                
                $registros[$contador++] = $registro;
            }

            return $registros;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
