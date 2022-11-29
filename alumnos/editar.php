<?php
require_once '../services/grados/gradosService.php';

session_start();

if (isset($_SESSION["Alumno"])) {
  $alumno = $_SESSION["Alumno"];
}
$gradosSelect = getGradosSelecRequired($alumno["grado"]);
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
      document.getElementById("idGrado").value = value;
    
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
    function setSemestre(index) {
      var list = document.getElementById("idSemestre");
      var value = list.options[index].value;
      document.getElementById("semestre").value = value;
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
          <h1 style="color: white;">Editar Alumno</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/alumnos/alumnosInsertController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Datos Personales</h2>
              <input type="hidden" id="idAlumno" name="idAlumno" value="<?php echo $alumno['idAlumno']; ?>">
            </div>

            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nombre</label>
              <input type="text" maxlength="30" class="form-control" id="txtn" name="txtn" value="<?php echo $alumno['nombre']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apellido Paterno</label>
              <input type="text" maxlength="30" class="form-control" id="txtap" name="txtap" value="<?php echo $alumno['apePat']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Apellido Materno</label>
              <input type="text" maxlength="30" class="form-control" id="txtam" name="txtam" placeholder="" value="<?php echo $alumno['apeMat']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Correo Electrónico</label>
              <input type="email" maxlength="45" class="form-control" id="txtc" name="txtc" placeholder="" value="<?php echo $alumno['correo']; ?>" required>
            </div>
            <div class="col-md-6" style="padding-top: 10px;">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                  Activo
                </label>
                <input type="checkbox" class="form-check-input" <?php echo $alumno['activo'] == 0 ? "" : "checked"; ?> id="activo" name="activo[]">
              </div>
            </div>
          </div>
          <div class="container" style="padding: 1px;"></div>
          <div class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div>
              <h2>Datos Escolares</h2>
            </div>

            <div class="col-md-6">
              <label for="inputCity" class="form-label">Ciclo escolar</label>
              <input class="form-control" id="txtg" name="txtg" value="<?php echo $alumno['generacion']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Grado</label>
              <input type="hidden" id="idGrado" name="idGrado" value="<?php echo $alumno['grado']; ?>">
              <?php
              echo  $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
            <label for="inputAddress" class="form-label">Semestre</label><br>
            <input type="hidden" name="semestre" id="semestre" value="1">
            <select onchange="setSemestre(this.selectedIndex)" name="idSemestre" id="idSemestre" class="form-select">
            <option <?php echo $alumno['idsemestre'] == "1" ? "selected" : ""; ?> value="1">Primer semestre</option>
            <option <?php echo $alumno['idsemestre'] == "2" ? "selected" : ""; ?> value="2">Segundo semestre</option>
            <option <?php echo $alumno['idsemestre'] == "3" ? "selected" : ""; ?> value="3">Tercer semestre</option>
            <option <?php echo $alumno['idsemestre'] == "4" ? "selected" : ""; ?> value="4">Cuarto semestre</option>
            <option <?php echo $alumno['idsemestre'] == "5" ? "selected" : ""; ?> value="5">Quinto semestre</option>
            <option <?php echo $alumno['idsemestre'] == "6" ? "selected" : ""; ?> value="6">Sexto semestre</option>
            </select>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">No.Lista</label>
              <input type="number" class="form-control" id="txtno" name="txtno" value="<?php echo $alumno['noLista']; ?>" required>
            </div>


            <div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Sexo</label>
                <input type="hidden" id="filSexo" name="filSexo" value="<?php echo $alumno['sexo']  ?>">
                <select class="form-select" id="sexo" name="sexo" required onchange="setSexo(this.selectedIndex)">
                  <option <?php echo $alumno['sexo'] == "M" ? "selected" : ""; ?>>Masculino</option>
                  <option <?php echo $alumno['sexo'] == "F" ? "selected" : ""; ?>>Femenimo</option>
                </select>
              </div>
              <br>
              <div class="col-12" style="padding: 12px;">
                <table style="width: 100%;">
                  <tr>
                  <td align="right"><button type="submit" class="btn btn-primary">Guardar</button></td>
                    <td style="width: 10px;"></td>
                    <td align="left"><button type="submit" class="btn btn-danger">Cancelar</button></td>
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