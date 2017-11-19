<?php

class Comida {

    private $id_comida;
    private $cantidad;
    private $nombre;
    private $hora;
    private $fecha;
    private $id_trabajador;

    function __construct() {
        $this->id_comida = 0;
        $this->cantidad = 0;
        $this->nombre = "";
        $this->hora = "";
        $this->fecha = "";
        $this->id_trabajador = 0;
    }

    public function guardar() {
        include "conexion.php";
        $sql = "INSERT INTO comida(tipo_comida, estado, hora, fecha, id_trabajador) VALUES ('$this->id_comida','pendiente','$this->hora','$this->fecha','$this->id_trabajador')";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function getId_comida() {
        return $this->id_comida;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getHora() {
        return $this->hora;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_comida($id_comida) {
        $this->id_comida = $id_comida;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}

?>
