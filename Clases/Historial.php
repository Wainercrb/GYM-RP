<?php

class Historial {

    private $id_historial;
    private $id_trabajador;
    private $id_usuario;
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

    function __construct() {
        $this->id_historial = 0;
        $this->id_trabajador = 0;
        $this->id_usuario = 0;
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
    }

    public function guardar() {
        include "conexion.php";
        $sql = "INSERT INTO historial(id_usuario, id_trabajador, peso, altura, cuello, hombros, pecho, cintura, antebrazo, muslo, pantorrillas, biceps, gluteos, cadera) VALUES ('$this->id_usuario','$this->id_trabajador','$this->peso','$this->alura','$this->cuello','$this->hombros','$this->pecho','$this->cintura','$this->antebrazo','$this->muzlo','$this->pantorrillas','$this->biceps','$this->gluteos','$this->cadera')";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
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

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getPeso() {
        return $this->peso;
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