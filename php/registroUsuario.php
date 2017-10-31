<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnRegistrarUsuario'])) {
    if (isset($_POST["txtName"]) && isset($_POST["txtSurnames"]) && isset($_POST["txtAdress"]) && isset($_POST["txtId"]) && isset($_POST["txtPhone"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUser"]) && isset($_POST["txtConfPass"]) && isset($_POST["txtAge"]) && isset($_POST["txtHeight"]) && isset($_POST["txtNeck"]) && isset($_POST["txtShoulders"]) && isset($_POST["txtChest"]) && isset($_POST["txtWaist"]) && isset($_POST["txtForearms"]) && isset($_POST["txtThigh"]) && isset($_POST["txtCalves"]) && isset($_POST["txtBiceps"]) && isset($_POST["txtButtocks"]) && isset($_POST["txtHips"])) {
        include '../Clases/Usuario.php';
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
        $usuario->setAltura($_REQUEST["txtHeight"]);
        $usuario->setPeso($_REQUEST["txtWeight"]);
        $usuario->setCuello($_REQUEST["txtNeck"]);
        $usuario->setHombros($_REQUEST["txtShoulders"]);
        $usuario->setPecho($_REQUEST["txtChest"]);
        $usuario->setCintura($_REQUEST["txtWaist"]);
        $usuario->setAntebrazo($_REQUEST["txtForearms"]);
        $usuario->setMuzlo($_REQUEST["txtThigh"]);
        $usuario->setPantorrillas($_REQUEST["txtCalves"]);
        $usuario->setBiceps($_REQUEST["txtBiceps"]);
        $usuario->setGluteos($_REQUEST["txtButtocks"]);
        $usuario->setCatera($_REQUEST["txtHips"]);
        $usuario->setGenero($_REQUEST["cbGenero"]);
        $usuario->setFoto($_FILES["image"]);
        if ($usuario->getId_usuario() > 0) {
            
        } else {
            if ($usuario->isUsuarioExiste() === FALSE) {
                print $usuario->guardarUsuario();
            } else {
                print "<script>alert(\"Error usuario o contraseña ya existen :v\");window.location='../registroUsuario.php';</script>";
            }
        }
    }
}
?>