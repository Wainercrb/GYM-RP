<?php

$postnames = array_keys($_POST);
if (isset($_POST["editar"])) {
    var_dump($_REQUEST["editar"]);
    echo 'siiii';
} else if (isset($_POST["eliminar"])) {
    var_dump($_REQUEST["eliminar"]);
    echo 'nooo';
}



if (isset($_POST["txtName"]) && isset($_POST["txtSurnames"]) && isset($_POST["txtAdress"]) && isset($_POST["txtId"]) && isset($_POST["txtPhone"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUser"]) && isset($_POST["txtConfPass"]) && isset($_POST["txtAge"])) {
    include '../Clases/Usuario.php';
    include '../Clases/Historial.php';
    $usuario = new usuario();
    $usuario->setNombre($_REQUEST["txtName"]);
    $usuario->setApellidos($_REQUEST["txtSurnames"]);
    $usuario->setDireccion($_REQUEST["txtAdress"]);
    $usuario->setCedula($_REQUEST["txtId"]);
    $usuario->setTelefono($_REQUEST["txtPhone"]);
    $usuario->setMail($_REQUEST["txtEmail"]);
    $usuario->setUsuario($_REQUEST["txtUser"]);
    $usuario->setContrasenna($_REQUEST["txtConfPass"]);
    $usuario->setEdad($_REQUEST["txtAge"]);
    $usuario->setGenero($_REQUEST["cbGenero"]);
    $usuario->setFoto($_FILES["image"]);
    
    if ($usuario->getId_usuario() > 0) {
        
    } else {
        if ($usuario->isUsuarioExiste() === FALSE) {
            session_start();
            var_dump($_SESSION);
           
         
            
            print $usuario->guardarUsuario($_SESSION["IDTIENDA"]);
        } else {
            print "<script>alert(\"Error usuario o contraseña ya existen :v\");window.location='../registroUsuario.php';</script>";
        }
    }
}
?>