<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/rubrica/consultaService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/grados/gradosService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/materias/materiasService.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/services/ciclo/cicloConsultaService.php");
//session_start();

if (isset($_SESSION["consultaRubrica"])) {
  $rubricas = $_SESSION["consultaRubrica"];
}

//print_r($rubrica);
$cicloSelect = consultaCiclosSelect(0, '');
$gradosSelect = getGradosSelect();
//$anioSelect = getAniosSelect();
$materiaSelect = consultaMateriasSelect(0);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Consulta Rubrica</title>
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
  
    function setGrado(index) {
      var list = document.getElementById("txtgr");
      var value = list.options[index].id;
      document.getElementById("idGrados").value = value;

    }

    function setAnio(index) {
      var list = document.getElementById("txtanio");
      var value = list.options[index].id;
      document.getElementById("filan").value = value;

    }
    function setCiclo(index) {
      var list = document.getElementById("txtCiclo");
      var value = list.options[index].id;
      document.getElementById("idciclo").value = value;
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
          <h1 style="color: white;">Rúbrica</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/rubrica/rubricaConsultarController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Filtro rúbrica</h2>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Ciclo escolar</label>
              <input type="hidden" maxlength="30" class="form-control" id="idciclo" name="idciclo">
              <?php
              echo $cicloSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Grados</label>
              <input type="hidden" name="idGrados" id="idGrados" value="">
              <?php
              echo $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
            <label for="inputAddress" class="form-label">Semestre</label><br>
            <input type="hidden" name="semestre" id="semestre" value="">
            <select onchange="setSemestre(this.selectedIndex)" name="idSemestre" id="idSemestre" class="form-select">
            <option value="">Todos</option>
            <option value="1">Primer semestre</option>
            <option value="2">Segundo semestre</option>
            <option value="3">Tercer semestre</option>
            <option value="4">Cuarto semestre</option>
            <option value="5">Quinto semestre</option>
            <option value="6">Sexto semestre</option>
            </select>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Materia</label>
              <input type="hidden" maxlength="30" class="form-control" id="idMateria" name="idMateria">
              <?php
              echo $materiaSelect;
              ?>
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
            
              <th style='text-align: center;' scope="col">IdRubrica</th>
              <th style='text-align: center;' scope="col">Ciclo escolar</th>
              <th style='text-align: center;' scope="col">Grado</th>
              <th style='text-align: center;' scope="col">Semestre</th>
              <th style='text-align: center;' scope="col">Materia</th>
              <th style='text-align: center;' scope="col">Criterio</th>
              <th style='text-align: center;' scope="col">Porcentaje</th>
              <th style='text-align: center;' scope="col">Acciones</th>

          </thead>
          <tbody>
            <?php
            if (isset($_SESSION["consultaRubrica"])) {
              foreach ($rubricas as $rubrica) {


                echo " <tr>
    <td style='text-align: center;' >" . $rubrica['idRubrica'] . "</td>
    <td style='text-align: center;' >" . $rubrica['ciclo'] . "</td>
    <td style='text-align: center;' >" . $rubrica['grado'] . "</td>
    <td style='text-align: center;' >" . $rubrica['semestre'] . "</td>
    <td style='text-align: center;' >" . $rubrica['materia'] . "</td>
    <td style='text-align: center;' >" . $rubrica['criterio'] . "</td>
    <td style='text-align: center;' >" . $rubrica['porcentaje'] . "</td>
    
    
    <td style='text-align: center;' > <a href='../controllers/rubrica/rubricaEditarController.php?IdRubrica=" . $rubrica['idRubrica'] . "'a><img src='../imagenes/editar.png'></a></td>
    
  </tr>";
              }

              unset($_SESSION["consultaRubrica"]);
            } else {
              if (isset($_SESSION["consultaRubricaMsg"])) {
                echo " <tr>
    <td colspan = '6' style='text-align: center;' >" . $_SESSION["consultaRubricaMsg"] . "</td>

  </tr>";
                unset($_SESSION["consultaRubricaMsg"]);
              }
            }

            ?>


          </tbody>
        </table>
      </div>


    </div>
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