<?php

var_dump($_POST['cantidadComida']);
var_dump($_POST['lugarTonificar']);
var_dump($_POST['comida']);
var_dump($_POST['horaC']);
var_dump($_POST['fechaC']);
var_dump($_POST['detalle']);
var_dump($_POST['mdUsu']);
var_dump($_POST['mdAltura']);
var_dump($_POST['mdPeso']);
var_dump($_POST['mdCuello']);
var_dump($_POST['mdHombros']);
var_dump($_POST['mdPecho']);
var_dump($_POST['mdCintura']);
var_dump($_POST['mdCintura']);
var_dump($_POST['mdAntebrazo']);
var_dump($_POST['mdMuzlo']);
var_dump($_POST['mdPantorrilla']);
var_dump($_POST['mdBiceps']);
var_dump($_POST['mdGluteos']);
var_dump($_POST['mdCadera']);

if (isset($_POST['usuario'])) {
    include '../Clases/Rutina.php';
    $rutina = new Rutina();
    for ($index = 0; $index < count($_POST['lugarTonificar']); $index++) {
        $rutina->setLugar_tonificar($_POST['lugarTonificar'][$index]);
        $rutina->setEquipo($_POST['equipo'][$index]);
        $rutina->setTipo_ejercicio($_POST['tipo'][$index]);
        $rutina->setSessiones($_POST['series'][$index]);
        $rutina->setRepeticiones($_POST['repeticiones'][$index]);
        for ($index1 = 0; $index1 < count($_POST['usuario']); $index1++) {
            $rutina->setUsuario($_POST['usuario'][$index1]);
            $rutina->guardarRutina();
        }
    }

    include '../Clases/Historial.php';
    $historial = new Historial();
    if (isset($_POST['mdAltura'])) {
        for ($index2 = 0; $index2 < count($_POST['mdAltura']); $index2++) {
            $historial->setUsuario($_POST['mdUsu'][$index2]);
            $historial->setAlura($_POST['mdAltura'][$index2]);
            $historial->setPeso($_POST['mdPeso'][$index2]);
            $historial->setCuello($_POST['mdCuello'][$index2]);
            $historial->setHombros($_POST['mdHombros'][$index2]);
            $historial->setPecho($_POST['mdPecho'][$index2]);
            $historial->setCintura($_POST['mdCintura'][$index2]);
            $historial->setAntebrazo($_POST['mdAntebrazo'][$index2]);
            $historial->setMuzlo($_POST['mdMuzlo'][$index2]);
            $historial->setPantorrillas($_POST['mdPantorrilla'][$index2]);
            $historial->setBiceps($_POST['mdBiceps'][$index2]);
            $historial->setGluteos($_POST['mdGluteos'][$index2]);
            $historial->setCadera($_POST['mdCadera'][$index2]);
            $historial->setId_trabajador($_POST['id_trabajador']);
            $historial->guardar();
        }
    }

    include '../Clases/Comida.php';
    $comida = new Comida();

    if (isset($_POST['cantidadComida'])) {
        for ($index3 = 0; $index3 < count($_POST['cantidadComida']); $index3++) {
            $comida->setCantidad($_POST['cantidadComida'][$index3]);
            $comida->setNombre($_POST['comida'][$index3]);
            $comida->setHora($_POST['horaC'][$index3]);
            $comida->setFecha($_POST['fechaC'][$index3]);
            $comida->setDetalles($_POST['detalle'][$index3]);
            $comida->setId_trabajador($_POST['id_trabajador']);
            for ($index4 = 0; $index4 < count($_POST['usuario']); $index4++) {
                $comida->setId_usuario($_POST['usuario'][$index4]);
                $comida->guardar();
            }
        }
    }
    print "<script>alert(\"Rutinas agregadas correctamente..... ;)\");window.location='../registroRutina.php';</script>";
}
?>
