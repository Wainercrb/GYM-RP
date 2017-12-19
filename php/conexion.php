<?php
$host = "127.0.0.1";
$obj = "root";
$password = "";
$db = "db_gyms";
$con = new mysqli($host, $obj, $password, $db);
if ($con->connect_error) {
    die("Error al conectar, más detalles: " . $con->connect_error);
}
//print "<script>alert(\"conexion\")</script>";
?>
