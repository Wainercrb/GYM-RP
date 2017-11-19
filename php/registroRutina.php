<?php

if (isset($_POST['usuario'])) {
    var_dump($_POST['usuario']);
    var_dump($_POST['lugarTonificar']);
    var_dump($_POST['equipo']);
    var_dump($_POST['tipo']);
    var_dump($_POST['series']);
    var_dump($_POST['repeticiones']);
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
    print "<script>alert(\"Rutinas agregadas correctamente..... ;)\");window.location='../registroRutina.php';</script>";
}
?>
