<?php

class Rutina {

    private $id_rutina;
    private $lugar_tonificar;
    private $equipo;
    private $tipo_ejercicio;
    private $sessiones;
    private $repeticiones;
    private $fecha;
    private $usuario;

    function __construct() {
        $this->id_rutina = 0;
        $this->lugar_tonificar = "";
        $this->equipo = "";
        $this->tipo_ejercicio = "";
        $this->sessiones = 0;
        $this->repeticiones = 0;
        $this->fecha = "";
        $this->usuario = "";
    }

    public function guardarRutina() {
        include "conexion.php";
        $sql = "INSERT INTO rutina(lugar_tonificar, equipo, tipo_ejercicio, session, repeticiones, id_usuario, fecha) VALUES ('$this->lugar_tonificar','$this->equipo','$this->tipo_ejercicio','$this->sessiones','$this->repeticiones','$this->usuario', NOW())";
        if ($con->query($sql) === FALSE) {
            echo mysqli_error($con);
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
    }

    public function eliminarRutina() {
        include "conexion.php";
        $sql = "DELETE FROM `rutina` WHERE id_rutina = $this->id_rutina";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Rutina eliminada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }
     public function actualizarRutina() {
        include "conexion.php";
        $sql = "UPDATE `rutina` SET `lugar_tonificar`= '$this->lugar_tonificar',`equipo`='$this->equipo',`tipo_ejercicio`='$this->tipo_ejercicio',`session`='$this->sessiones',`repeticiones`='$this->repeticiones',`fecha`= '$this->fecha' WHERE id_rutina = $this->id_rutina";
        if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Rutina actualizada\");window.location='../mantenimintoHistorial.php';</script>";
        }
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getId_rutina() {
        return $this->id_rutina;
    }

    function getLugar_tonificar() {
        return $this->lugar_tonificar;
    }

    function getEquipo() {
        return $this->equipo;
    }

    function getTipo_ejercicio() {
        return $this->tipo_ejercicio;
    }

    function getSessiones() {
        return $this->sessiones;
    }

    function getRepeticiones() {
        return $this->repeticiones;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_rutina($id_rutina) {
        $this->id_rutina = $id_rutina;
    }

    function setLugar_tonificar($lugar_tonificar) {
        $this->lugar_tonificar = $lugar_tonificar;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    function setTipo_ejercicio($tipo_ejercicio) {
        $this->tipo_ejercicio = $tipo_ejercicio;
    }

    function setSessiones($sessiones) {
        $this->sessiones = $sessiones;
    }

    function setRepeticiones($repeticiones) {
        $this->repeticiones = $repeticiones;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}

?>
