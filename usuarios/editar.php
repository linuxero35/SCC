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
if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
} else {
  //echo 'holaaaaa';
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
</head>

<body>
  <div style="display: flex;">
    <div>
      <?php include_once("../menu/menu2.php"); ?>
    </div>
    <div>
      <div class="container" style="background-color:#007b00; width: 100%; padding: 12px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
        <center>
          <h1 style="color: white;">Editar Usuarios</h1>
        </center>
      </div>
      <div class="container-fluid" style="width: 85%;">
        <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
        <form class="row g-3" method="post" action="/SCC/controllers/usuarios/capturaController.php">
          <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">
          <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Usuario</label>
              <input type="text" maxlength="45" class="form-control" id="txtusuario" name="txtusuario" value="<?php echo $usuario['usuario']; ?>" required>
            </div>
          <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Nombre</label>
              <input type="text" maxlength="45" class="form-control" id="txtnombre" name="txtnombre" value="<?php echo $usuario['nombre']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Apellido Paterno</label>
              <input type="text" maxlength="45" class="form-control" id="txtap" name="txtap" value="<?php echo $usuario['apellidopat']; ?>" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">Apellido Materno</label>
              <input type="text" maxlength="45" class="form-control" id="txtam" name="txtam" value="<?php echo $usuario['apellidomat']; ?>"  required>
            </div>
            <div class="form-check col-md-6" style="padding-top: 50px; padding-left:50px">
                <label class="form-check-label" for="gridCheck">
                  Activo
                </label>
                <input type="checkbox" class="form-check-input" <?php echo $usuario["activo"] == '1' ? 'checked' : '' ?> id="activo" name="activo[]" >
              </div>

              <input type="hidden" value="<?php echo $usuario["idusuario"]; ?>" id="IdUsuario" name="IdUsuario" >
              <input type="hidden" value="" id="txtcontra" name="txtcontra" >
          <div class="col-12" style="padding: 12px;">
            <table style="width: 100%;">

              <tr>
                <td align="center"><button type="submit" class="btn btn-primary">Guardar</button></td>
          
              </tr>
            </table>
          </div>
        </form>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>

</html>