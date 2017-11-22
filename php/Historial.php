<?php
if (isset($_POST["txtHeight"]) && isset($_POST["txtWeight"]) && isset($_POST["txtNeck"]) && isset($_POST["txtShoulders"]) && isset($_POST["txtChest"]) && isset($_POST["txtWaist"]) && isset($_POST["txtForearms"]) && isset($_POST["txtCalves"]) && isset($_POST["txtThigh"]) && isset($_POST["txtCalves"]) && isset($_POST["txtBiceps"]) && isset($_POST["txtButtocks"]) && isset($_POST["txtHips"])) {
    include '../Clases/Historial.php';
    $historial = new Historial();
    $historial->setAlura($_REQUEST["txtHeight"]);
    $historial->setPeso($_REQUEST["txtWeight"]);
    $historial->setCuello($_REQUEST["txtNeck"]);
    $historial->setHombros($_REQUEST["txtShoulders"]);
    $historial->setPecho($_REQUEST["txtChest"]);
    $historial->setCintura($_REQUEST["txtWaist"]);
    $historial->setAntebrazo($_REQUEST["txtForearms"]);
    $historial->setMuzlo($_REQUEST["txtThigh"]);
    $historial->setPantorrillas($_REQUEST["txtCalves"]);
    $historial->setBiceps($_REQUEST["txtBiceps"]);
    $historial->setGluteos($_REQUEST["txtButtocks"]);
    $historial->setCadera($_REQUEST["txtHips"]);
    $historial->setId_trabajador($_REQUEST["txtTrabajador"]);
    $historial->setUsuario($_REQUEST["txtUsuario"]);
    $historial->guardarMedidas();
        
}
?>

