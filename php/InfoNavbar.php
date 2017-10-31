<?php
$navbarUsuario = "";
$navbarFoto = "";
$navbarId = 0;
session_start();
if ($_SESSION != NULL) {
    $navbarId = $_SESSION["ID"];
    $navbarUsuario = $_SESSION["USUARIO"];
    $navbarFoto = $_SESSION["FOTO"];
}
?>

