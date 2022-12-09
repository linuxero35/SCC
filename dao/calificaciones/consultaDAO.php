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
        $filCiclo = '';
        $filSemestre = '';

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
        if ($filtro['idciclo'] != 0 && $filtro['idciclo'] != '') {
            $filCiclo = "AND c.idciclo =" . $filtro['idciclo'] . " ";
        }
        if ($filtro['idsemestre'] != 0 && $filtro['idsemestre'] != '') {
            $filSemestre = "AND s.idsemestre =" . $filtro['idsemestre'] . " ";
        }


        $sql = "SELECT c.IdCalificacion, " .
                      "gr.Grado," .
                      "p.Periodo," .
                      "m.Nombre as materia," .
                      "cl.ciclo," .
                      "s.semestre," .
                      "CONCAT(a.Nombre, ' ', a.ApellidoPat, ' ', a.ApellidoMat) AS Nombre " .
                 "FROM calificaciones c " .
            "left join gradosalumnos g on c.IdGradoAlumno = g.IdGradoAlumno " .
            "left join alumnos a on c.IdAlumno = a.IdAlumno " .
            "left join periodos p on c.IdPeriodo = p.IdPeriodo " .
            "left join grados gr on g.IdGrado = gr.IdGrado " .
            "left join ciclo cl on c.idciclo = cl.idciclo " .
            "left join semestres s on c.idsemestre = s.idsemestre " .
            "left join materias m on c.IdMateria = m.IdMateria " .
                "where c.IdCalificacion IS NOT NULL " .
                  $filGrado .
                  $filPeriodo .
                  $filMateria .
                  $filCiclo .
                  $filSemestre . 
                  $filIdAlumno;
                   
                 
        $result = $conn->query($sql);

        $contador = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registro = array(
                    "IdCalificacion" => $row['IdCalificacion'],
                    "Grado" => $row['Grado'],
                    "Periodo" => $row['Periodo'],
                    "Materia" => $row['materia'],
                    "Nombre" => $row['Nombre'],
                    "ciclo" => $row['ciclo'],
                    "semestre" => $row['semestre']
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
                      "c.IdAlumno, " .
                      "cl.idciclo " .
                 "from calificaciones c " .
            "left join gradosalumnos g on c.IdGradoAlumno = g.IdGradoAlumno " .
            "left join ciclo cl on g.idciclo = cl.idciclo " .
                "where c.IdCalificacion = " . $IdCalificacion;

               
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $registro = array(
                    "IdCalificacion" => $row['IdCalificacion'],
                    "Grado" => $row['IdGrado'],
                    "Periodo" => $row['IdPeriodo'],
                    "Materia" => $row['IdMateria'],
                    "IdAlumno" => $row['IdAlumno'],
                    "idciclo" => $row['idciclo']
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

function consultaCalificacionDetalleDAO($IdCalificacion, $idgrado)
{
    try {
        $conn = getConnection();

        $sql = "select distinct c.IdCalificacionCriterio," .
                      "c.IdCalificacion," .
                      "c.IdCriterio," .
                      "c.Calificacion, " .
                      "cr.Criterio," .
                      "r.Porcentaje," .
                      "c.Calificacionf " .
                 "from calificacionescriterio c " .
                 "left join calificaciones cl on cl.idcalificacion=c.idcalificacion " .
                 "left join criterios cr on cr.IdCriterio = c.IdCriterio " .
                 "left join rubrica r on cl.idciclo = r.idciclo " .
                                    "and cl.idsemestre = r.semestre " .
                                    "and cl.idmateria = r.idmateria " .
                                    "and r.idgrado = " . $idgrado . " " .
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
                    "calificacion" => $row['Calificacion'],
                    "calificacionf" => $row['Calificacionf'],
                    "porcentaje" => $row['Porcentaje']
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
function consultaTablaCalificacionesDAO($IdAlumno)
{
    try {
        $conn = getConnection();

        $sql = "SELECT m.Nombre as materia," .
                      "concat(a.nombre,' ',a.apellidopat,' ',a.apellidomat) as nombreal," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 1 THEN c.calificacion ELSE 0 END),1) AS S1," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 2 THEN c.calificacion ELSE 0 END),1) AS S2," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 3 THEN c.calificacion ELSE 0 END),1) AS S3, " .
                      "ROUND((SUM(CASE c.idperiodo WHEN 1 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 2 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 3 THEN c.calificacion ELSE 0 END)) / 3,1) AS PS1," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 4 THEN c.calificacion ELSE 0 END),1) AS S4," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 5 THEN c.calificacion ELSE 0 END),1) AS S5," .
                      "ROUND(SUM(CASE c.idperiodo WHEN 6 THEN c.calificacion ELSE 0 END),1) AS S6," .
                      "ROUND((SUM(CASE c.idperiodo WHEN 4 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 5 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 6 THEN c.calificacion ELSE 0 END)) / 3,1) AS PS2," .
                      "ROUND((((SUM(CASE c.idperiodo WHEN 1 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 2 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 3 THEN c.calificacion ELSE 0 END)) / 3) + ((SUM(CASE c.idperiodo WHEN 4 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 5 THEN c.calificacion ELSE 0 END) + SUM(CASE c.idperiodo WHEN 6 THEN c.calificacion ELSE 0 END)) / 3)) / 2,1) AS PF " .
                "From calificaciones c " .
           "lEFT JOIN gradosalumnos gr On c.IdAlumno = gr.IdAlumno " .
           "lEFT JOIN alumnos a On c.IdAlumno = a.IdAlumno " .
           "LEFT JOIN materias m ON c.IdMateria = m.IdMateria " .
           "LEFT JOIN semestres s ON gr.idsemestre = s.idsemestre "  .
               "Where gr.IdAlumno = " . $IdAlumno . " " .
            "group by s.idsemestre, ". 
                    "concat(a.nombre,' ',a.apellidopat,' ',a.apellidomat),".
                     "m.Nombre, " .
                     "m.IdMateria " .
	        "order by m.Nombre ";
        
        $contador = 0;
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registro = array(
                    "materia" => $row['materia'],
                    "S1" => $row['S1'],
                    "S2" => $row['S2'],
                    "S3" => $row['S3'],
                    "PS1" => $row['PS1'],
                    "S4" => $row['S4'],
                    "S5" => $row['S5'],
                    "S6" => $row['S6'],
                    "PS2" => $row['PS2'],
                    "PF" => $row['PF'],
                    "nombre" => $row['nombreal']
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
