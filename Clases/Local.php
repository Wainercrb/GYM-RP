<?php

class local {

    private $id_local;
    private $foto;
    private $nombre;
    private $puntuacionMas;
    private $puntuacionMenos;
    private $telefono;
    private $email;
    private $latitud;
    private $longitud;

    function __construct() {
        $this->id_local = 0;
        $this->foto = "";
        $this->nombre = "";
        $this->telefono = "";
        $this->email = "";
        $this->latitud = "";
        $this->longitud = "";
        $this->puntuacionMas = 0;
        $this->puntuacionMenos = 0;
    }

    /**
     * Metodo guarda el local que recibe por parametro
     * @return string si es exitoso o no
     */
    public function guardarLocal($idAdministrador) {
        include "conexion.php";
        $data = file_get_contents($this->foto['tmp_name']);
        $data = mysql_real_escape_string($data);
        $sql = "INSERT INTO locales(nombre, telefono, email, puntuacionMas, puntuacionMenos, latitud, longitud) VALUES ('$this->nombre','$this->telefono','$this->email','0','0','$this->latitud','$this->longitud')";
        if ($con->query($sql)) {
            $last_id = $con->insert_id;
            $sql = "INSERT INTO gym_admin(id_local, id_admin) VALUES ('$last_id','$idAdministrador')";
            if ($con->query($sql)) {
                $con->close();
                return "<script>alert(\"Bien. Nuevo local agregado correctamente :)\");window.location='../index.php';</script>";
            } else {
                return "<script>alert(\"Error al agregar el local :(, detalles: " . mysqli_error($con) . "\");window.location='../RegistroGym.php';</script>";
            }
        } else {
            return "<script>alert(\"Error al agregar el local :(, detalles: " . mysqli_error($con) . "\");window.location='../RegistroGym.php';</script>";
        }
    }

    /**
     * Metodo verifica si hay un local con el correo o usuario ya registrado en la base de datos
     * @return boolean true si hay datos igules, false si no hay concidencia
     */
    public function isLocalExiste() {
        include "conexion.php";
        $registrado = FALSE;
        $sql = "select * from locales where nombre = '$this->nombre'";
        if (!$query = $con->query($sql)) {
            $con->close();
//            return print "<script>alert(\"Error al verficar si hay un local con los mismo datos. Detalles" . mysqli_error($con) . "\");window.location='../RegistroTrabajador.php';</script>";
        }
        while ($r = $query->fetch_array()) {
            $registrado = TRUE;
        }
        return $registrado;
    }

    /**
     * Metodo carga el trabajador por usuario
     * @return boolean true si esta, false se no.
     */
    public function cargarLocal() {
        $state = false;
        include "conexion.php";
        $sql = "SELECT * FROM trabajador WHERE (usuario = '$this->usuario' or email='$this->email') and contrasenna='$this->contrasenna' and (rol = 'Admin' or rol = 'Nutricionista' or rol = 'Entrenador')";
        if (!$query = $con->query($sql)) {
            echo("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
            return;
        }
        while ($row = $query->fetch_array()) {
            session_start();
            $_SESSION['ID'] = $row["id_trabajador"];
            $_SESSION['NOMBRE'] = $row["nombre"];
            $_SESSION['APELLIDOS'] = $row["apellidoUno"] . " " . $row["apellidoDos"];
            $_SESSION['FOTO'] = $row["foto"];
            $_SESSION['EMAIL'] = $row["email"];
            $_SESSION['USUARIO'] = $row["usuario"];
            $_SESSION['CONTRASENNA'] = $row["contrasenna"];
            $_SESSION['TIPOUSUARIO'] = "trabajador";
            $_SESSION["EDIT"] = "FALSE";
            $state = true;
        }
        return $state;
    }

    public function editarLike($id_local) {
        include "conexion.php";
        $sql = "UPDATE locales SET puntuacionMas = '$this->puntuacionMas'  WHERE id_local = $id_local";
        if (!$con->query($sql)) {
            $con->close();
            die("<script>alert(\"Error al aagregar la calificacion del gym :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    public function editarDeslike($id_local) {

        include "conexion.php";
        $sql = "UPDATE locales SET puntuacionMenos = '$this->puntuacionMenos'  WHERE id_local = $id_local";
        if (!$con->query($sql)) {
            $con->close();
            die("<script>alert(\"Error al aagregar la calificacion del gym :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    public function quitarLike($id_local, $puntualcion) {
        include "conexion.php";
        $sql = "UPDATE locales SET puntuacionMas = '$puntualcion'  WHERE id_local = $id_local";
        if (!$con->query($sql)) {
            $con->close();
            die("<script>alert(\"Error al aagregar la calificacion del gym :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    public function quitarDeslike($id_local, $puntuacion) {
        include "conexion.php";
        $sql = "UPDATE locales SET puntuacionMenos = '$puntuacion'  WHERE id_local = $id_local";
        if (!$con->query($sql)) {
            $con->close();
            die("<script>alert(\"Error al aagregar la calificacion del gym :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    public function actualizar() {

        include "conexion.php";
        $sql = "UPDATE locales SET nombre = '$this->nombre', telefono = '$this->telefono', email = '$this->email' WHERE id_local = $this->id_local";         
        if ($query = $con->query($sql)) {
            $con->close();
            die("<script>alert(\"GYM actualzada\");window.location='../MantenimientoGym.php';</script>");
        } else {
            die("<script>alert(\"Error al actulizar al actualiar el GYM" . mysqli_error($con) . "\");window.location='../MantenimientoGym.php';</script>");
        }
    }

    function getPuntuacionMas() {
        return $this->puntuacionMas;
    }

    function getPuntuacionMenos() {
        return $this->puntuacionMenos;
    }

    function setPuntuacionMas($puntuacionMas) {
        $this->puntuacionMas = $puntuacionMas;
    }

    function setPuntuacionMenos($puntuacionMenos) {
        $this->puntuacionMenos = $puntuacionMenos;
    }

    function getId_local() {
        return $this->id_local;
    }

    function getFoto() {
        return $this->foto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function setId_local($id_local) {
        $this->id_local = $id_local;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

}
