<?php
include '../conexiones/mysql_conexion.php';

function loginDAO($IdUsuario, $Password){
    try{
        $conn=getConnection();
    $sql = "SELECT Usuario, Nombre, ApellidoPat, ApellidoMat, Correo, Activo, FechaAlta, IdUsuarioAlta, " .
    "FechaMod, IdUsuarioMod FROM Usuario WHERE Usuario = '" . $IdUsuario . "' AND Password= '" . $Password ."'";

$result = $conn->query($sql);
$count = mysqli_num_rows($result);
echo "Registrsos Encontrados:". $count;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Usuario: " . $row["Usuario"] . " - Nombre: " . $row["Nombre"] . " " . $row["ApellidoPat"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
return $count >0;
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";

}
}
    
function loginAlumnoDAO($IdUsuario, $Password)
{
    try {
        $alumno = array(
            "login"=>false,
            "idalumno" => 0
        );

        $conn = getConnection();
        $sql = "SELECT idalumno FROM alumnos WHERE correo = '" . $IdUsuario . "' AND Password= '" . $Password . "'";
        echo $sql;
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        echo "Registrsos Encontrados:" . $count;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alumno["login"]=true;
                $alumno["idalumno"]=$row['idalumno'];
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        return $alumno;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}


?>
