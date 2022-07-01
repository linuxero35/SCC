<?php
include '../services/grados/gradosService.php';
$gradosSelect=getGradosSelec();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 0px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 0px;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    .center {
  margin: auto;
  width: 50%;
  border: 0px solid green;
  padding: 10px;
}

.center2 {
  margin: auto;
  width: 50%;
  border: 0px solid green;
  padding: 10px;
  padding-left: 30%;
}

.center3 {
  margin: auto;
  width: 50%;
  border: 0px solid green;
  padding: 10px;
  padding-right: 30%;
}
  </style>
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
        <form class="row g-3" method="POST" action="../controllers/alumnos/alumnosInsertController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">
            
              <div class="container">
                <h2>Datos Personales</h2>
              </div>
            
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="txtn" name="txtn">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apelliodo Paterno</label>
              <input type="text" class="form-control" id="txtap" name="txtap">
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Apellido Materno</label>
              <input type="text" class="form-control" id="txtam" name="txtam" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="txtc" name="txtc" placeholder="">
            </div>
            <div class="col-md-6" style="padding-top: 10px;">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck">
                  Activo
                </label>
                <input class="form-check-input" type="checkbox" id="txtac" name="txtac">
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
              <input type="text" class="form-control" id="txtg" name="txtg">
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Grado</label>
              <?php
             echo  $gradosSelect;
              ?>
            </div>
            <div class="col-md-6">
              <label for="inputZip" class="form-label">Año</label>
              <input type="text" class="form-control" id="txtan" name="txtan">
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">No.Lista</label>
              <input type="text" class="form-control" id="txtno" name="txtno">
            </div>
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

</html>