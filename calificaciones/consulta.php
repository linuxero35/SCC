<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/materias/materiasService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/periodos/periodosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/grados/gradosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/alumnos/consultaService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/rubrica/capturaService.php");
$materiaSelect = consultaMateriasSelect(0);
$periodoSelect = getPeriodosSelec(0);
$gradosSelect = getGradosSelect(0);
$alumnosSelect = consultaAlumnoSelect(NULL, 0, '');

if (isset($_SESSION["listaCalificaciones"])){
  $calificaciones = $_SESSION["listaCalificaciones"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link href="../css/menu.css" rel="stylesheet">
  <link href="../menu/sidebars.css" rel="stylesheet">

  <script>
    function setValue(id) {
      document.getElementById("idGrado").value = id;
    }

    function setGrado(index) {
      var list = document.getElementById("txtgr");
      var value = list.options[index].id;
      document.getElementById("txtIdGrado").value = value;
      reload();
    }

    function setMateria(index) {
      var list = document.getElementById("txtIdMateria");
      var value = list.options[index].id;
      document.getElementById("txtMateria").value = value;
      
    }
    function setPeriodo(index) {
      var list = document.getElementById("txtpe");
      var value = list.options[index].id;
      document.getElementById("txtPeriodo").value = value;
     
    }

    function setAlumno(index) {
      var list = document.getElementById("txtalumno");
      var value = list.options[index].id;
      document.getElementById("txtIdAlumno").value = value;
    }

    function setSexo(value) {
      var sexo = '';
      if (value == '0') {
        sexo = 'M'
      } else if (value == '1') {
        sexo = 'F'
      }

      document.getElementById("filSexo").value = sexo;
    }
  </script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script>
    function reload() {
      var idGrado = document.getElementById("txtIdGrado").value;

      $.ajax({
        type: 'GET',
        url: '../controllers/alumnos/ajaxController.php',
        data: {
          idGrado: idGrado
        },
        success: function(data) {
          $("#containerAlumnos").html(data);
        }
      });
    }
  </script>

  <script>
    function tabla() {
      var idGrado = document.getElementById("txtIdGrado").value;
      var idPeriodo = document.getElementById("txtPeriodo").value;
      var idCalificacion = document.getElementById("").value;

      $.ajax({
        type: 'GET',
        url: '../controllers/rubrica/ajaxController.php',
        data: {
          idGrado: idGrado,
          idPeriodo: idPeriodo,
          idCalificacion: idCalificacion
        },
        success: function(data) {
          $("#containerTabla").html(data);
        }
      });
    }
  </script>
  
</head>

<body>
  <div style="display: flex;">
    <div>
      <?php include_once("../menu/menu2.php"); ?>
    </div>
    <div>
      <div class="container bg-primary" style="width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
        <center>
          <h1 style="color: white;">Consulta de Calificaciones</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/calificaciones/calificacionesConsultaController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Busqueda de Calificaciones</h2>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Grado</label>
              <input type="hidden" maxlength="45" class="form-control" id="txtIdGrado" name="txtIdGrado" placeholder="" required>
              <?php
              echo $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Periodo</label>
              <input type="hidden" maxlength="45" class="form-control" id="txtPeriodo" name="txtPeriodo" placeholder="" required>
              <?php
              echo $periodoSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Materia</label>
              <input type="hidden" maxlength="30" class="form-control" id="txtMateria" name="txtMateria" required>
              <?php
              echo $materiaSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Alumno</label>
              <input type="hidden" maxlength="45" class="form-control" id="txtIdAlumno" name="txtIdAlumno" placeholder="" required>
              <div id="containerAlumnos">
                <?php
                echo $alumnosSelect;
                ?>
              </div>
            </div>
          </div>
          <div class="container" style="padding: 1px;"></div>
          
          <div id="containerTabla"></div>

          <div class="container" style="padding: 1px;"></div>

          <div class="col-12" style="padding: 12px;">
            <table style="width: 100%;">
              <tr>
                <td align="right"><button type="submit" class="btn btn-danger">Cancelar</button></td>
                <td style="width: 10px;"></td>
                <td align="left"><button type="submit" class="btn btn-primary">Buscar</button></td>
              </tr>
            </table>
          </div>
        </form>
        <br>
        <table class="table">
  <thead class="table-secondary">
    <tr>
      <th style='text-align: center;' scope="col">Grado</th>
      <th scope="col">Periodo</th>
      <th style='text-align: center;' scope="col">Materia</th>
      <th style='text-align: center;' scope="col">Nombre del alumno</th>
      <th style='text-align: center;' scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
        <?php
  if (isset($_SESSION["listaCalificaciones"]))
  {
  foreach($calificaciones as $calificaion){
    
    echo " <tr>
    <th scope='row' style='text-align: center;'>".$calificaion['Grado']."</th>
    <td >".$calificaion['Periodo']."</td>
    <td style='text-align: center;' >".$calificaion['Materia']."</td>
    <td style='text-align: center;' >".$calificaion['Nombre']."</td>
    <td style='text-align: center;'><a href='../controllers/calificaciones/calificacionesEdicionController.php?idCalificacion=".$calificaion['IdCalificacion']."'><img style='cursor:pointer;' src='../imagenes/editar.png' alt='editar'></a> </td>
    
  </tr>";
   
  }
  unset($_SESSION["listaCalificaciones"]);
}
  ?>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>

</html>