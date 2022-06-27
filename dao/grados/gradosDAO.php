<?php
include '../conexiones/mysql_conexion.php';

function consultaGrados($IdUsuario, $Password){
    try{
        $conn=getConnection();
    $sql = "SELECT g.IdGrado, g.Grado FROM grados g WHERE g.Activo = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row ['']
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
    


?>
