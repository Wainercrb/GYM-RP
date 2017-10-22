<?php
 if(null!=($_POST["txtUsuario"]) && null!=($_POST["txtContraseña"]) && null!=($_POST["txtCedula"]) && null!=($_POST["txtNombre"]) && null!=($_POST["txtApellidoUno"]) &&null!=($_POST["txtApellidoDos"]) && null!=($_POST["txtDireccion"]) && null!=($_POST["txtTelefono"])){

 include "conexion.php";
 $found=false;
    $sql1= "select * from trabajador where usuario=\"$_POST[txtUsuario]\" or cedula=\"$_POST[txtCedula]\"";
    $query = $con->query($sql1);
    while ($r=$query->fetch_array())
    {
        $found=true;
        break;
    }
    if($found)
    {
        print "<script>alert(\"Nombre de usuario o cedula ya estan registrados.\");</script>";
        return;
    }
    $sql = "INSERT INTO trabajador(nombre,apellidoUno,apellidoDos,cedula,telefono,direccion,rol,usuario,contrasenna) VALUES (\"$_POST[txtNombre]\",\"$_POST[txtApellidoUno]\",\"$_POST[txtApellidoDos]\",\"$_POST[txtCedula]\",\"$_POST[txtTelefono]\", \"$_POST[txtDireccion]\",\"$_POST[combobox]\",\"$_POST[txtUsuario]\",\"$_POST[txtContraseña]\")";
    $query = $con->query($sql);
    if($query!=null)
    {
        $con->close();
        print "<script>alert(\"Registro exitoso. Puede ingresar ingresar su usuario desde la barra de de accesos\");window.location='../index.php';</script>";
    }
    echo("Error description: " . mysqli_error($con));

}
?>