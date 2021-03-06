<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/registroUsuario.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <div class="login-wrap">
            <div class="login-html">
                <form role="form" action="php/registroUsuario.php"  name="registroUsuario" id="prospects_form" method="post" enctype="multipart/form-data">
                    <legend><center><h2><b id="title-form">Registro usuario</b></h2></center></legend><br>
                    <div class="login-form">
                        <div class="group center-block">
                            <img id="blah" name="blah" class="center-block" src="" alt="" />
                            <input type="file" name="image" id="image" onchange="readURL(this);"/>
                        </div>
                        <div class="sign-up-htm">
                            <div class="group">
                                <label for="user" class="label">Nombre</label>
                                <input id="txtName" type="text"  name="txtName" class="input" REQUIRED>
                            </div>
                            <div class="group">
                                <label for="las-name" class="label">Apellidos</label>
                                <input id="txtSurnames" type="text" name="txtSurnames" class="input" REQUIRED>
                            </div>
                            <div class="group">
                                <label for="id" class="label">Cédula</label>
                                <input id="txtId" type="text" name="txtId" class="input" REQUIRED>
                            </div>
                            <div class="group">
                                <label for="Tel" class="label">Téfono</label>
                                <input id="txtPhone" type="text" name="txtPhone" class="input" REQUIRED>
                            </div>
                            <div class="group">
                                <label for="email" class="label">Email</label>
                                <input id="txtEmail" type="email" name="txtEmail" class="input" REQUIRED>
                            </div>
                            <div class="group">
                                <label for="age" class="label">Edad</label>
                                <input id="txtAge" type="number" name="txtAge" class="input" REQUIRED>
                            </div>
                        </div>
                        <div class="group">
                            <label for="age" class="label">Dirección</label>
                            <input id="txtAdress" type="text" name="txtAdress" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label  id="pass"for="combobox" class="label">Sexo</label>
                            <select  id="combobox" name="cbGenero" class="input"name="select">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino" >Femenino</option>
                                <option value="DC">Desconocido</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Usuario</label>
                            <input id="txtUser" type="text" name="txtUser" class="input" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="txtPass" class="label">Contraseña</label>
                            <input id="txtPass" type="password" name="txtPass" class="input" data-type="password" REQUIRED>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Confirmar contraseña</label>
                            <input id="txtConfPass" type="password" name="txtConfPass" class="input" data-type="password" 	REQUIRED>
                        </div>
                        <div class="group">
                            <input  id="pass" type="submit"  class="button" value="Registarse">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/MyJS/registroUsuario.js"></script>
</body>
</html>