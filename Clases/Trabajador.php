<?php

class trabajador {

    private $id_trabajador;
    private $foto;
    private $nombre;
    private $apellidoUno;
    private $apellidoDos;
    private $cedula;
    private $telefono;
    private $direccion;
    private $email;
    private $rol;
    private $usuario;
    private $contrasenna;

    function __construct() {
        $this->foto = "";
        $this->id_trabajador = 0;
        $this->nombre = "";
        $this->apellidoUno = "";
        $this->apellidoDos = "";
        $this->cedula = "";
        $this->telefono = "";
        $this->direccion = "";
        $this->rol = "";
        $this->usuario = "";
        $this->contrasenna = "";
        $this->email = "";
    }

    /**
     * Metodo guarda el trabajador que recibe por parametro
     * @return string si es exitoso o no
     */
    public function guardarTrabajador() {
        include "conexion.php";
        $data = file_get_contents($this->foto['tmp_name']);
        $data = mysql_real_escape_string($data);
        $sql = "INSERT INTO trabajador(nombre, foto, apellidoUno, apellidoDos, cedula, telefono, direccion, email,  rol, usuario, contrasenna) VALUES ('$this->nombre', '$data', '$this->apellidoUno', '$this->apellidoDos', '$this->cedula', '$this->telefono', '$this->direccion', '$this->email', '$this->rol', '$this->usuario', '$this->contrasenna')";
        if ($con->query($sql)) {
            $con->close();
            return "<script>alert(\"Bien. Empleado se guardo correctamente :)\");window.location='../RegistroTrabajador.php';</script>";
        } else {
            return "<script>alert(\"Error al agregar el el trabajador :(, detalles: " . mysqli_error($con) . "\");window.location='../RegistroTrabajador.php';</script>";
        }
    }

    /**
     * Metodo verifica si hay un usuario con el correo o usuario ya registrado en la base de datos
     * @return boolean true si hay datos igules, false si no hay concidencia
     */
    public function isTrabajadorExiste() {
        include "conexion.php";
        $registrado = FALSE;
        $sql = "select * from trabajador where usuario = '$this->usuario' or email = '$this->email'";
        if (!$query = $con->query($sql)) {
            $con->close();
            return print "<script>alert(\"Error al verficar trabajador existente " . mysqli_error($con) . "\");window.location='../RegistroTrabajador.php';</script>";
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
    public function cargarTrabajador() {
        $state = false;
        include "conexion.php";
        $sql = "SELECT t.id_trabajador, t.nombre, t.apellidoUno, t.apellidoDos, t.foto, t.email, t.usuario, t.contrasenna,l.nombre as nombre_local, l.id_local FROM trabajador t, locales l, gym_admin gd WHERE gd.id_local = l.id_local AND gd.id_admin = t.id_trabajador AND (t.usuario = '$this->usuario' or t.email='$this->email') and t.contrasenna='$this->contrasenna' and (t.rol = 'Admin' or t.rol = 'Nutricionista' or t.rol = 'Entrenador')";
        if (!$query = $con->query($sql)) {
            die("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
            return;
        }
        while ($row = $query->fetch_array()) {
            session_start();
            $_SESSION['ID'] = $row["id_trabajador"];
            $_SESSION['NOMBRE'] = $row["nombre"];
            $_SESSION['APELLIDOS'] = $row["apellidoUno"]. " " . $row["apellidoDos"];
            $_SESSION['FOTO'] = $row["foto"];
            $_SESSION['EMAIL'] = $row["email"];
            $_SESSION['USUARIO'] = $row["usuario"];
            $_SESSION['CONTRASENNA'] = $row["contrasenna"];
            $_SESSION['TIPOUSUARIO'] = "trabajador";
            $_SESSION['IDTIENDA'] = $row["id_local"];
            $_SESSION['NOMBRETIENDA'] = $row["nombre_local"];
            $_SESSION["EDIT"] = "FALSE";
            $_SERVER["wianer"] = "wainer";
            $state = true;;
        }
        return $state;
    }

    private function editarTrabajador() {
        
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoUno() {
        return $this->apellidoUno;
    }

    function getApellidoDos() {
        return $this->apellidoDos;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getRol() {
        return $this->rol;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasenna() {
        return $this->contrasenna;
    }
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    
    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoUno($apellidoUno) {
        $this->apellidoUno = $apellidoUno;
    }

    function setApellidoDos($apellidoDos) {
        $this->apellidoDos = $apellidoDos;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }

}
