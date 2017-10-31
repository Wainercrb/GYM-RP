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
        <?php
        include "header.php";
        ?>
        <div class="row" id="login-main-div">
        <div class="login-wrap">
            <div class="login-html">
                <div class="login-form">
                    <form role="form" action="php/registroEmpleado.php" name="registroEmpleado" id="prospects_form" method="post" enctype="multipart/form-data">
                        <div class="sign-up-htm">
                            <legend><center><h2><b id="title-form">Salvar Contraseña</b></h2></center></legend><br>
                            <div class="login-form">
                                <div class="group">
                                    <label for="user" class="label">Email o Usuairo</label>
                                    <input id="txtUsuario" type="text" step=0.01 name="txtUsuario" class="input" REQUIRED>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Contraseña</label>
                                    <input id="txtContraseña" type="password" step=0.01 name="txtContraseña" class="input" data-type="password" REQUIRED>
                                </div>
                                
                              
                                    <br>
                       
                                    <div class="group">
                                        <input id="pass" type="submit" class="button" value="Verificar">
                                    </div>
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