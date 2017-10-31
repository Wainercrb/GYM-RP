<?php

//if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnRegistrarUsuario'])) {
if (isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtLatitud"]) && isset($_POST["txtLongitud"]) && isset($_POST["txtTelefono"])){
    include '../Clases/Local.php';
    session_start();
    $local = new local();
    $local->setNombre($_REQUEST["txtNombre"]);
    $local->setTelefono($_REQUEST["txtTelefono"]);
    $local->setEmail($_REQUEST["txtEmail"]);
    $local->setFoto($_FILES["image"]);
    $local->setLatitud($_REQUEST["txtLatitud"]);
    $local->setLongitud($_REQUEST["txtLongitud"]);

    if ($local->getId_local() > 0) {
        
    } else {
        if ($local->isLocalExiste() === FALSE) {
            

            if ($_SESSION["ID"] <= 0) {
              print "<script>alert(\"Error, debes estar registrado :v\");window.location='../RegistroGym.php';</script>";
            } else {
                print $local->guardarLocal($_SESSION["ID"]);
            }
        } else {
            print "<script>alert(\"Error este local ya existe :v\");window.location='../RegistroGym.php';</script>";
        }
    }
}
//}
?>

