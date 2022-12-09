<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/conexiones/mysql_conexion.php");

function buscarMateriaDAO($IdMateria)
{
    try {
        $conn = getConnection();

        $sql = "SELECT m.IdMateria, m.Nombre, m.Active FROM materias m WHERE m.IdMateria= " . $IdMateria;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $registro = array(
                    "idmateria" => $row['IdMateria'],
                    "Nombre" => $row['Nombre'],
                    "activo" => $row['Active']
                );
            }

            $_SESSION["materia"] = $registro;
        }
    } catch (Exception $e) {
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
function updateMateriaDAO($materia){
    try{
      $conn = getConnection();
      $sql="UPDATE materias SET Nombre='".$materia['nombre'] ."', Active=".$materia['activo'] ." WHERE IdMateria=".$materia['IdMateria'] ." ";
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