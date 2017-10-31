<?php
//if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnRegistrarUsuario'])) {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtApellidoUno"]) && isset($_POST["txtApellidoDos"]) && isset($_POST["txtCedula"]) && isset($_POST["txtDireccion"]) && isset($_POST["txtTelefono"]) && isset($_POST["txtContrasena"]) && isset($_POST["txtConfContrasenna"]) && isset($_POST["txtConfContrasenna"]) && isset($_POST["combobox"])) {
        include '../Clases/Trabajador.php';
        $trabajador = new trabajador();
        $trabajador->setNombre($_REQUEST["txtNombre"]);
        $trabajador->setApellidoUno($_REQUEST["txtApellidoUno"]);
        $trabajador->setApellidoDos($_REQUEST["txtApellidoDos"]);
        $trabajador->setFoto($_FILES["image"]);
        $trabajador->setCedula($_REQUEST["txtCedula"]);
        $trabajador->setDireccion($_REQUEST["txtDireccion"]);
        $trabajador->setEmail($_REQUEST["txtEmail"]);
        $trabajador->setTelefono($_REQUEST["txtTelefono"]);
        $trabajador->setUsuario($_REQUEST["txtUsuario"]);
        $trabajador->setContrasenna($_REQUEST["txtContrasena"]);
        $trabajador->setRol($_REQUEST["combobox"]);
        if ($trabajador->getId_trabajador() > 0) {
            
        } else {
            if ($trabajador->isTrabajadorExiste()=== FALSE) {
                print $trabajador->guardarTrabajador();
            } else {
//              print "<script>alert(\"Error usuario o email ya existen :v\");window.location='../RegistroTrabajador.php';</script>";
            }
        }
    }
//}
?>
