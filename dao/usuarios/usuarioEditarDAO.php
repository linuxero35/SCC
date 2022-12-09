<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function buscarUsuarioDAO($idusuario)

{
    try {
        $conn = getConnection();

        $sql = "select u.idusuario, u.usuario, u.nombre, u.apellidoPat, u.apellidoMat, u.password AS contrasena, u.activo from usuario u where u.idusuario = " . $idusuario;

        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idusuario" => $row['idusuario'],
                    "usuario" => $row['usuario'],
                    "activo" => $row['activo'],
                    "nombre" => $row['nombre'],
                    "apellidopat" => $row['apellidoPat'],
                    "apellidomat" => $row['apellidoMat'],
                    "contrasena" => $row['contrasena']
                );
            }

            $_SESSION["usuario"] = $registro;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
function updateUsuariosDAO($usuario){
    try{
      $conn = getConnection();
      $sql=" update usuario set nombre = '".$usuario['nombre']."', apellidoPat = '".$usuario['apellidoPat']."', apellidoMat = '".$usuario['apellidoMat']."', activo = ".$usuario['activo']." where idusuario =".$usuario['idUsuario']." ";
      $result = $conn->query($sql);
      echo $sql;
     // return $criterio["idAlumno"];
  }  catch (Exception $e) {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
  } finally {
      $conn->close();
  }
  
  }
?>