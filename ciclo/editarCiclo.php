<?php
session_start();
if (isset($_SESSION["ciclo"])) {
    $ciclo = $_SESSION["ciclo"];
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="../calendar/css/main.css" rel="stylesheet" />
</head>

<body>
    <div style="display: flex;">
        <div>
            <?php include_once("../menu/menu2.php"); ?>
        </div>
        <div>
            <div class="container" style="background-color:#007b00; width: 100%; padding: 4px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <center>
                    <h1 style="color: white;">Editar ciclo escolar</h1>
                </center>
            </div>
            <div class="container-fluid" style="width: 85%; padding: 50px;">
                <div class="s002">
                    <form method="post" action="/SCC/controllers/ciclo/capturaCicloController.php">
                        <div id="datosPersonales" class="row g-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding-left:30px; padding-right:30px; padding-bottom: 30px; border-radius:8px;">
                            <div class="inner-form">

                                <div class="input-field second-wrap">
                                    <input type="hidden" name="IdCiclo" value="<?php echo $ciclo['idCiclo']; ?>" />
                                </div>
                                <div class="input-field third-wrap">
                                    <div class="icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                                        </svg>
                                    </div>
                                    <span style="padding-left: 50px; font-weight: bold;">Inicio</span>
                                    <input class="datepicker" id="depart" value="<?php echo $ciclo['fechainicio'] ?>" name="txtanioinicia" type="text" placeholder="Fecha Inicio" required />
                                </div>
                                <div class="input-field fouth-wrap">
                                    <div class="icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                                        </svg>
                                    </div>
                                    <span style="padding-left: 50px; font-weight: bold;">Fin</span>
                                    <input class="datepicker" id="return" value="<?php echo $ciclo['fechafin'] ?>" name="txtaniofin" type="text" placeholder="Fecha Fin" required />
                                </div>
                                <div class="input-field fifth-wrap">

                                </div>
                            </div>

                            <div class="form-check" style="padding-left: 25%;">
                                <label class="form-check-label" for="gridCheck">
                                    Activo
                                </label>
                                <input type="checkbox" class="form-check-input" <?php echo $ciclo["activo"] == '1' ? 'checked' : '' ?> id="activo" name="activo[]">
                            </div>

                            <div class="col-12" style="padding: 12px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td align="right"><button type="submit" class="btn btn-primary">Guardar</button></td>
                                        <td style="width: 10px;"></td>
                                        <td align="left"><button type="reset" class="btn btn-danger">Cancelar</button></td>
                                    </tr>
                                </table>
                            </div>
                    </form>
                </div>

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
<script src="../calendar/js/extention/choices.js"></script>
<script src="../calendar/js/extention/flatpickr.js"></script>
<script>
    flatpickr(".datepicker", {});
</script>
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });
</script>

</html>