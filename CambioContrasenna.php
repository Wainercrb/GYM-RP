<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>olvide mi contraseña</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/Login.css">
    </head>
    <body>
        <div class="row" id="login-main-div">
            <div class="login-wrap">
                <div class="login-html">
                    <div class="login-form">
                        <form role="form" action="php/cambioContrasenna.php" name="registroEmpleado" id="prospects_form" method="post" enctype="multipart/form-data">
                            <div class="sign-up-htm">
                                <legend><center><h2><b id="title-form">Salvar Contraseña</b></h2></center></legend><br>
                                <div class="login-form">
                                    <?php if (!isset($_GET["rs"])) { ?>
                                        <div class="group">
                                            <label for="user" class="label">Email o Usuairo</label>
                                            <input id="txtUsuario" type="text" step=0.01 name="txtUsuario" class="input" REQUIRED>
                                        </div>
                                        <br>
                                        <div class="group">
                                            <input id="pass" type="submit" name="btnVerificar" class="button" value="Verificar">
                                        </div>
                                        <?php
                                    } else {
                                        $email;
                                        if (isset($_GET['rs']) && isset($_GET['type']) && $_GET['type'] === "t") {
                                            include './php/conexion.php';
                                            $sql = "SELECT email FROM  trabajador WHERE id_trabajador = $_GET[rs]";
                                            if (!$query = $con->query($sql)) {
                                                die("Error description: " . mysqli_error($con));
                                            }
                                            while ($row = $query->fetch_array()) {
                                                $email = $row["email"];
                                            }
                                        } else if (isset($_GET['rs']) && isset($_GET["type"]) && $_GET['type'] === "u") {
                                            include './php/conexion.php';
                                            $sql = "SELECT email FROM  usuario WHERE id_usuario = $_GET[rs]";
                                            if (!$query = $con->query($sql)) {
                                                die("Error description: " . mysqli_error($con));
                                            }
                                            while ($row = $query->fetch_array()) {
                                                $email = $row["email"];
                                            }
                                        }
                                        ?>
                                        <div class="group">
                                            <label for="pass" class="label">Contraseña</label>
                                            <input id="txtUsuario" type="password" name="txtPass" class="input" REQUIRED>
                                        </div>
                                        <div class="group">
                                            <label for="conf" class="label">Confirme contraseña</label>
                                            <input id="txtUsuario" type="password" name="txtConfiPass" class="input" REQUIRED>
                                            <input type="text" style="display: none" name="txtId" class="input"  value="<?php echo $_GET['rs'] ?>">
                                            <input type="text" style="display: none" name="txtEmail" class="input" value="<?php echo $email ?>">
                                            <input type="text" style="display: none" name="txtType" class="input" value="<?php echo $_GET['type'] ?>">
                                        </div>
                                        <br>
                                        <div class="group">
                                            <input id="pass" type="submit" class="button" name="btnCambiar" value="Verificar">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script language="JavaScript" type="text/javascript" src="js/registroEmpleado.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>