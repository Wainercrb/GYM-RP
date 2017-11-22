<?php
include '../Clases/Usuario.php';
include '../Clases/Local.php';
$usuario = new usuario();
$local = new local();
$votos = 0;
session_start();
$accion = $usuario->voto($_SESSION['ID']);
if ($accion === "like" && isset($_REQUEST["btnLike"]) || $accion === "deslike" && isset($_REQUEST["btnDeslike"])) {
    print "<script>alert(\"Error, ya has hecho esta calificación\");window.location='../MiHistorial.php';</script>";
    return;
}
if (isset($_REQUEST["btnLike"]) || isset($_REQUEST["btnDeslike"])) {
    if ($accion === "califico") {
        if (isset($_REQUEST["btnLike"])) {
            $local->setPuntuacionMas($_REQUEST["like"] + 1);
            $local->editarLike($_SESSION["IDTIENDA"]);
            $usuario->calificoTrue($_SESSION['ID']);
        } else if (isset($_REQUEST["btnDeslike"])) {
            $local->setPuntuacionMenos($_REQUEST["deslike"] + 1);
            $local->editarDeslike($_SESSION["IDTIENDA"]);
            $usuario->calificoFalse($_SESSION['ID']);
        }
    } else if ($accion === "like") {
        $votos = $_REQUEST["like"];
        $votos--;
        $local->quitarLike($_SESSION["IDTIENDA"], $votos);
        if (isset($_REQUEST["btnLike"])) {
            $local->setPuntuacionMas($_REQUEST["like"] + 1);
            $local->editarLike($_SESSION["IDTIENDA"]);
            $usuario->calificoTrue($_SESSION['ID']);
        } else if (isset($_REQUEST["btnDeslike"])) {
            $local->setPuntuacionMenos($_REQUEST["deslike"] + 1);
            $local->editarDeslike($_SESSION["IDTIENDA"]);
            $usuario->calificoFalse($_SESSION['ID']);
        }
    } else if ($accion === "deslike") {
        $votos = $_REQUEST["deslike"];
        $votos--;
        $local->quitarDeslike($_SESSION["IDTIENDA"], $votos);
        if (isset($_REQUEST["btnLike"])) {
            $local->setPuntuacionMas($_REQUEST["like"] + 1);
            $local->editarLike($_SESSION["IDTIENDA"]);
            $usuario->calificoTrue($_SESSION['ID']);
        } else if (isset($_REQUEST["btnDeslike"])) {
            $local->setPuntuacionMenos($_REQUEST["deslike"] + 1);
            $local->editarDeslike($_SESSION["IDTIENDA"]);
            $usuario->calificoFalse($_SESSION['ID']);
        }
    }
    print "<script>alert(\"Has calificado el GYM\");window.location='../MiHistorial.php';</script>";
}
?>

