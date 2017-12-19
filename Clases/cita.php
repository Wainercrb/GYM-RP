<?php

class cita {

    private $id_cita;
    private $id_usuario;
    private $id_trabajador;
    private $fecha;
    private $detalle;

    function __construct() {
        $this->id_cita = 0;
        $this->id_usuario = 0;
        $this->id_trabajador = 0;
        $this->fecha = "";
        $this->detalle = "";
    }

    public function guardar() {
        include "conexion.php";
        $sql = "INSERT INTO cita(id_usuario, id_trabajador, fecha, detalles, estado) VALUES ('$this->id_usuario','$this->id_trabajador','$this->fecha','$this->detalle', 'pendiente')";
        if ($con->query($sql) === FALSE) {
            echo mysqli_error($con);
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else {
            print "<script>alert(\"Bien. Cita guardada\");window.location='../citasUsuario.php';</script>";
        }
    }
    
    public function elimiar() {
        include "conexion.php";
        $sql = "DELETE FROM `cita` WHERE id_cita = '$this->id_cita'";
        if ($con->query($sql) === FALSE) {
            echo mysqli_error($con);
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else {
            print "<script>alert(\"Bien. Cita terminada\");window.location='../citasTrabajador.php';</script>";
        }
    }
    
    public function aprobada() {
        include "conexion.php";
        $sql = "UPDATE cita SET estado = 'Aprobada' WHERE id_cita = '$this->id_cita'";
        if ($con->query($sql) === FALSE) {
            echo mysqli_error($con);
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else {
            print "<script>alert(\"Bien. Cita Actualizada\");window.location='../citasTrabajador.php';</script>";
        }
    }
    
    public function rechazar() {
        include "conexion.php";
        $sql = "UPDATE cita SET estado = 'Rechazada' WHERE id_cita = '$this->id_cita'";
        if ($con->query($sql) === FALSE) {
            echo mysqli_error($con);
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else {
            print "<script>alert(\"Bien. Cita Actualizada\");window.location='../citasTrabajador.php';</script>";
        }
    }

    function getId_cita() {
        return $this->id_cita;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setId_cita($id_cita) {
        $this->id_cita = $id_cita;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

}

?>
