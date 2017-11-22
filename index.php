<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>ingresar</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/Login.css">
    </head>
    <body>
        <div class="login-wrap">
            <div class="login-html">
                <div class="login-form">
                    <form class="form" role="form"  accept-charset="UTF-8" id="login-nav" action="php/Login.php"  name="ingresoLogin" method="post" enctype="multipart/form-data">
                        <div class="sign-up-htm">
                            <legend><center><h2><b id="title-form">Login GYM-RP</b></h2></center></legend><br>
                            <div class="login-form">
                                <div class="group">
                                    <label for="user" class="label">Usuario o Email</label>
                                    <input id="txtUsuario" type="text" name="txtUsuario" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Contraseña</label>
                                    <input id="txtContraseña" type="password"  name="txtContrasenna" class="input" data-type="password" REQUIRED>
                                </div>
                                <br>
                                <div class="group">
                                    <h1 id="resetPassword"> <a  href="CambioContrasenna.php"> ¿has olvidado tu contraseña ?</a></h1>
                                </div>
                                <div class="group">
                                    <h5 id="resetPassword"> <a  href="gimnasios.php"> ¿ver gimnasios asociados ?</a></h5>
                                </div>
                                <div class="group">
                                    <input id="pass" type="submit" class="button" name="btnLogin" value="Ingresar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/MyJS/Login.js"></script>
</body>
</html>