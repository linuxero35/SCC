<?php
include '../dao/grados/gradosDAO.php';
function getGradosSelec()
{
    $select = '<select id="txtgr" onchange="setValue(this.selectedIndex);" name="txtgr" class="form-select">';
    $registros = consultaGrados();
    $contador = 0;
    while ($contador < count($registros)) {
        $registro = $registros[$contador];
        $select = $select . '<option id="' .$registro[0][0].  '">' . $registro[0][1] . '</option>';
        $contador = $contador + 1;
    }

    $select = $select . '</select>';
    return $select;
}
?>