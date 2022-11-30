<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');

function consultaCalificacionesDAO($filtro)
{
    try {
        $conn = getConnection();

        $filGrado = '';
        $filPeriodo = '';
        $filMateria = '';
        $filIdAlumno = '';

        if ($filtro['idGrado'] != 0 && $filtro['idGrado'] != '') {
            $filGrado = "AND g.IdGrado =" . $filtro['idGrado'] . " ";
        }

        if ($filtro['idPeriodo'] != 0 && $filtro['idPeriodo'] != '') {
            $filPeriodo = "AND c.IdPeriodo = " . $filtro['idPeriodo'] . " ";
        }

        if ($filtro['idMateria'] != 0 && $filtro['idMateria'] != '') {
            $filMateria  = "AND c.IdMateria = " . $filtro['idMateria'] . " ";
        }

        if ($filtro['idAlumno'] != 0 && $filtro['idAlumno'] != '') {
            $filIdAlumno = "AND c.IdAlumno = " . $filtro['idAlumno'] . " ";
        }

        $sql = "SELECT c.IdCalificacion, " .
                      "gr.Grado," .
                      "p.Periodo," .
                      "m.Nombre as materia," .
                      "CONCAT(a.Nombre, ' ', a.ApellidoPat, ' ', a.ApellidoMat) AS Nombre " .
                 "FROM calificaciones c " .
            "left join gradosalumnos g on c.IdGradoAlumno = g.IdGradoAlumno " .
            "left join alumnos a on c.IdAlumno = a.IdAlumno " .
            "left join periodos p on c.IdPeriodo = p.IdPeriodo " .
            "left join grados gr on g.IdGrado = gr.IdGrado " .
            "left join materias m on c.IdMateria = m.IdMateria " .
                "where c.IdCalificacion IS NOT NULL " .
                  $filGrado .
                  $filPeriodo .
                  $filMateria .
                  $filIdAlumno;

                  echo $sql;
        $result = $conn->query($sql);

        $contador = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registro = array(
                    "IdCalificacion" => $row['IdCalificacion'],
                    "Grado" => $row['Grado'],
                    "Periodo" => $row['Periodo'],
                    "Materia" => $row['materia'],
                    "Nombre" => $row['Nombre']
                );

                $registros[$contador++] = $registro;
            }
            return $registros;
        } else {
            echo "0 results";
        }

        $conn->close();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function consultaCalificacionDAO($IdCalificacion)
{
    try {
        $conn = getConnection();

        $sql = "select c.IdCalificacion," .
                      "g.IdGrado," .
                      "c.IdPeriodo," .
                      "c.IdMateria," .
                      "c.IdAlumno " .
                 "from calificaciones c " .
            "left join gradosalumnos g on c.IdGradoAlumno = g.IdGradoAlumno " .
                "where c.IdCalificacion = " . $IdCalificacion;

                 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $registro = array(
                    "IdCalificacion" => $row['IdCalificacion'],
                    "Grado" => $row['IdGrado'],
                    "Periodo" => $row['IdPeriodo'],
                    "Materia" => $row['IdMateria'],
                    "IdAlumno" => $row['IdAlumno']
                );

                return $registro;
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function consultaCalificacionDetalleDAO($IdCalificacion)
{
    try {
        $conn = getConnection();

        $sql = "select c.IdCalificacionCriterio," .
                      "c.IdCalificacion," .
                      "c.IdCriterio," .
                      "c.Calificacion, " .
                      "cr.Criterio " .
                 "from calificacionescriterio c " .
                 "left join criterios cr on cr.IdCriterio = c.IdCriterio " .
                "where c.idcalificacion = " . $IdCalificacion;

                 
        
        $contador = 0;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registro = array(
                    "idCalificacionCriterio" => $row['IdCalificacionCriterio'],
                    "idCalificacion" => $row['IdCalificacion'],
                    "idCriterio" => $row['IdCriterio'],
                    "criterio" => $row['Criterio'],
                    "calificacion" => $row['Calificacion']
                );

                $registros[$contador++] = $registro;
            }
            return $registros;
        } else {
            echo "0 results";
        }

        $conn->close();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>