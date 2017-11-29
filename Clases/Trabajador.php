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
    public function guardarTrabajador($id_tienda) {
        include "conexion.php";
        $data = file_get_contents($this->foto['tmp_name']);
        $data = mysql_real_escape_string($data);
        $sql = "INSERT INTO trabajador(nombre, foto, apellidoUno, apellidoDos, cedula, telefono, direccion, email,  rol, usuario, contrasenna) VALUES ('$this->nombre', '$data', '$this->apellidoUno', '$this->apellidoDos', '$this->cedula', '$this->telefono', '$this->direccion', '$this->email', '$this->rol', '$this->usuario', '$this->contrasenna')";
        if ($con->query($sql)) {
            $last_id = $con->insert_id;
            $sql = "INSERT INTO gym_admin(id_local, id_admin)VALUES ('$id_tienda','$last_id')";
            echo $sql;
            if ($con->query($sql)) {
                $con->close();
                return "<script>alert(\"Bien. Empleado se guardo correctamente :)\");window.location='../RegistroTrabajador.php';</script>";
            }
        }
        return "<script>alert(\"Error al agregar el el trabajador :(, detalles: " . mysqli_error($con) . "\");window.location='../RegistroTrabajador.php';</script>";
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
        $sql = "SELECT t.id_trabajador, t.nombre, t.rol, t.apellidoUno, t.apellidoDos, t.foto, t.email, t.usuario, t.contrasenna,l.nombre as nombre_local, l.id_local FROM trabajador t, locales l, gym_admin gd WHERE gd.id_local = l.id_local AND gd.id_admin = t.id_trabajador AND (t.usuario = '$this->usuario' or t.email='$this->email') and t.contrasenna='$this->contrasenna'";
        if (!$query = $con->query($sql)) {
            die("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
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
            $_SESSION['TIPOUSUARIO'] = $row["rol"];
            $_SESSION['IDTIENDA'] = $row["id_local"];
            $_SESSION['NOMBRETIENDA'] = $row["nombre_local"];
            $state = true;
        }
        return $state;
    }

    public function cargarTrabajadorNoShop() {
        $state = false;
        include "conexion.php";
        $sql = "SELECT * FROM trabajador WHERE usuario = '$this->usuario' AND contrasenna = '$this->contrasenna' AND rol = 'admin'";
        if (!$query = $con->query($sql)) {
            die("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
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
            $_SESSION['TIPOUSUARIO'] = $row["rol"];
            $_SESSION['IDTIENDA'] = "";
            $_SESSION['NOMBRETIENDA'] = "";
            $state = true;
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

    public function actualizarTrabajador() {
        include '../php/conexion.php';
        $sql="UPDATE `trabajador` SET `nombre`='$this->nombre',`apellidoUno`='$this->apellidoUno',`apellidoDos`='$this->apellidoDos',`cedula`='$this->cedula',`telefono`='$this->telefono',`direccion`='$this->direccion',`email`='$this->email',`rol`='$this->rol',`usuario`='$this->usuario',`contrasenna`='$this->contrasenna' WHERE id_trabajador=$this->id_trabajador";
         if ($con->query($sql) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        } else if (true) {
            print "<script>alert(\"Bien. Usuario actualizado\");window.location='../MantenimientoTrabajador.php';</script>";
        }
    }

    public function eliminarUsuario() {
          include "conexion.php";
        $sql1 = "DELETE FROM `gym_admin` WHERE id_admin =$this->id_trabajador";
        if ($con->query($sql1) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
        $sql2 = "DELETE FROM `trabajador` WHERE id_trabajador=$this->id_trabajador";

        if ($con->query($sql2) === FALSE) {
            die("<script>alert(\"Error description: " . mysqli_error($con) . "\");</script>");
        }
        print "<script>alert(\"Bien. usuario Eliminado correctamente\");window.location='../MantenimientoTrabajador.php';</script>";
    }

}
