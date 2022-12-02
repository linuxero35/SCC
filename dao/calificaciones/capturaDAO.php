<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');

function capturaCalificacionesDAO($calificacion)
{
    try {
        $idGradoAlumno = consultaIdGradoAlumno($calificacion['IdAlumno']);
        $conn = getConnection();

        $sql = "INSERT INTO Calificaciones(calificacion, IdMateria, IdAlumno, IdPeriodo, IdGradoAlumno, Activo, IdUsuario, FechaAlta, IdUsuarioMod, FechaMod, idciclo, idsemestre) " .
        "VALUES(" 
        . $calificacion['calificacion']  . ", " 
        . $calificacion['IdMateria'] . ", " 
        . $calificacion['IdAlumno'] . ", " 
        . $calificacion['IdPeriodo'] . ", " 
        . $idGradoAlumno . ", " 
        . $calificacion['Activo'] 
        . ", " 
        . $calificacion['IdUsuario'] 
        . ", now(), null, null, ".$calificacion['idciclo'].", ".$calificacion['idsemestre'].")";

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

function updateCalificacionesDAO($calificacion)
{
    try {
        $idGradoAlumno = consultaIdGradoAlumno($calificacion['IdAlumno']);
        $conn = getConnection();

        $sql = "UPDATE calificaciones SET Calificacion= '".$calificacion['calificacion']."',IdMateria= ".$calificacion['IdMateria'].",IdAlumno= ".$calificacion['IdAlumno'].",IdPeriodo=".$calificacion['IdPeriodo'].",IdGradoAlumno=".$idGradoAlumno.",Activo=".$calificacion['Activo'].",IdUsuario=".$calificacion['IdUsuario'].",FechaAlta=now(),IdUsuarioMod=NULL,FechaMod=NULL,anio='',idciclo=".$calificacion['idciclo']." WHERE IdCalificacion= ".$calificacion['IdCalificacion']." ";

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

            echo $sql;
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

        $sql = "insert into calificacionescriterio(IdCalificacion,IdCriterio, calificacion, IdUsuarioAlta, FechaAlta, IdUsuarioMod, FechaMod, calificacionf) " .
        "values(".
        $calificacioncriterio['IdCalificacion'] .",".
        $calificacioncriterio['IdCriterio'] .",".
        $calificacioncriterio['calificacion'] .",".
        $calificacioncriterio['IdUsuarioAlta'] .",".
        "now(), null, null," . $calificacioncriterio['calificacionf'] . ")";
       
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

function updateCalificacionesCriterioDAO($calificacioncriterio)
{
    try {
        $conn = getConnection();

        $sql = "update calificacionescriterio set calificacion=" . $calificacioncriterio['calificacion']  . " where idcalificacioncriterio=" . $calificacioncriterio['IdCalificacionCriterio'];
       
        echo $sql;
        $result = $conn->query($sql);

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
?>