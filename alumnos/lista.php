<?php
include_once "../services/grados/gradosService.php";
$gradosSelect = getGradosSelec();
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
    function setValue(id) {
      document.getElementById("filGrado").value = id;
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
              <input type="text" maxlength="30" class="form-control" id="filn" name="filn" >
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apellido Paterno</label>
              <input type="text" maxlength="30" class="form-control" id="filap" name="filap" >
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Apellido Materno</label>
              <input type="text" maxlength="30" class="form-control" id="filam" name="filam" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Grado</label>
              <input type="hidden" id="filGrado" name="filGrado" value="1">
              <?php
              echo  $gradosSelect;
              ?>
            </div>
            <div class="col-md-12">
                <center>
            <button type="submit" style="width: 150px;margin-top:10px;" class="btn btn-danger active" aria-pressed="true">Guardar</button>
            </center>
        </div>
          </div>
        </form>
        <br><br>
        <table class="table">
  <thead class="table-secondary">
    <tr>
      <th scope="col">No.Lista</th>
      <th scope="col">Nombre del alumno</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
     
    </tr>
  </tbody>
</table>
      </div>
        

        </div>
    </div>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>


</html>
 