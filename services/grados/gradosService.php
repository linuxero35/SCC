<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/grados/gradosDAO.php");

function getGradosSelec()
{
    $select = '<select id="txtgr" onchange="setValue(this.selectedIndex);" name="txtgr" class="form-select">';
    $registros = consultaGrados();
    $contador = 0;
    $select = $select . '<option id="0">Todos</option>';
    while ($contador < count($registros)) {
        $registro = $registros[$contador];
        $select = $select . '<option id="' .$registro[0][0].  '">' . $registro[0][1] . '</option>';
        $contador = $contador + 1;
    }

    $select = $select . '</select>';
    return $select;
}

function getGradosSelect()
{
    $select = '<select id="txtgr" onchange="setGrado(this.selectedIndex);" name="txtgr" class="form-select">';
    $registros = consultaGrados();
    $contador = 0;
    $select = $select . '<option value="" id="">Todos</option>';
    while ($contador < count($registros)) {
        $registro = $registros[$contador];
        $select = $select . '<option id="' .$registro[0][0].  '">' . $registro[0][1] . '</option>';
        $contador = $contador + 1;
    }

    $select = $select . '</select>';
    return $select;
}

function getGradosSelecRequired($idSelect)
{
    $select = '<select id="txtgr" onchange="setValue(this.selectedIndex);" required name="txtgr" class="form-select">';
    $registros = consultaGrados();
    $contador = 0;
    $select = $select . '<option id="0" value = "">Todos</option>';
    while ($contador < count($registros)) {
        $registro = $registros[$contador];
        $select = $select . '<option id="' .$registro[0][0].  '" ' . ($idSelect == $registro[0][0] ? "selected" : "") . '>' . $registro[0][1] . '</option>';
        $contador = $contador + 1;
    }

    $select = $select . '</select>';
    return $select;
}
?>