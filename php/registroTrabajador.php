<?php
 if (isset($_REQUEST["btnEliminar"])) {
    include '../Clases/Trabajador.php';
    $trabajador = new trabajador();
    $trabajador->setId_trabajador($_POST["txtId"]);
    $trabajador->eliminarUsuario();
} else if (isset($_REQUEST["Actualizar"])) {
    include '../Clases/Trabajador.php';
    $Trabajador = new trabajador();
    $Trabajador->setId_trabajador($_POST["txtId"]);
    $Trabajador->setNombre($_REQUEST["txtnombre"]);
    $Trabajador->setApellidoUno($_REQUEST["txtApellidoUno"]);
    $Trabajador->setApellidoDos($_REQUEST["txtApellidoDos"]);
    $Trabajador->setCedula($_REQUEST["txtCedula"]);
     $Trabajador->setTelefono($_REQUEST["txtTelefono"]);
    $Trabajador->setDireccion($_REQUEST["txtDireccion"]);
    $Trabajador->setEmail($_REQUEST["txtEmail"]);
    $Trabajador->setRol($_REQUEST["txtRol"]);
    $Trabajador->setUsuario($_REQUEST["txtUsuario"]);
    $Trabajador->setContrasenna($_REQUEST["txtContrasena"]);
    $Trabajador->actualizarTrabajador();
} else {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtApellidoUno"]) && isset($_POST["txtApellidoDos"]) && isset($_POST["txtCedula"]) && isset($_POST["txtDireccion"]) && isset($_POST["txtTelefono"]) && isset($_POST["txtContrasena"]) && isset($_POST["txtConfContrasenna"]) && isset($_POST["txtConfContrasenna"]) && isset($_POST["combobox"])) {
        include '../Clases/Trabajador.php';
        session_start();
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
                print $trabajador->guardarTrabajador($_SESSION["IDTIENDA"]);
            } else {
             print "<script>alert(\"Error usuario o email ya existen :v\");window.location='../RegistroTrabajador.php';</script>";
            }
        }
    }
<<<<<<< HEAD
}
//}
=======

>>>>>>> f08f2a2634b10eaf60ed7782dad72f64edbe4f7e
?>
