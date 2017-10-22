<?php
// if(!empty($_POST)){
//     if($_POST["txtId"] != "0"){
//         print "<script>alert(\"Erro. Actualmente estas logeado, debes cerrar session para poder registrate\");window.location='../registroUsuario.php';</script>";
//         return;
//     }
if(isset($_POST["txtName"]) &&isset($_POST["txtSurnames"])  &&isset($_POST["txtAdress"]) &&isset($_POST["txtId"]) &&isset($_POST["txtPhone"]) &&isset($_POST["txtEmail"]) &&isset($_POST["txtUser"]) &&isset($_POST["txtConfPass"]) &&isset($_POST["txtAge"]) &&isset($_POST["txtHeight"]) &&isset($_POST["txtNeck"]) &&isset($_POST["txtShoulders"]) &&isset($_POST["txtChest"]) &&isset($_POST["txtWaist"]) &&isset($_POST["txtForearms"]) &&isset($_POST["txtThigh"]) &&isset($_POST["txtCalves"])&&isset($_POST["txtBiceps"]) &&isset($_POST["txtButtocks"]) &&isset($_POST["txtHips"]))
{
    include "conexion.php";
    $found=false;
    $sql1= "select * from usuario where usuario=\"$_POST[txtUser]\" or email=\"$_POST[txtEmail]\"";
    $query = $con->query($sql1);
    while ($r=$query->fetch_array())
    {
        $found=true;
        break;
    }
    if($found)
    {
        print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");</script>";
        return;
    }
    $data = file_get_contents($_FILES['image']['tmp_name']);
    $data = mysqli_real_escape_string($data);
    $sql = "INSERT INTO usuario(nombre, apellidos, foto, direccion, usuario, genero, contrasenna, edad, cedula, telefono, email, altura, peso, cuello, hombros, pecho, cintura, antebrazo, muslo, pantorrillas, biceps, gluteos, cadera) VALUES (\"$_POST[txtName]\",\"$_POST[txtSurnames]\",'$data',\"$_POST[txtAdress]\",\"$_POST[txtUser]\",\"$_POST[cbGenero]\", \"$_POST[txtConfPass]\",\"$_POST[txtAge]\",\"$_POST[txtId]\",\"$_POST[txtPhone]\",\"$_POST[txtEmail]\",\"$_POST[txtHeight]\",\"$_POST[txtWeight]\" ,\"$_POST[txtNeck]\",\"$_POST[txtShoulders]\",\"$_POST[txtChest]\",\"$_POST[txtWaist]\",\"$_POST[txtForearms]\",\"$_POST[txtThigh]\",\"$_POST[txtCalves]\",\"$_POST[txtBiceps]\",\"$_POST[txtButtocks]\",\"$_POST[txtHips]\")";
    $query = $con->query($sql);
    if($query!=null)
    {
        $con->close();
        print "<script>alert(\"Registro exitoso. Puede ingresar ingresar su usuario desde la barra de de accesos\");window.location='../registerUsuario.php';</script>";
    }
    echo("Error description: " . mysqli_error($con));
}
?>