<?php

class usuario {

    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $foto;
    private $direccion;
    private $usuario;
    private $genero;
    private $contrasenna;
    private $edad;
    private $cedula;
    private $telefono;
    private $mail;

    function __construct() {
        $this->id_usuario = 0;
        $this->nombre = "";
        $this->apellidos = "";
        $this->foto = "";
        $this->direccion = "";
        $this->usuario = "";
        $this->genero = "";
        $this->contrasenna = "";
        $this->edad = "";
        $this->cedula = "";
        $this->telefono = "";
        $this->mail = "";
    }

    /**
     * Metodo guarda el trabador que recibe por interfaz a MySQL
     * @return string si es exito o no
     */
    public function guardarUsuario($idLocal) {
        include "conexion.php";
        $data = file_get_contents($this->foto['tmp_name']);
        $data = mysql_real_escape_string($data);
        $sql = "INSERT INTO usuario(nombre, apellidos, foto, direccion, usuario, genero, contrasenna, edad, cedula, telefono, email,califico, estado) VALUES ('$this->nombre','$this->apellidos','$data','$this->direccion','$this->usuario','$this->genero', '$this->contrasenna','$this->edad','$this->cedula','$this->telefono','$this->mail', 'califico', 'activo')";
        if ($con->query($sql)) {
            $last_id = $con->insert_id;
            $sql = "INSERT INTO gym_pesona(id_gym, id_persona) VALUES ('$idLocal','$last_id')";
            if ($con->query($sql)) {
                $con->close();
                return "<script>alert(\"Bien. Procesa a agregar las medias inicales de este cliente:)\");window.location='../registroMedidas.php?id=$last_id';</script>";
            } else {
                return "<script>alert(\"Error al agregar el nuevo usuario :(. Detalles: " . mysqli_error($con) . "\");window.location='../RegistroGym.php';</script>";
            }
        } else {
            return "<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>";
        }
    }

    /**
     * metodo verifica si el usuario existe
     * @return boolean
     * 
     */
    public function isUsuarioExiste() {
        include "conexion.php";
        $registrado = FALSE;
        $sql = "select * from usuario where usuario='$this->usuario' or email='$this->mail'";
        if (!$query = $con->query($sql)) {
            $con->close();
            return print "<script>alert(\"Error al verficar usuario existente " . mysqli_error($con) . "\");window.location='../index.php';</script>";
        }
        while ($r = $query->fetch_array()) {
            $registrado = TRUE;
        }
        return $registrado;
    }

    /**
     * Metodo carga el usuario del login
     */
    public function cargarUsuario() {
        $state = false;
        include "conexion.php";
        $sql = "SELECT u.id_usuario, u.nombre, u.apellidos, u.edad,  u.foto, u.email, u.usuario, u.contrasenna, l.nombre as nombre_local, l.id_local FROM usuario u, locales l, gym_pesona gp WHERE gp.id_gym = l.id_local AND gp.id_persona = u.id_usuario AND (u.usuario='$this->usuario' or u.email='$this->mail') and u.contrasenna='$this->contrasenna';";
        if (!$query = $con->query($sql)) {
            echo("Error description: " . mysqli_error($con));
            return;
        }
        while ($row = $query->fetch_array()) {
            session_start();
            $_SESSION['ID'] = $row["id_usuario"];
            $_SESSION['NOMBRE'] = $row["nombre"];
            $_SESSION['APELLIDOS'] = $row["apellidos"];
            $_SESSION['FOTO'] = $row["foto"];
            $_SESSION['EMAIL'] = $row["email"];
            $_SESSION['USUARIO'] = $row["usuario"];
            $_SESSION['CONTRASENNA'] = $row["contrasenna"];
            $_SESSION['TIPOUSUARIO'] = "user";
            $_SESSION['EDAD'] = $row["edad"];
            $_SESSION["EDIT"] = "FALSE";
            $_SESSION['IDTIENDA'] = $row["id_local"];
            $_SESSION['NOMBRETIENDA'] = $row["nombre_local"];
            $state = true;
        }
        return $state;
    }

    public function voto($id_usuario) {
        $state = "";
        include "conexion.php";
        $sql = "SELECT califico FROM usuario WHERE id_usuario = $id_usuario";
        if (!$query = $con->query($sql)) {
            die("Error description: " . mysqli_error($con));
        }
        while ($row = $query->fetch_array()) {
            $state = $row["califico"];
        }
        return $state;
    }

    public function calificoTrue($id_usuario) {
        include "conexion.php";
        $sql = "UPDATE usuario SET califico='like' WHERE id_usuario = $id_usuario";
        if (!$con->query($sql)) {
            die("<script>alert(\"Error al agregar el local :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    public function calificoFalse($id_usuario) {
        include "conexion.php";
        $sql = "UPDATE usuario SET califico='deslike' WHERE id_usuario = $id_usuario";
        if (!$con->query($sql)) {
            die("<script>alert(\"Error al agregar el local :(, detalles: " . mysqli_error($con) . "\");window.location='../MiHistorial.php';</script>");
        }
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFoto() {
        return $this->foto;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getGenero() {
        return $this->genero;
    }

    function getContrasenna() {
        return $this->contrasenna;
    }

    function getEdad() {
        return $this->edad;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getMail() {
        return $this->mail;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setContrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

}
