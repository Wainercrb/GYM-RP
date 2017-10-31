<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>registro trabajador</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/Registros.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <div class="login-wrap">
            <div class="login-html">
                <div class="login-form">
                    <form role="form" action="php/RegistroTrabajador.php" name="registroTrabajador" id="prospects_form" method="post" enctype="multipart/form-data">
                        <div class="sign-up-htm">
                            <legend><center><h2><b id="title-form">Registro empleado</b></h2></center></legend><br>
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
                                    <label for="pass" class="label">Apellido 1 </label>
                                    <input id="txtApellidoUno" type="text"  name="txtApellidoUno" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Apellido 2 </label>
                                    <input id="txtApellidoDos" type="text"  name="txtApellidoDos" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Cedula </label>
                                    <input id="txtCedula" type="text"  name="txtCedula" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Direccion</label>
                                    <input id="txtDireccion"  name="txtDireccion" type="text" class="input" REQUIRED>
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
                                    <label for="user" class="label">Usuario</label>
                                    <input id="txtUsuario" type="text"  name="txtUsuario" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Contraseña</label>
                                    <input id="txtContrasena" type="password" name="txtContrasena" class="input" data-type="password" REQUIRED>
                                </div>
                                 <div class="group">
                                    <label for="pass" class="label">Confirme Contraseña</label>
                                    <input id="txtContraseña" type="password" name="txtConfContrasenna" class="input" data-type="password" REQUIRED>
                                </div>
                                <div class="group">
                                    <label id="pass" for="combobox" class="label">Rol</label>
                                    <select id="combobox" class="input" name="combobox" REQUIRED>
                                        <option value="Admin">Admin</option>
                                        <option value="Nutricionista">Nutricionista</option>
                                        <option value="Entrenador">Entrenador</option>
                                    </select>
                                    <br>
                                    <div class="group">
                                        <input id="pass" type="submit" class="button" value="Registarse ">
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
    <script language="JavaScript" type="text/javascript" src="js/MyJS/RegistroTrabajador.js"></script>
</body>
</html>