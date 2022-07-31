<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/criterio/criterioDAO.php");
function getCriterioSelec()
{
    $select = '<select id="txtcr" onchange="setCriterio(this.selectedIndex);" name="txtcr" class="form-select">';
    $registros = consultaCriterios();
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