<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/SCC/dao/alumnos/consultaDAO.php");

function consultaAlumnos($filtro){

    try{

        consultaAlumnosDAO($filtro);   


    }catch(Exception $e){
        echo $e -> getMessage();
    }
}








?>