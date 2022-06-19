<?php
include '../services/loginService.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IdUsuario = $_POST['IdUsuario'];
    $Password = $_POST['Password'];
    echo $IdUsuario;
    echo $Password;
    login($IdUsuario, $Password);
}

?>