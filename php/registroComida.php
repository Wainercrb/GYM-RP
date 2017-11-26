<?php

if (isset($_REQUEST["btnEliminar"])) {
    include '../Clases/Comida.php';
    $comida = new Comida();
    $comida->setId_comida($_POST["txtIdComida"]);
    $comida->eliminarComida();
} else if (isset($_REQUEST["Actualizar"])) {
    include '../Clases/Comida.php';
    $comida = new Comida();
    $comida->setNombre($_POST["tipoComida"]);
    $comida->setEstado($_POST["estadoComida"]);
    $comida->setFecha($_POST["txtFecha"]);
    $comida->setHora($_POST["txtHora"]);
    $comida->setDetalles($_POST["txtDetalles"]);
    $comida->setId_comida($_POST["txtIdComida"]);
    $comida->actualizarComida();
}
?>
