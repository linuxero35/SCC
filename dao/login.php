<?php
include '../conexiones/mysql_conexion.php';

$sql = "SELECT Usuario, Nombre, ApellidoPat, ApellidoMat, Correo, Activo, FechaAlta, IdUsuarioAlta, " .
    "FechaMod, IdUsuarioMod FROM Usuario";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Usuario: " . $row["Usuario"] . " - Nombre: " . $row["Nombre"] . " " . $row["ApellidoPat"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
