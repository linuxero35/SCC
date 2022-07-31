<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/rubrica/consultaDAO.php");

function consultaRubrica($filtro)
{
    try {
        consultaRubricaDAO($filtro);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function getAniosSelect()
{
    $select = '<select id="txtanio" onchange="setAnio(this.selectedIndex);" name="txtanio" class="form-select">';
    $registro = consultaAnio();
    $anioInicial = $registro['anioInicial'];
    $anioFinal = $registro['anioFinal'];

    $select = $select . '<option id="0">Todos</option>';
    while ($anioFinal >= $anioInicial) {

        $select = $select . '<option id="' . $anioFinal .  '">' . $anioFinal . '</option>';
        $anioFinal = $anioFinal - 1;
    }

    $select = $select . '</select>';
    return $select;
}
?>