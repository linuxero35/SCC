<?php
include_once "../services/grados/gradosService.php";
$gradosSelect = getGradosSelec();
session_start();
if (isset($_SESSION["listaAlumnos"])) {
  $alumnos = $_SESSION["listaAlumnos"];
}
//print_r($alumnos);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Lista de alumnos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link href="../css/menu.css" rel="stylesheet">
  <link href="../menu/sidebars.css" rel="stylesheet">
  <style>
    .alertmessage {
      width: 100%;
      display: flex;
      position: absolute;

    }
  </style>
  <script>
    function setSexo(value) {
      var sexo = '';
      if (value == '0') {
        sexo = ''
      } else if (value == '1') {
        sexo = 'M'
      } else if (value == '2') {
        sexo = 'F'
      }

      document.getElementById("filSexo").value = sexo;
    }

    function setValue(value) {

      if (value == "0") {
        value = 0
      } else if (value == "1") {
        value = 1
      } else if (value == "2") {
        value = 2
      } else if (value == "3") {
        value = 3
      }

      document.getElementById("filGrado").value = value;
    }

    function setActivo(value) {

      if (value == "0") {
        value = -1
      } else if (value == "1") {
        value = 1
      } else if (value == "2") {
        value = 0
      }

      document.getElementById("filActivo").value = value;
    }
  </script>
</head>

<body>
  <div style="display: flex; width: 100%;">
    <div>
      <?php include_once("../menu/menu2.php"); ?>
    </div>
    <div>
      <center>
        <?php include_once("../alerts/alert.php"); ?>
      </center>
    </div>
    <div style="width: 100%;">
      <div class="container" style="background-color:#007b00; width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
        <center>
          <h1 style="color: white;">Alumnos</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/alumnos/alumnosConsultaController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Filtro Alumnos</h2>
            </div>

            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nombre</label>
              <input type="text" maxlength="30" class="form-control" id="filn" name="filn">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apellido Paterno</label>
              <input type="text" maxlength="30" class="form-control" id="filap" name="filap">
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Apellido Materno</label>
              <input type="text" maxlength="30" class="form-control" id="filam" name="filam" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Grado</label>
              <input type="hidden" id="filGrado" name="filGrado" value="0">
              <?php
              echo  $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Estado</label>
              <input type="hidden" id="filActivo" name="filActivo" value="-1">
              <select class="form-select" id="activo" name="activo" onchange="setActivo(this.selectedIndex)">
                <option value="0">Todos</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="inputState" class="form-label">Sexo</label>
              <input type="hidden" id="filSexo" name="filSexo" value="">
              <select class="form-select" id="sexo" name="sexo" onchange="setSexo(this.selectedIndex)">
                <option value="0">Todos</option>
                <option value="1">Masculino</option>
                <option value="2">Femenimo</option>
              </select>
            </div>
            <div class="col-md-12">
              <center>
                <button type="submit" style="width: 150px;margin-top:33px;" class="btn btn-danger active" aria-pressed="true">Buscar</button>
              </center>
            </div>

        </form>
        <br><br>
        <table class="table">
          <thead class="table-secondary">
            <tr>
              <th style='text-align: center;' scope="col">No.Lista</th>
              <th scope="col">Nombre del alumno</th>
              <th style='text-align: center;' scope="col">Sexo</th>
              <th style='text-align: center;' scope="col">Grado</th>
              <th style='text-align: center;' scope="col">Estado</th>
              <th style='text-align: center;' scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION["listaAlumnos"])) {
              foreach ($alumnos as $alumno) {
                $sexo = $alumno['sexo'];
                $imagen = "../imagenes/editar-hombre.png";
                if ($sexo == 'F') {
                  $imagen = "../imagenes/editar-mujer.png";
                }
                echo " <tr>
    <th scope='row' style='text-align: center;'>" . $alumno['noLista'] . "</th>
    <td >" . $alumno['nombre'] . " " . $alumno['apePat'] . " " . $alumno['apeMat'] . "</td>
    <td style='text-align: center;' >" . $alumno['sexo'] . "</td>
    <td style='text-align: center;' >" . $alumno['grado'] . "</td>
    <td style='text-align: center;' >" . $alumno['activo'] . "</td>
    <td style='text-align: center;'><a href='../controllers/alumnos/alumnosEditarController.php?IdAlumno=" . $alumno['idAlumno'] . "'><img style='cursor:pointer;' src='" . $imagen . "' alt='editar'></a> </td>
    
  </tr>";
              }
              unset($_SESSION["listaAlumnos"]);
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between py-3 my-4 border-top" style="box-shadow: rgb(136 165 191 / 48%) 6px 2px 16px 0px, rgb(255 255 255 / 80%) -6px -2px 16px 0px; border-radius: 5px; padding: 10px; margin-left: 76px; margin-right: 90px;">

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
        <span class="text-muted">Correo electrónico: 19tbtejupilcodehidalgo@ gmail.com</span>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>


</html>