<?php
session_start();
if (isset($_SESSION["listaCiclos"])) {
    $ciclos = $_SESSION["listaCiclos"];
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
                    <h1 style="color: white;">Consulta Criterios</h1>
                </center>
            </div>
            <div class="container-fluid" style="width: 85%;">
                <div class="conatiner" style="margin: 11px; margin-bottom: 25px;"></div>
                <form class="row g-3" method="post" action="/SCC/controllers/ciclo/consultaCicloController.php">
                    <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">

                        <div class="container">
                            <h2>Búsqueda de Ciclos</h2>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Ciclo</label>
                            <input type="text" maxlength="45" class="form-control" id="txtCiclo" name="txtCiclo" placeholder="">
                        </div>
                        <br>
                        <div class="col-md-6" style="padding-top: 50px;">
                            <div class="form-check">
                                <label class="form-check-label" for="gridCheck">
                                    Activo
                                </label>
                                <input type="checkbox" class="form-check-input" checked="true" id="activo" name="activo[]">
                            </div>
                        </div>

                        <div class="container" style="padding: 1px;"></div>

                        <div id="containerTabla"></div>

                        <div class="container" style="padding: 1px;"></div>

                        <div class="col-12" style="padding: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td align="center"><button type="submit" class="btn btn-primary">Buscar</button></td>

                                </tr>
                            </table>
                        </div>
                </form>
                <br>
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th style='text-align: center;' scope="col">Ciclo</th>
                            <th scope="col">Activo</th>
                            <th style='text-align: center;' scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($_SESSION["listaCiclos"])) {
                            foreach ($ciclos as $ciclo) {

                                echo " <tr>
    <th scope='row' style='text-align: center;'>" . $ciclo['Ciclo'] . "</th>
    <td >" . $ciclo['Activo'] . "</td>
    <td style='text-align: center;'><a href='../controllers/ciclo/editarCicloController.php?IdCiclo=" . $ciclo['IdCiclo'] . "'><img style='cursor:pointer;' src='../imagenes/editar.png' alt='editar'></a> </td>
    
  </tr>";
                            }
                            unset($_SESSION["listaCiclos"]);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <footer class="d-flex flex-wrap justify-content-between py-3 my-4 border-top" style="box-shadow: rgb(136 165 191 / 48%) 6px 2px 16px 0px, rgb(255 255 255 / 80%) -6px -2px 16px 0px; border-radius: 5px; padding: 10px; margin-right: 90px; margin-left: 80px;">

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