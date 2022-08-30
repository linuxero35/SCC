<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');

function capturaCalificacionesDAO($calificacion)
{
    try {
        $idGradoAlumno = consultaIdGradoAlumno($calificacion['IdAlumno']);
        $conn = getConnection();

        $sql = "INSERT INTO Calificaciones(calificacion, IdMateria, IdAlumno, IdPeriodo, IdGradoAlumno, Activo, IdUsuario, FechaAlta, IdUsuarioMod, FechaMod) " .
        "VALUES(" 
        . $calificacion['calificacion']  . ", " 
        . $calificacion['IdMateria'] . ", " 
        . $calificacion['IdAlumno'] . ", " 
        . $calificacion['IdPeriodo'] . ", " 
        . $idGradoAlumno . ", " 
        . $calificacion['Activo'] 
        . ", " 
        . $calificacion['IdUsuario'] 
        . ", now(), null, null)";

        echo $calificacion['IdAlumno'];
        echo $sql;
        $result = $conn->query($sql);

       // $count = mysqli_num_rows($result);

       // echo "Registros insertados:" . $count;

        //return $count > 0;
        return  $conn->insert_id;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}

function consultaIdGradoAlumno($idAlumno)
{
    try {
        $conn = getConnection();
        $sql = "SELECT g.IdGradoAlumno FROM  gradosalumnos g WHERE g.IdAlumno = " . $idAlumno .
            " ORDER BY g.FechaAlta DESC " .
            " LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row["IdGradoAlumno"];
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function capturaCalificacionesCriterioDAO($calificacioncriterio)
{
    try {
        $conn = getConnection();

        $sql = "insert into calificacionescriterio(IdCalificacion,IdCriterio, calificacion, IdUsuarioAlta, FechaAlta, IdUsuarioMod, FechaMod) " .
        "values(".
        $calificacioncriterio['IdCalificacion'] .",".
        $calificacioncriterio['IdCriterio'] .",".
        $calificacioncriterio['calificacion'] .",".
        $calificacioncriterio['IdUsuarioAlta'] .",".
        "now(), null, null)";
       
        echo $sql;
        $result = $conn->query($sql);

       // $count = mysqli_num_rows($result);

       // echo "Registros insertados:" . $count;

        //return $count > 0;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
?>