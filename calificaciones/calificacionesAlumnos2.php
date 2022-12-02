<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/materias/materiasService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/periodos/periodosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/grados/gradosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/alumnos/consultaService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/rubrica/capturaService.php");
$materiaSelect = consultaMateriasSelect(0);
$periodoSelect = getPeriodosSelec(0);
$gradosSelect = getGradosSelect(0);
$alumnosSelect = consultaAlumnoSelect(NULL, 0, 'required');
if (isset($_SESSION["listaTablaCalificaciones"])) {
  $registros =  $_SESSION["listaTablaCalificaciones"];
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
      tabla();
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

      $.ajax({
        type: 'GET',
        url: '../controllers/rubrica/ajaxController.php',
        data: {
          idGrado: idGrado,
          idPeriodo: idPeriodo
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
      
    </div>
        <div>
      <div class="container" style="background-color:#007b00; width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
        <center>
          <h1 style="color: white;">Telebachillerato Comunitario N° 203 de Tejupilco</h1>
        </center>
      </div>
      <div>
      <br>
      <center>
      <?php
      $PB1=0;
      $PB2=0;
      $PB3=0;
      $PS1=0;
      $PB4=0;
      $PB5=0;
      $PB6=0;
      $PS2=0;
      $PF=0;
      $cont=0;
      if (isset($_SESSION["listaTablaCalificaciones"])) {
      echo '<span style="font-weight: bold;">'.$registros[0]['nombre'] .'</span>';
      } else {
        echo '<span style="font-weight: bold;">Sin Datos</span>';
      }
      ?>
      </center>
      <br>
      <center>
      <table style="border: 2px solid white; ">
      <thead>
      <tr>
      <th rowspan ="3" style="background-color:#5B9BD5; color:white; font-weight: normal; border-top: 2px solid gray; border-bottom: 2px solid gray; border-left: 2px solid gray; padding:10px;">Materia</th>
      <th style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: normal; text-align: center; border-top: 2px solid gray; padding:10px; font-weight: bold; font-size: 17px;" colspan="8" >Evaluaciones del Ciclo Escolar 2021 - 2022</th>
      <th rowspan ="3" style="background-color:#1F4E78; color:white; font-weight: normal; border-top: 2px solid black; border-bottom: 2px solid black; border-right: 2px solid black; padding:10px; font-weight: bold;">Promedio Final</th>
      </tr>
      <tr>
      <th style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: normal; padding-left:5px; padding-right:5px;" colspan="3">I SEMESTRE</th>
      <th style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: normal; border-bottom: 2px solid gray; padding-left:10px; padding-right:10px;" rowspan="2" >Promedio Semestral</th>
      <th style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: normal; padding-left:5px; padding-right:5px;" colspan="3">II SEMESTRE</th>
      <th style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: normal; border-bottom: 2px solid gray; padding-left:10px; padding-right:10px;" rowspan="2" >Promedio Semestral</th>
      </tr>
      <tr>
      <th style="border: 2px solid white; background-color:#DDEBF7; font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">1°</th>
      <th style="border: 2px solid white; background-color:#DDEBF7; font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">2°</th>
      <th style="border: 1px solid white; background-color:#DDEBF7; font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">3°</th>
      <th style="border: 1px solid white; background-color:#DDEBF7; font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">4°</th>
      <th style="border: 1px solid white; background-color:#DDEBF7; font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">5°</th>
      <th style="border: 1px solid white; background-color:rgba(221, 235, 247); font-weight: normal; border-bottom: 2px solid gray; padding:4px; text-align: center; font-weight: bold;">6°</th>
      </tr>
      </thead>
      <tbody>
      <?php

      
            if (isset($_SESSION["listaTablaCalificaciones"])) {
              $cont=0;
              foreach ($registros as $registro) {
                $PB1+=$registro['S1'];
                $PB2+=$registro['S2'];
                $PB3+=$registro['S3'];
                $PS1+=$registro['PS1'];
                $PB4+=$registro['S4'];
                $PB5+=$registro['S5'];
                $PB6+=$registro['S6'];
                $PS2+=$registro['PS2'];
                $PF+=$registro['PF'];

                echo " <tr style='".($cont % 2 == 0 ? 'background-color: #f2f2f2;' : '') . "'>
                <td align='center'>" .$registro['materia'] ."</td>
                <td align='center'>" .$registro['S1'] ."</td>
                <td align='center'>" .$registro['S2'] ."</td>
                <td align='center'>" .$registro['S3'] ."</td>
                <td align='center'>" .$registro['PS1'] ."</td>
                <td align='center'>" .$registro['S4'] ."</td>
                <td align='center'>" .$registro['S5'] ."</td>
                <td align='center'>" .$registro['S6'] ."</td>
                <td align='center'>" .$registro['PS2'] ."</td>
                <td align='center'>" .$registro['PF'] ."</td>
    
  </tr>";
  $cont=$cont+1;
              }
              unset($_SESSION["listaTablaCalificaciones"]);
            }
            ?>
      </tbody>
      <tfoot>
    <tr>
      <td align='center' style="background-color:#5B9BD5; color:white; font-weight: bold; border-top: 2px solid gray; border-bottom: 2px solid gray; border-left: 2px solid gray; padding:1px;">Promedio</td>
      <td align='center' style="border-bottom: 2px solid gray; border-top: 2px solid gray;font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' : $PB1 / $cont); ?></td>
      <td align='center' style="border-bottom: 2px solid gray; border-top: 2px solid gray;font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' :$PB2 / $cont); ?></td>
      <td align='center' style="border-bottom: 2px solid gray; border-top: 2px solid gray;font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' :$PB3 / $cont); ?></td>
      <td align='center' style="border: 2px solid white; background-color:#5B9BD5; color:white; font-weight: bold; border-bottom: 2px solid gray; padding-left:10px; padding-right:10px;"><?php echo ($cont == 0 ? '' :$PS1 / $cont); ?></td>
      <td align='center'  style="border-bottom: 2px solid gray; border-top: 2px solid gray;font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' :$PB4 / $cont); ?></td>
      <td align='center' style="border-bottom: 2px solid gray; border-top: 2px solid gray; font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' :$PB5 / $cont); ?></td>
      <td align='center' style="border-bottom: 2px solid gray; border-top: 2px solid gray; font-weight: bold; border-left: 1px solid gray;border-right: 1px solid gray;"><?php echo ($cont == 0 ? '' :$PB6 / $cont); ?></td>
      <td align='center' style="border: 2px solid white; background-color:#5B9BD5; font-weight: bold; color:white; font-weight: bold; border-bottom: 2px solid gray; padding-left:10px; padding-right:10px;"><?php echo ($cont == 0 ? '' :$PS2 / $cont); ?></td>
      <td align='center' style="background-color:#1F4E78; color:white; font-weight: bold; border-top: 2px solid black; border-bottom: 2px solid black; border-right: 2px solid black; padding:1px; font-weight: bold;"><?php echo ($cont == 0 ? '' :$PF / $cont); ?></td>
    </tr>
  </tfoot>
      </table>
      </center>
      </div>
      <br>
      <br>
      <form method="get" action="../controllers/calificaciones/tablacalificacionesController.php">
      
            
            <div class="col-12" style="padding: 12px;">
            <table style="width: 100%;">
              <tr>
                <td align="right"><div class="col-md-4" style="padding-right: 10px;">
              
              <input type="text" maxlength="45" class="form-control" id="IdAlumno" name="IdAlumno" placeholder="Id del Alumno" required>
              
            </div></td>
                
                <td align="left"><button type="submit" class="btn btn-primary">Buscar</button></td>
                <td style="width: 35%;"></td>
              </tr>
            </table>
          </div>
      </form>
      
      <footer class="d-flex flex-wrap justify-content-between py-3 my-4 border-top" style="box-shadow: rgb(136 165 191 / 48%) 6px 2px 16px 0px, rgb(255 255 255 / 80%) -6px -2px 16px 0px; border-radius: 5px; padding: 10px; margin-right: 90px; margin-left: 76px;">

        <div class="col-md-10
       d-flex">

        </div>

        <div class="col-md-10 d-flex">
          <span class="text-muted">Telebachillerato Comunitario N° 203 de Tejupilco</span>
        </div>

        <div class="col-md-10 d-flex">
          <span class="text-muted">Domicilio conocido, S/N, Col.Calvario, CP.51400.</span>
        </div>

        <div class="col-md-10 d-flex">
          <span class="text-muted">Teléfono: 7223965089</span>
        </div>

        <div class="col-md-8 d-flex">
          <span class="text-muted">Correo electrónico: 19tbtejupilcodehidalgo@gmail.com</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter" />
              </svg></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram" />
              </svg></a></li>
          <li class="ms-3"><a class="text-muted" href="www.google.com"><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook" />
              </svg></a></li>
        </ul>
      </footer>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>

</html>