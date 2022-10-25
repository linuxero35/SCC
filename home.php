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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="css/menu.css" rel="stylesheet">
    <link href="menu/sidebars.css" rel="stylesheet">

    <script>
        function setValue(id) {
            document.getElementById("idGrado").value = id;
        }

        function setGrado(index) {
            var list = document.getElementById("txtgr");
            var value = list.options[index].id;
            document.getElementById("txtIdGrado").value = value;
            reload();
        }

        function setMateria(index) {
            var list = document.getElementById("txtIdMateria");
            var value = list.options[index].id;
            document.getElementById("txtMateria").value = value;

        }

        function setPeriodo(index) {
            var list = document.getElementById("txtpe");
            var value = list.options[index].id;
            document.getElementById("txtPeriodo").value = value;
            tabla();
        }

        function setAlumno(index) {
            var list = document.getElementById("txtalumno");
            var value = list.options[index].id;
            document.getElementById("txtIdAlumno").value = value;
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
    </script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script>
        function reload() {
            var idGrado = document.getElementById("txtIdGrado").value;

            $.ajax({
                type: 'GET',
                url: '../controllers/alumnos/ajaxController.php',
                data: {
                    idGrado: idGrado
                },
                success: function(data) {
                    $("#containerAlumnos").html(data);
                }
            });
        }
    </script>

    <script>
        function tabla() {
            var idGrado = document.getElementById("txtIdGrado").value;
            var idPeriodo = document.getElementById("txtPeriodo").value;

            $.ajax({
                type: 'GET',
                url: '../controllers/rubrica/ajaxController.php',
                data: {
                    idGrado: idGrado,
                    idPeriodo: idPeriodo
                },
                success: function(data) {
                    $("#containerTabla").html(data);
                }
            });
        }
    </script>

</head>

<body>
    <div style="display: flex;">
        <div>
            <?php include_once("menu/menu3.php"); ?>
        </div>
        <div style="width:100%;">
            <div class="d-flex justify-content-center">
                <img src="imagenes/TBC.jpg" />
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../menu/sidebars.js"></script>

</html>