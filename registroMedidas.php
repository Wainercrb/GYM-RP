<!DOCTYPE html>
<?php
if (!isset($_GET["id"])) {
    print "<script>alert(\"No se encontro el usuario registrado :(\");window.location='index.php';</script>";
    return;
}
$idUs = $_GET["id"];
$rIdU = 0;
$rNom = 0;

include './php/conexion.php';
$sql = "SELECT * from usuario where id_usuario = $idUs";
if (!$query = $con->query($sql)) {
    echo("Error description: " . mysqli_error($con));
    return;
}
while ($row = $query->fetch_array()) {
    $idUs = $row["id_usuario"];
    $rNom = $row["nombre"];
}
?>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/registroUsuario.css">
        <link rel="stylesheet" href="css/headerFooter.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <div class="login-wrap">
            <div class="login-html">
                <form role="form" action="php/Historial.php"  name="registroUsuario" id="prospects_form" method="post" enctype="multipart/form-data">
                    <legend><center><h2><b id="title-form">Médidas a <?php echo $rNom; ?> </b></h2></center></legend><br>

                    <input style="display: none" name="txtTrabajador" value="<?php echo $navbarId; ?>"/>
                    <input style="display: none" name="txtUsuario" value="<?php echo $rNom ?>"/>
                    <div class="login-form">
                        <div class="group">
                            <label for= "" class="label">Altura </label>
                            <input id="txtHeight" type="number" step=0.01 name="txtHeight" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for= "" class="label">Peso </label>
                            <input id="txtWeight" type="number" step=0.01 name="txtWeight" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">cuello</label>
                            <input id="txtNeck" type="number" step=0.01 name="txtNeck" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Hombros</label>
                            <input id="txtShoulders" type="number" step=0.01 name="txtShoulders" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Pecho</label>
                            <input id="txtChest" type="number" step=0.01 name="txtChest" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Cintura</label>
                            <input id="txtWaist" type="number" step=0.01 name="txtWaist" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Antebrazos</label>
                            <input id="txtForearms" type="number" step=0.01 name="txtForearms" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Muzlo</label>
                            <input id="txtThigh" type="number" step=0.01 name="txtThigh" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Pantorillas</label>
                            <input id="txtCalves" type="number" step=0.01 name="txtCalves" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Bíceps</label>
                            <input id="txtBiceps" type="number" step=0.01 name="txtBiceps" class="input" REQUIRED >
                        </div>
                        <div class="group">
                            <label for="" class="label">Gluteos</label>
                            <input id="txtButtocks" type="number" step=0.01 name="txtButtocks" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="" class="label">Cadera</label>
                            <input id="txtHips" type="number" step=0.01 name="txtHips" class="input" REQUIRED >
                        </div>
                        <div class="group">
                            <label for="" class="label">Masa Corporal</label>
                            <input id="txtMusleMass" type="number" class="input">
                        </div>
                        <div class="group">
                            <input  id="pass" type="submit"  class="button" value="Agregar medidas">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/MyJS/historial.js"></script>
</body>
</html>