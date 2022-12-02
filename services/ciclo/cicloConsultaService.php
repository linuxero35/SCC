<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/ciclo/cicloDAO.php");

function buscarCiclos(){
    return buscarCiclosDAO();
}

function consultaCiclosSelect($idSelect, $required)
{
    $select = '<select id="txtCiclo" onchange="setCiclo(this.selectedIndex);" '. $required .' name="txtCiclo" class="form-select">';
    $registros = buscarCiclos();
    $contador = 0;
    $select = $select . '<option id="0" value = "">Todos</option>';

    if (is_array($registros)) {
        while ($contador < count($registros)) {
            $registro = $registros[$contador];
            $select = $select . '<option id="' . $registro['idCiclo'] .  '" ' . ($idSelect == $registro['idCiclo'] ? "selected" : "") . '>' . $registro['ciclo'] . '</option>';
            $contador = $contador + 1;
        }
    }

    $select = $select . '</select>';
    return $select;
}

?>