<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');

function capturaCalificacionesDAO($calificacion)
{
    try {
        $conn = getConnection();

        $sql = "INSERT INTO Calificaciones(calificacion, IdMateria, IdAlumno, IdPeriodo, IdGradoAlumno, Activo, IdUsuario, FechaAlta, IdUsuarioMod, FechaMod, anio) " +
        "VALUES(" + $calificacion['calificacion']  + ", " + $calificacion['IdMateria'] + ", " + $calificacion['IdAlumno'] + ", " + $calificacion['IdPeriodo'] + ", " + $calificacion['IdGradoAlumno'] + ", " + $calificacion['Activo'] + ", " + $calificacion['IdUsuario'] + ", now(), null, null, " + $calificacion['anio'] + ");";

        $result = $conn->query($sql);

        $count = mysqli_num_rows($result);

        echo "Registros insertados:" . $count;

        return $count > 0;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
?>