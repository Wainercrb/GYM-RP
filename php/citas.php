<?php

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST["addCita"])) {
        session_start();
        $to = $_SESSION["EMAIL"];
        $subject = "HOLA! " . $_SESSION["NOMBRE"] . " " . $_SESSION["APELLIDOS"];
        $body = "Se ha reservado su cita.\nDetalles: \n GYM: $_SESSION[NOMBRETIENDA], el dia $_POST[txtFecha], con $_POST[inputNutricionista], detalles de esta : $_POST[txtDetalle]..... GRACIAS POR SU PREFERENCIA...";
        if (mail($to, $subject, $body)) {
            include '../Clases/cita.php';
            $cita = new cita();
            $cita->setId_usuario($_SESSION["ID"]);
            $cita->setId_trabajador($_POST["selectTrabajador"]);
            $cita->setFecha($_POST["txtFecha"]);
            $cita->setDetalle($_POST["txtDetalle"]);
            $cita->guardar();
        } else {
            echo("<h1 class = 'text-center' style = 'color: red'>ERROR AL GUARDAR LA CITA, VIRIFICA TU DIRECCIÓN DE EMAIL!!!</h1>");
        }
    } else if (isset($_POST["btnTermina"])) {
        include '../Clases/cita.php';
        $cita = new cita();
        $cita->setId_cita($_POST["idCita"]);
        $cita->elimiar();
    }
}
