<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])) {
	echo "wainer";
}
function func() {
	// do stuff
}
//Metodo para verificar el usuario
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnLogin'])) {
	if (!empty($_POST)) {
		$tipo;
		if (isset($_POST["txtUser"]) && isset($_POST["txtPass"])) {
			if ($_POST["txtUser"] != "" && $_POST["txtPass"] != "") {
				include "conexion.php";
				$user_id = null;
				$sql1    = "select * from usuario where (nombre=\"$_POST[txtUser]\" or email=\"$_POST[txtUser]\") and contrasenna=\"$_POST[txtPass]\" ";
				$query   = $con->query($sql1);
				while ($r = $query->fetch_array()) {
					$user_id = $r["id_usuario"];
					$tipo    = "u";
				}
				if ($user_id == null) {
					$sql1  = "select * from tienda where (nombre=\"$_POST[txtUser]\" or email=\"$_POST[txtUser]\") and contrasenna=\"$_POST[txtPass]\" ";
					$query = $con->query($sql1);
					while ($r = $query->fetch_array()) {
						$user_id = $r["id_tienda"];
						$tipo    = "t";
					}
				}
				$con->close();
				$a = $_POST[archiveName];
				if ($user_id == null) {
					print"<script>alert(\"Usuario incorrecto, verifique sus datos.\");window.location='../';</script>";
				} else {
					print"<script>window.location='../registroUsuario?id=$user_id.&tipo=$tipo';</script>";
				}
			}
		}
	}

}

?>