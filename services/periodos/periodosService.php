<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/periodos/periodosDAO.php");
function getPeriodosSelec()
{
    $select = '<select id="txtpe" onchange="setValue(this.selectedIndex);" name="txtpe" class="form-select">';
    $registros = consultaPeriodos();
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
?>