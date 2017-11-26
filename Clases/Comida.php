<?php

class Comida {

    private $id_comida;
    private $cantidad;
    private $nombre;
    private $hora;
    private $fecha;
    private $id_trabajador;
    private $id_usuario;
    private $detalles;
    private $estado;

    function __construct() {
        $this->id_comida = 0;
        $this->cantidad = 0;
        $this->nombre = "";
        $this->hora = "";
        $this->fecha = "";
        $this->id_trabajador = 0;
        $this->id_usuario = 0;
        $this->detalles = "";
        $this->estado = "";
    }

    public function guardar() {
        include "conexion.php";
        $sql = "INSERT INTO comida(id_usuario, tipo_comida, estado, hora, fecha, id_trabajador, detalles) VALUES ('$this->id_usuario', '$this->nombre','pendiente','$this->hora','$this->fecha','$this->id_trabajador', '$this->detalles')";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
    }

    public function eliminarComida() {
        include "conexion.php";
        $sql = "DELETE FROM `comida` WHERE id_comida = $this->id_comida";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Comida eliminada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }

    public function actualizarComida() {
        include "conexion.php";
        $sql = "UPDATE `comida` SET `tipo_comida`='$this->nombre',`estado`='$this->estado',`hora`='$this->hora',`fecha`='$this->fecha', `detalles`='$this->detalles' WHERE id_comida = $this->id_comida";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Comida actualizada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function getDetalles() {
        return $this->detalles;
    }

    function setDetalles($detalles) {
        $this->detalles = $detalles;
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
