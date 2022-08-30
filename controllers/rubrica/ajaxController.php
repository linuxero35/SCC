<?php
require_once($_SERVER['DOCUMENT_ROOT']."/SCC/services/rubrica/capturaService.php");

if (isset($_GET['idGrado'])) {
    $idGrado = intval($_GET['idGrado']);
    $idPeriodo = intval($_GET['idPeriodo']);
    
    $filtro = array(
        "IdGrado" => $idGrado,
        "IdPeriodo" => $idPeriodo
    );

    $html = construirTabla($filtro);

    echo $html;
}
?>