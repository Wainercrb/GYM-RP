<?php

if (isset($_POST["Actualizar"])) {
    if ($_POST['txtId'] == "" || $_POST['txtnombre'] == "" || $_POST['txtTelefono'] == "" || $_POST['txtEmail'] == "") {
        die("<script>alert(\"Debes ingresar todos los datos\");window.location='../MantenimientoGym.php';</script>");
    }
    include '../Clases/Local.php';
    $local = new local();
    $local->setEmail($_POST['txtEmail']);
    $local->setTelefono($_POST['txtTelefono']);
    $local->setId_local($_POST['txtId']);
    $local->setNombre($_POST['txtnombre']);
    $local->actualizar();
    
}

