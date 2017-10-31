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
    private $altura;
    private $peso;
    private $cuello;
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
        $this->altura = "";
        $this->pecho = "";
        $this->cuello = "";
        $this->hombros = "";
        $this->pecho = "";
        $this->cintura = "";
        $this->antebrazo = "";
        $this->muzlo = "";
        $this->pantorrillas = "";
        $this->biceps = "";
        $this->gluteos = "";
        $this->cadera = "";
    }

    /**
     * Metodo guarda el trabador que recibe por interfaz a MySQL
     * @return string si es exito o no
     */
    public function guardarUsuario() {
        include "conexion.php";
        $data = file_get_contents($this->foto['tmp_name']);
        $data = mysql_real_escape_string($data);
        $sql = "INSERT INTO usuario(nombre, apellidos, foto, direccion, usuario, genero, contrasenna, edad, cedula, telefono, email, altura, peso, cuello, hombros, pecho, cintura, antebrazo, muslo, pantorrillas, biceps, gluteos, cadera) VALUES ('$this->nombre','$this->apellidos','$data','$this->direccion','$this->usuario','$this->genero', '$this->contrasenna','$this->edad','$this->cedula','$this->telefono','$this->mail','$this->altura','$this->peso','$this->cuello','$this->hombros','$this->pecho','$this->cintura','$this->antebrazo','$this->muzlo','$this->pantorrillas','$this->biceps','$this->gluteos','$this->cadera')";
        if ($con->query($sql)) {
            $con->close();
            return "<script>alert(\"Bien. Su usuario se guardo correctamente ;-)\");window.location='../index.php';</script>";
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
        $sql = "SELECT * FROM usuario WHERE (usuario='$this->usuario' or email='$this->mail') and contrasenna='$this->contrasenna'";
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
            $state = true;
        }
        return $state;
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

    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function getCuello() {
        return $this->cuello;
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

    function getCatera() {
        return $this->cadera;
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

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setCuello($cuello) {
        $this->cuello = $cuello;
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

    function setCatera($catera) {
        $this->cadera = $catera;
    }

}
