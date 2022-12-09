<?php
include_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/materias/materiaEditarDAO.php");

function buscarMateria($IdMateria){
    buscarMateriaDAO($IdMateria);
}
function updateMateria($materia)
{
    return updateMateriaDAO($materia);
}
?>