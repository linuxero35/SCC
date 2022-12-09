<?php

include_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/usuarios/usuarioCapturaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/usuarios/usuarioConsultaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/SCC/dao/usuarios/usuarioEditarDAO.php");

function insertUsuario($usuario)
{
    insertUsuarioDAO($usuario);
}

function consultaUsuarios($usuario)
{
    return consultaUsuarioDAO($usuario);
}

function updateUsuarios($usuario)
{
    return updateUsuariosDAO($usuario);
}

function buscarUsuario($idusuario){
   buscarUsuarioDAO($idusuario);
}

?>