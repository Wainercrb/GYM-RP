<?php

if (isset($_POST["txtUsuario"]) && isset($_POST["txtContrasenna"])) {
    include "../Clases/Usuario.php";
    $obj = new usuario();
    $obj->setUsuario($_REQUEST['txtUsuario']);
    $obj->setMail($_REQUEST['txtUsuario']);
    $obj->setContrasenna($_REQUEST['txtContrasenna']);
    if ($obj->cargarUsuario()) {
        print "<script>alert(\"*****Bienvenido*******\");window.location='../Principal.php';</script>";
        return;
    }
    include "../Clases/Trabajador.php";
    $trabajador = new trabajador();
    $trabajador->setUsuario($_REQUEST['txtUsuario']);
    $trabajador->setEmail($_REQUEST['txtUsuario']);
    $trabajador->setContrasenna($_REQUEST['txtContrasenna']);
    if ($trabajador->cargarTrabajador()) {
        print "<script>alert(\"*****Bienvenido*******\");window.location='../Principal.php';</script>";
        return;
    } 
    if ($trabajador->cargarTrabajadorNoShop()) {
        print "<script>alert(\"*****Bienvenido procede a registra tu gym*******\");window.location='../RegistroGym.php';</script>";
        return;
    }
print"<script>alert(\"No se encontro ninguana considencia :(. Verifique sus datos\");window.location='../index.php';</script>";
}
?>