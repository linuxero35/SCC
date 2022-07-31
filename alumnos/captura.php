<?php
require_once '../services/grados/gradosService.php';
$gradosSelect = getGradosSelecRequired();
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
    function setSexo(value) {
      var sexo = '';
      if (value=='0'){
        sexo = 'M'
      }
      else if (value == '1'){
        sexo = 'F'
      }
      
      document.getElementById("filSexo").value = sexo;
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
          <h1 style="color: white;">Captura del Alumno</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/alumnos/alumnosInsertController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Datos Personales</h2>
            </div>

            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nombre</label>
              <input type="text" maxlength="30" class="form-control" id="txtn" name="txtn" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apellido Paterno</label>
              <input type="text" maxlength="30" class="form-control" id="txtap" name="txtap" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Apellido Materno</label>
              <input type="text" maxlength="30" class="form-control" id="txtam" name="txtam" placeholder="" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Correo Electrónico</label>
              <input type="email" maxlength="45" class="form-control" id="txtc" name="txtc" placeholder="" required>
            </div>
            <div class="col-md-6" style="padding-top: 10px;">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                  Activo
                </label>
                <input type="checkbox" class="form-check-input" checked="true" id="activo" name="activo[]" required>
              </div>
            </div>
          </div>
          <div class="container" style="padding: 1px;"></div>
          <div class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div>
              <h2>Datos Escolares</h2>
            </div>

            <div class="col-md-6">
              <label for="inputCity" class="form-label">Generación</label>
              <input type="number" class="form-control" id="txtg" name="txtg" required>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Grado</label>
              <input type="hidden" id="idGrado" name="idGrado" value="1">
              <?php
              echo  $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputZip" class="form-label">Año</label>
              <input type="number" class="form-control" id="txtan" name="txtan" required>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">No.Lista</label>
              <input type="number" class="form-control" id="txtno" name="txtno" required>
            </div>
          
         
          <div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Sexo</label>
              <input type="hidden" id="filSexo" name="filSexo" value="M">
              <select class="form-select" id="sexo" name="sexo" required onchange="setSexo(this.selectedIndex)">
              <option>Masculino</option>
              <option >Femenimo</option>
              </select>
            </div>
          <div class="col-12" style="padding: 12px;">
            <center>
              <div style="display: flex;" class="center">
                <div class="center2">
                  <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
                <div class="center3">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </center>
          </div>
        </form>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>
</html>