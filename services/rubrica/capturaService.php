<?php
//session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/SCC/dao/rubrica/rubricaDAO.php");

function insertarRubrica($rubrica)
{
    try {
        insertaRubricaDAO($rubrica);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function buscarRubricasParametros($filtros)
{
    try {
        return consultaRubricasParametros($filtros);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function construirTabla($filtros)
{
    try {
        //print_r($_SESSION["calificacion"]);
        //if (isset($_SESSION["calificacion"])) {
        //  $criterio = $_SESSION["calificacionDetalle"];
        //} else {
        $rows = buscarRubricasParametros($filtros);
        //}
        //print_r($criterio);
        $html = tablaHTML($rows);

        return $html;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function tablaHTML($criterios)
{

    $tabla = '<table style="width:100%" class="table">' .
        '<thead class="table-dark"><tr>' .
        '<th scope="col">Criterio</th>' .
        '<th scope="col">Evaluación</th>' .
        '<th scope="col">Calificación</th>' .
        '</tr></thead> <tbody>';


    if (is_array($criterios)) {
        $count =  0;
        foreach ($criterios as $criterio) {
            if (isset($criterio['calificacion'])) {
                $calificacion = $criterio['calificacion'];
            } else {
                $calificacion = 0;
            }
            $count = $count + 1;

            $id = $count;

            if(isset($criterio['idCalificacionCriterio'])){
                $id = $criterio['idCalificacionCriterio'];
            } else {
                $id = $criterio['idCriterio'];
            }

            $tabla .= '<tr>' .
                '<td>' . $criterio['criterio'] . '(' .  $criterio['porcentaje'] . '%)' .'</td>' .
                '<td><div class="col-sm-5"><input type="text" name="criterios[' . $id  . ']" class="form-control" value="' . ($calificacion == '0' ? '' : $calificacion) . '" onchange="setCalificacion(this.value,' . $criterio['porcentaje'] . ',' . $id . ')" required></td></div>' .
                '<td><div class="col-sm-5"><input type="text" id="calificacion_' . $id . '" name="calificaciones[' . $id  . ']" class="form-control" value="" required></td></div>' .
                '</tr>';
        }
    }

    $tabla .= ' </tbody></table>';

    return $tabla;
}
