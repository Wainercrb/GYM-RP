<?php
var_dump($_POST);
if (isset($_POST["btnVerificar"])) {
    echo 'verificar';
    include '../Clases/Usuario.php';
    $usuario = new usuario();
    $usuario->setUsuario($_POST['txtUsuario']);
    $usuario->setMail($_POST['txtUsuario']);
    $usuario->verificarEmailUsuario();
} else if (isset($_POST["btnCambiar"])) {
    if ($_POST["txtPass"] !== $_POST["txtConfiPass"]) {
        die("<script>alert(\"Las contraseñas no coinciden\");window.location='../CambioContrasenna.php?rs=$_POST[txtId]&type=$_POST[txtType]';</script>");
    }
    if ($_POST['txtType'] === "u") {
        $to = $_POST["txtEmail"];
        $subject = "IMPORTANTE SER HA RESTABLECIDO";
        $body = "Se reestablecio tu contraseña del GYM.\nDetalles: \nLa fecha de la cita es " . date('Y/m/d H:i:s') . "..... GRACIAS POR SU PREFERENCIA...";
        if (mail($to, $subject, $body)) {
            include '../Clases/Usuario.php';
            $usuario = new usuario();
            $usuario->setContrasenna($_POST['txtPass']);
            $usuario->setId_usuario($_POST['txtId']);
            $usuario->cambiarContrasenna();
        }else{
            die("No se pudo cambiar la contraseña, verifique su internet");
        }
    } else if ($_POST['txtType'] === "t") {
        if ($_POST["txtPass"] !== $_POST["txtConfiPass"]) {
            die("<script>alert(\"Las contraseñas no coinciden\");window.location='../CambioContrasenna.php?rs=$_POST[txtId]&type=$_POST[txtType]';</script>");
        }
        $to = $_POST["txtEmail"];
        $subject = "IMPORTANTE SER HA RESTABLECIDO";
        $body = "Se reestablecio tu contraseña del GYM.\nDetalles: \nLa fecha de la cita es " . date('Y/m/d H:i:s') . "..... GRACIAS POR SU PREFERENCIA...";
        if (mail($to, $subject, $body)) {
            include '../Clases/Trabajador.php';
            $trabajador = new trabajador();
            $trabajador->setContrasenna($_POST['txtPass']);
            $trabajador->setId_trabajador($_POST['txtId']);
            $trabajador->cambiarContrasenna();
        }else{
            die("No se puedo cambiar la contraseña, verifiqe su internet");
        }
    }
}

