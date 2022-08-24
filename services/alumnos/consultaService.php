<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/alumnos/consultaDAO.php");

function consultaAlumnos($filtro)
{
    try {
        consultaAlumnosDAO($filtro);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function consultaAlumnoSelect($filtro, $idSelect)
{
    $select = '<select id="txtalumno" onchange="setAlumno(this.selectedIndex);" required name="txtalumno" class="form-select">';
    $registros = consultaAlumnoDAO($filtro);
    $contador = 0;
    $select = $select . '<option id="0" value = "">Todos</option>';

    if (is_array($registros)) {
        while ($contador < count($registros)) {
            $registro = $registros[$contador];
            $select = $select . '<option id="' . $registro[0][0] .  '" ' . ($idSelect == $registro[0][0] ? "selected" : "") . '>' . $registro[0][1] . '</option>';
            $contador = $contador + 1;
        }
    }

    $select = $select . '</select>';
    return $select;
}
?>
