<?php

class Historial {

    private $id_historial;
    private $id_trabajador;
    private $usuario;
    private $peso;
    private $cuello;
    private $alura;
    private $hombros;
    private $pecho;
    private $cintura;
    private $antebrazo;
    private $muzlo;
    private $pantorrillas;
    private $biceps;
    private $gluteos;
    private $cadera;
    private $fecha;

    function __construct() {
        $this->id_historial = 0;
        $this->id_trabajador = 0;
        $this->usuario = "";
        $this->peso = 0;
        $this->alura = 0;
        $this->cuello = 0;
        $this->hombros = 0;
        $this->pecho = 0;
        $this->cintura = 0;
        $this->antebrazo = 0;
        $this->muzlo = 0;
        $this->pantorrillas = 0;
        $this->biceps = 0;
        $this->gluteos = 0;
        $this->cadera = 0;
        $this->fecha = 0;
    }

    public function guardar() {
        include "conexion.php";
        $sql = "INSERT INTO historial(id_trabajador, usuario, peso, altura, cuello, hombros, pecho, cintura, antebrazo, muslo, pantorrillas, biceps, gluteos, cadera, fecha) VALUES ('$this->id_trabajador','$this->usuario','$this->peso','$this->alura','$this->cuello','$this->hombros','$this->pecho','$this->cintura','$this->antebrazo','$this->muzlo','$this->pantorrillas','$this->biceps','$this->gluteos','$this->cadera', NOW())";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
    }

    public function guardarMedidas() {
        include "conexion.php";
        $sql = "INSERT INTO historial(id_trabajador, usuario, peso, altura, cuello, hombros, pecho, cintura, antebrazo, muslo, pantorrillas, biceps, gluteos, cadera, fecha) VALUES ('$this->id_trabajador','$this->usuario','$this->peso','$this->alura','$this->cuello','$this->hombros','$this->pecho','$this->cintura','$this->antebrazo','$this->muzlo','$this->pantorrillas','$this->biceps','$this->gluteos','$this->cadera', NOW())";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else {
            print "<script>alert(\"Bien. Medias agregadas correctamante\");window.location='../Principal.php';</script>";
        }
    }

    public function eliminarHistorial() {
        include "conexion.php";
        $sql = "DELETE FROM `historial` WHERE id_historial= $this->id_historial";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Historial eliminada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }

    public function actualizarHistorial() {
        include "conexion.php";
        $sql = "UPDATE `historial` SET `peso`='$this->peso',`altura`='$this->alura',`cuello`='$this->cuello',`hombros`= '$this->hombros',`pecho`='$this->pecho',`cintura`='$this->cintura',`antebrazo`='$this->antebrazo',`muslo`='$this->muzlo',`pantorrillas`='$this->pantorrillas',`biceps`='$this->biceps',`gluteos`='$this->gluteos',`cadera`='$this->cadera',`fecha`='$this->fecha' WHERE id_historial = $this->id_historial";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Comida actualizada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }

    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function getCuello() {
        return $this->cuello;
    }

    function setCuello($cuello) {
        $this->cuello = $cuello;
    }

    function getId_historial() {
        return $this->id_historial;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getAlura() {
        return $this->alura;
    }

    function getHombros() {
        return $this->hombros;
    }

    function getPecho() {
        return $this->pecho;
    }

    function getCintura() {
        return $this->cintura;
    }

    function getAntebrazo() {
        return $this->antebrazo;
    }

    function getMuzlo() {
        return $this->muzlo;
    }

    function getPantorrillas() {
        return $this->pantorrillas;
    }

    function getBiceps() {
        return $this->biceps;
    }

    function getGluteos() {
        return $this->gluteos;
    }

    function getCadera() {
        return $this->cadera;
    }

    function setId_historial($id_historial) {
        $this->id_historial = $id_historial;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setAlura($alura) {
        $this->alura = $alura;
    }

    function setHombros($hombros) {
        $this->hombros = $hombros;
    }

    function setPecho($pecho) {
        $this->pecho = $pecho;
    }

    function setCintura($cintura) {
        $this->cintura = $cintura;
    }

    function setAntebrazo($antebrazo) {
        $this->antebrazo = $antebrazo;
    }

    function setMuzlo($muzlo) {
        $this->muzlo = $muzlo;
    }

    function setPantorrillas($pantorrillas) {
        $this->pantorrillas = $pantorrillas;
    }

    function setBiceps($biceps) {
        $this->biceps = $biceps;
    }

    function setGluteos($gluteos) {
        $this->gluteos = $gluteos;
    }

    function setCadera($cadera) {
        $this->cadera = $cadera;
    }

}

?>