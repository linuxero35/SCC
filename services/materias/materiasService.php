<?php
include_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/materias/materiaDAO.php");

function consultaMateriasSelect($IdMateria)
{
    try {
        $registros = consultaMateriasDAO();

        if ($registros != null) {
            $select = '<select id="txtpe" onchange="setMateria(this.selectedIndex);" name="txtpe" class="form-select">';
           // $registros = consultaPeriodos();
            $contador = 0;
            $select = $select . '<option id="0">Todos</option>';

            while ($contador < count($registros)) {
                $registro = $registros[$contador];
                $select = $select . '<option id="' . $registro[0][0] .  '" ' . ($registro[0][0] == $IdMateria ? 'selected' : '') . '>' . $registro[0][1] . '</option>';
                $contador = $contador + 1;
            }

            $select = $select . '</select>';
            return $select;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>