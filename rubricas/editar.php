<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/periodos/periodosService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/criterios/criteriosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/materias/materiasService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/grados/gradosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/ciclo/cicloConsultaService.php");
session_start();

if (isset($_SESSION["rubrica"])) {
  $rubrica = $_SESSION["rubrica"];
}
$periodosSelect = getPeriodosSelec($rubrica['idPeriodo']);
$criteriosSelect = getCriterioSelec($rubrica['idCriterio']);
$gradosSelect = getGradosSelecRequired($rubrica['idGrado']);
$materiaSelect = consultaMateriasSelect($rubrica['idmateria']);
$cicloSelect = consultaCiclosSelect($rubrica['idciclo'], '');

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
    function setValue(index) {
      var list = document.getElementById("txtpe");
      var value = list.options[index].id;
      document.getElementById("idPeriodo").value = value;
    }
    function setCriterio(index){
      var list = document.getElementById("txtcr");
      var value = list.options[index].id;
      document.getElementById("idCriterio").value = value;
    }
    function setGrado(index){
      var list = document.getElementById("txtgr");
      var value = list.options[index].id;
      
      document.getElementById("idGrado").value = value;
    }
    function setMateria(index) {
      var list = document.getElementById("txtIdMateria");
      var value = list.options[index].id;
      document.getElementById("idMateria").value = value;
      
    }
    function setSemestre(index) {
      var list = document.getElementById("idSemestre");
      var value = list.options[index].value;
      document.getElementById("semestre").value = value;
    }
    function setCiclo(index) {
      var list = document.getElementById("txtCiclo");
      var value = list.options[index].id;
      document.getElementById("idciclo").value = value;
      alert(document.getElementById("idciclo").value)
    }
    
  </script>
</head>

<body>
  <div style="display: flex;">
    <div>
      <?php include_once("../menu/menu2.php"); ?>
    </div>
    <div>
      <div class="container" style="background-color:#007b00; width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
        <center>
          <h1 style="color: white;">Editar Rúbrica</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/rubrica/rubricaInsertController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">
            
            <input type="hidden" value="<?php echo $rubrica['idRubrica'] ?>" name="idRubrica" id="idRubrica">
            <div class="container">
              <h2>Rúbrica</h2>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Ciclo escolar</label>
              <input type="hidden" maxlength="30" class="form-control" id="idciclo" name="idciclo" value="<?php echo $rubrica['idciclo'] ?>">
              <?php
              echo $cicloSelect;
              ?>
            </div>
            <div class="col-md-6" >
          <label for="inputAddress" class="form-label">Grados</label>
              <input type="hidden" name="idGrado" id="idGrado" value="<?php echo $rubrica['idGrado'] ?>">
              <?php
              echo $gradosSelect;
              ?>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Semestre</label><br>
            <input type="hidden" name="semestre" id="semestre" value="<?php echo $rubrica['semestre'] ?>">
            <select onchange="setSemestre(this.selectedIndex)" name="idSemestre" id="idSemestre" class="form-select">
            <option <?php echo  ($rubrica['semestre'] == '1' ? 'selected' : '') ?> value="1">Primer semestre</option>
            <option <?php echo  ($rubrica['semestre'] == '2' ? 'selected' : '') ?> value="2">Segundo semestre</option>
            <option <?php echo  ($rubrica['semestre'] == '3' ? 'selected' : '') ?> value="3">Tercer semestre</option>
            <option <?php echo  ($rubrica['semestre'] == '4' ? 'selected' : '') ?> value="4">Cuarto semestre</option>
            <option <?php echo  ($rubrica['semestre'] == '5' ? 'selected' : '') ?> value="5">Quinto semestre</option>
            <option <?php echo  ($rubrica['semestre'] == '6' ? 'selected' : '') ?> value="6">Sexto semestre</option>
            </select>
            </div>
            <div class="col-md-6">
            <label for="inputAddress" class="form-label">Materia</label>
              <input type="hidden" name="idMateria" id="idMateria" value="<?php echo $rubrica['idmateria'] ?>">
              <?php
              echo $materiaSelect;
              ?>
            </div>
           
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Criterio</label>
              <input type="hidden" name="idCriterio" id="idCriterio" value="<?php echo $rubrica['idCriterio'] ?>">
              <?php
              echo $criteriosSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Porcentaje</label>
              <input type="number" maxlength="30" class="form-control" value="<?php echo $rubrica['porcentaje'] ?>" id="txtap" name="txtap" required>
            </div>
              
        <table width="100%">
        <tr>
        <td width="49%" align="right"><button style="width: 120px;" type="submit" class="btn btn-primary">Guardar</button></td>
        <td width="2%"></td>
        <td width="49%" align="left"><button style="width: 120px;" type="submit" class="btn btn-danger">Cancelar</button></td>
        </tr>
        </table>
          
          </div>
        </form>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>
</html>
