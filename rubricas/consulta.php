<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/consultaService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/grados/gradosService.php");
//session_start();

if (isset($_SESSION["consultaRubrica"])) {
  $rubricas = $_SESSION["consultaRubrica"];
}

//print_r($rubrica);
$gradosSelect = getGradosSelect();
$anioSelect = getAniosSelect();
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
            <div class="container bg-primary" style="width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <center>
                    <h1 style="color: white;">Rubrica</h1>
                </center>
            </div>
            <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/rubrica/rubricaConsultarController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

            <div class="container">
              <h2>Filtro rubrica</h2>
            </div>

            <div class="col-md-6" >
          <label for="inputAddress" class="form-label">Grados</label>
              <input type="hidden" name="idGrados" id="idGrados" value="">
              <?php
              echo $gradosSelect;
              ?>
          </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Año</label>
              <input type="hidden" maxlength="30" class="form-control" id="filan" name="filan" >
              <?php
              echo $anioSelect;
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
      <th style='text-align: center;' scope="col">Criterio</th>
      <th style='text-align: center;' scope="col">Periodo</th>
      <th style='text-align: center;' scope="col">Porcentaje</th>
      <th style='text-align: center;' scope="col">Grado</th>
      <th style='text-align: center;' scope="col">Año</th>
  </thead>
  <tbody>
  <?php
  if (isset($_SESSION["consultaRubrica"]))
  {
  foreach($rubricas as $rubrica){
    
    
    echo " <tr>
    <td style='text-align: center;' >".$rubrica['idRubrica']."</td>
    <td style='text-align: center;' >".$rubrica['criterio']."</td>
    <td style='text-align: center;' >".$rubrica['periodo']."</td>
    <td style='text-align: center;' >".$rubrica['porcentaje']."</td>
    <td style='text-align: center;' >".$rubrica['grado']."</td>
    <td style='text-align: center;' >".$rubrica['anio']."</td>
    
  </tr>";
  } 
  
  unset($_SESSION["consultaRubrica"]);
  }else{
    if (isset($_SESSION["consultaRubricaMsg"])){
      echo " <tr>
    <td colspan = '6' style='text-align: center;' >".$_SESSION["consultaRubricaMsg"]."</td>

  </tr>";
  unset($_SESSION["consultaRubricaMsg"]);
    }
  }

  ?>
   
 
  </tbody>
</table>
      </div>
        

        </div>
    </div>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>


</html>
 