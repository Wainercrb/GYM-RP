<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>registro gym</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/Registros.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "./header.php";
        ?>
        <div class="login-wrap">
            <div class="login-html">
                <div class="login-form">
                    <form role="form" action="php/RegistroGym.php" name="registroGym" id="prospects_form" method="post" enctype="multipart/form-data">
                        <div class="sign-up-htm">
                            <legend><center><h2><b id="title-form">Registro GYM</b></h2></center></legend><br>
                            <div class="login-form">
                                <div class="group center-block">
                                    <img id="blah" name="blah" class="center-block" src="" alt="" />
                                    <input type="file" name="image" id="image" onchange="readURL(this);"/>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Nombre</label>
                                    <input id="txtNombre" type="text"  name="txtNombre" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Email</label>
                                    <input id="txtEmail"  name="txtEmail" type="text" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Telefono</label>
                                    <input id="txtTelefono"  name="txtTelefono" type="text" class="input">
                                </div>
                                <div class="group">
                                    <div class="form-group">
                                        <?php
                                        include "./php/map.php";
                                        ?>
                                        <button type="button" class="center-block" onclick="getLocation()">Cargar mi ubicación</button>
                                        <br>
                                        <div id="map"></div>
                                        <input id="txtLatitud" name="txtLatitud" value=""></input>
                                        <input id="txtLongitud" name = "txtLongitud" value=" "></input>
                                    </div>
                                </div>
                                <div class="group">
                                    <input id="pass" type="submit" class="button" value="Guardar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #map {
            margin-left: 0px;
            width: 100%;
            height: 200px;
        }
        #txtLatitud, #txtLongitud{
            display: none !important;
        }

    </style>
    <?php include "footer.php" ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/MyJS/RegistroGym.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQFJdLinZ94oC6GJD3s_IuxhBJuPRgtjM&callback">
    </script>
</body>
</html>
