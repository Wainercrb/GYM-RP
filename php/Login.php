<?php

if (isset($_POST["txtUsuario"]) && isset($_POST["txtContrasenna"])) {
    echo 'entro';
    include "../Clases/Usuario.php";
    $obj = new usuario();
    $obj->setUsuario($_REQUEST['txtUsuario']);
    $obj->setMail($_REQUEST['txtUsuario']);
    $obj->setContrasenna($_REQUEST['txtContrasenna']);
    if ($obj->cargarUsuario()) {
        print "<script>alert(\"*****Bienvenido, tipo usuario*******\");window.location='../Principal.php';</script>";
        return;
    }
            include "../Clases/Trabajador.php";
            $trabajador = new trabajador();
            $trabajador->setUsuario($_REQUEST['txtUsuario']);
            $trabajador->setEmail($_REQUEST['txtUsuario']);
            $trabajador->setContrasenna($_REQUEST['txtContrasenna']);
            if ($trabajador->cargarTrabajador()) {
                print "<script>alert(\"*****Bienvenido, tipo trabajador*******\");window.location='../Principal.php';</script>";
                return;
            }
            print"<script>alert(\"No se encontro ninguana considencia :(. Verifique sus datos\");window.location='../index.php';</script>";
}
?>