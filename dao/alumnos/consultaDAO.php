<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/SCC/conexiones/mysql_conexion.php');
session_start();

function consultaAlumnosDAO($filtro){
    try{
        $conn = getConnection();
        $filSexo = '';
        $filNombre = '';
        $filApePat = '';
        $filApeMat = '';
        $filGrado = '';
        $filActivo = '';
        $filSemestre = '';

        if ($filtro['nombre'] != '') {
            $filNombre = "AND a.Nombre LIKE  '%".$filtro['nombre']."%' ";
        }

        if ($filtro['apePat'] != '') {
            $filApePat = "AND a.ApellidoPat LIKE '%".$filtro['apePat']."%' ";
        }

        if ($filtro['apeMat'] != '') {
            $filApeMat  = "AND a.ApellidoMat LIKE '%".$filtro['apeMat']."%' ";
        }

        if ($filtro['grado'] != 0) {
            $filGrado = "AND gr.IdGrado = ".$filtro['grado']." ";
        }

        if ($filtro['activo'] != -1) {
            $filActivo = "AND a.Activo = ".$filtro['activo']." ";
        }
        if ($filtro['sexo'] != '') {
           $filSexo = "AND a.Sexo ='".$filtro['sexo']."' "; 
        }
      

        $sql = "SELECT a.Nombre,".
                      "a.ApellidoPat," .
                      "a.IdAlumno," .
                      "a.ApellidoMat, " .
                      "gr.Grado," .
                      "g.NoLista," .
                      "a.Sexo," .
                      "s.semestre," .
                      "CASE WHEN a.Activo = 1 THEN 'Activo' WHEN a.Activo = 0 THEN 'Baja' END AS Activo " .
                 "FROM alumnos a " .
            "LEFT JOIN gradosalumnos g ON a.IdAlumno = g.IdAlumno " .
            "LEFT JOIN grados gr ON g.IdGrado = gr.IdGrado " .
            "LEFT JOIN semestres s ON g.idsemestre = s.idsemestre " .
                "WHERE g.Activo IN (1,0) " .
                       $filNombre .
                       $filApePat .
                       $filApeMat .
                       $filGrado .
                       $filActivo .
                       $filSexo .
            "ORDER BY g.NoLista ";
            $contador = 0;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    //echo "Alumno: " . $row["Nombre"] . " - Apellido: " . $row["ApellidoPat"] . " " . $row["ApellidoMat"] . " ". $row["Activo"]." " . $row["Grado"]. " ".$row['Sexo']. "<br>";
                    $registro = array(
                        "nombre" => $row['Nombre'],
                        "apePat" => $row['ApellidoPat'],
                        "apeMat" => $row['ApellidoMat'],
                        "grado" => $row['Grado'],
                        "activo" => $row['Activo'],
                        "noLista" => $row['NoLista'],
                        "idAlumno" => $row['IdAlumno'],
                        "sexo" => $row['Sexo'],
                        "semestre" => $row['semestre']
                    );    

                    $registros[$contador++] = $registro;
                    
                }
                $_SESSION["listaAlumnos"]=$registros;
            } else {
                echo "0 results";
            }

            echo $sql;
    }catch(Exception $e){
        echo $e -> getMessage();
    }
}
function consultaAlumnoDAO($filtro){
    try {
        $conexion = getConnection();
 
        $sql = "SELECT a.IdAlumno, CONCAT(g.NoLista,' ',a.Nombre,' ',a.ApellidoPat,' ',a.ApellidoMat) AS Alumno FROM  alumnos a ".
        "LEFT JOIN gradosalumnos g ON a.IdAlumno = g.IdAlumno ".
        "WHERE g.IdGrado = ".$filtro['idGrado']. " ".
        "ORDER BY g.NoLista ASC";
        
        $result = $conexion -> query($sql);
        
        $contador=0;
        
        if ($result != null && $result -> num_rows > 0) {
         while ($registro = $result -> fetch_assoc()) {
             $valores[0][0]=$registro['IdAlumno'];
             $valores[0][1]=$registro['Alumno'];
             $registros[$contador] = $valores;
             $contador=$contador+1;
         }
        }
        if(isset($registros)){
            return $registros;
        } else {
            return null;
        }   
        
    } catch(Exception $e){
     echo 'Excepción capturada: ',  $e -> getMessage(), "\n";
    }
 }
?>