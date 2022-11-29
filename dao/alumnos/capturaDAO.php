<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');
session_start();
function loginDAO($IdUsuario, $Password)
{
    try {
        $conn = getConnection();
        $sql = "SELECT Usuario, Nombre, ApellidoPat, ApellidoMat, Correo, Activo, FechaAlta, IdUsuarioAlta, " .
            "FechaMod, IdUsuarioMod FROM Usuario WHERE Usuario = '" . $IdUsuario . "' AND Password= '" . $Password . "'";

        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        echo "Registrsos Encontrados:" . $count;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Usuario: " . $row["Usuario"] . " - Nombre: " . $row["Nombre"] . " " . $row["ApellidoPat"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        return $count > 0;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function insertarAlumnoDAO($alumno)
{
    try {
        $conn = getConnection();

        $sql = "INSERT INTO alumnos(Nombre, ApellidoPat, ApellidoMat, Generacion, Correo, Activo, IdUsuario, FechaAlta, IdUsuarioMod, FechaMod, Sexo) " .
            "VALUES ('" . $alumno["nombre"] . "' ,'" . $alumno["apePat"] . "','" . $alumno["apeMat"] . "','" . $alumno["cicloEsco"] . "','" . $alumno["correo"] . "',1,1,now(),NULL,NULL,'" . $alumno["sexo"] ."')";


        $result = $conn->query($sql);
        $idAlumno = $conn->insert_id;
        echo $sql;
        return $idAlumno;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
function updateAlumnoDAO($alumno){
  try{
    $conn = getConnection();
    $sql="UPDATE alumnos SET Nombre = '" . $alumno["nombre"] . "', ApellidoPat = '" . $alumno["apePat"] . "', ApellidoMat = '" . $alumno["apeMat"] . "', Generacion = '" . $alumno["cicloEsco"] . "', correo='" . $alumno["correo"] . "', Activo = " . $alumno["activo"] . ", IdUsuarioMod = 1, FechaMod = now(), Sexo = '" . $alumno["sexo"] ."' WHERE IdAlumno = " . $alumno["idAlumno"] . "";
    $result = $conn->query($sql);
    return $alumno["idAlumno"];
}  catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
} finally {
    $conn->close();
}

}

function insertarAlumnoGrados($alumno, $idAlumno)
{
    try {
        $conn = getConnection();

        $sql = "INSERT INTO gradosalumnos(IdGrado, IdAlumno, NoLista, Activo, IdUsuario, FechaAlta, IdUsuarioMod, FechaMod, idsemestre) " .
            "VALUES (" . $alumno["grado"] . "," . $idAlumno . "," . $alumno["numLista"] . ",1,1,now(),NULL,NULL, ".$alumno['idsemestre'] .")";

        echo $sql;

        $result = $conn->query($sql);
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
function updateAlumnoGrados($alumno, $idAlumno)
{
    try {
        $conn = getConnection();

        $sql = "UPDATE gradosalumnos SET IdGrado = " . $alumno["grado"] . ", NoLista =" . $alumno["numLista"] . ", Activo = 1, IdUsuarioMod = 1, FechaMod = now(),idsemestre = ".$alumno['idsemestre']." WHERE IdAlumno = " . $idAlumno . "";

        echo $sql;

        $result = $conn->query($sql);
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    } finally {
        $conn->close();
    }
}
function buscarAlumnoDAO($idAlumno)
{
    try {
        $conn = getConnection();

        $sql = "SELECT a.Nombre, a.ApellidoPat,a.IdAlumno, a.ApellidoMat, a.Activo, a.Generacion, a.Sexo, a.Correo,   g.IdGrado, g.NoLista, g.idsemestre " .
            "FROM alumnos a " .
            "LEFT JOIN gradosalumnos g ON a.IdAlumno = g.IdAlumno " .
            "WHERE a.IdAlumno = " . $idAlumno;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idAlumno" => $row['IdAlumno'],
                    "nombre" => $row['Nombre'],
                    "apePat" => $row['ApellidoPat'],
                    "apeMat" => $row['ApellidoMat'],
                    "grado" => $row['IdGrado'],
                    "activo" => $row['Activo'],
                    "noLista" => $row['NoLista'],
                    "generacion" => $row['Generacion'],
                    "correo" => $row['Correo'],
                    "sexo" => $row['Sexo'],
                    "idsemestre" => $row['idsemestre']
                   
                );
            }

            $_SESSION["Alumno"] = $registro;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
?>