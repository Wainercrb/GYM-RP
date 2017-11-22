<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["ID"])) {
    $id = $_SESSION["ID"];
    $usuario = $_SESSION["USUARIO"];
    $foto = $_SESSION["FOTO"];
    $nombre = $_SESSION['NOMBRE'];
    $apellidos = $_SESSION['APELLIDOS'];
    $emil = $_SESSION['EMAIL'];
} else {
    die("error no se encontro un usuario");
}
?>

<html lang="en">
    <head>
        <title>GTY-UTN</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-3 sidebar2">
                    <div class="logo text-center" >
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" class="img-responsive center-block" alt="Logo">
                        <h1><?php echo $nombre . " " . $apellidos; ?></h1>
                        <p><?php echo $emil; ?></p>
                    </div>
                    <br>
                    <div class="left-navigation">
                        <ul class="list" id="wainer">
                            <?php
                            if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "trabajador") {
                                ?>
                                <li><a href="registroTrabajador.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO TRABAJADOR</a></li>
                                <li><a href="registroUsuario.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO USUARIO</a></li>
                                <li><a href="RegistroGym.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO GYM</a></li>
                                <li><a href="registroRutina.php"><i class="fa fa-users" aria-hidden="true"></i>     NUEVA RUTINA</a></li>
                                <li><a href="mantenimintoUsuario.php"><i class="fa fa-users" aria-hidden="true"></i>     ADMINISTRAR USUARIO</a></li>
                                <li><a href="registroTrabajador.php"><i class="fa fa-users" aria-hidden="true"></i>     ADMINISTRAR TRABAJADOR</a></li>
                                <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i>     SALIR</li>
                                <style>
                                    #wainer{
                                        margin-top: 10%;

                                    }

                                </style>
                                <?php
                            } else if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "user") {
                                ?>
                                <li><a href="registroUsuario.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>   OBJETIVOS</a></li>
                                <li><a href="MiHistorial.php"><i class="fa fa-clock-o" aria-hidden="true"></i></i>   MI HISTORIAL</a></li>
                                <li><a href="registroUsuario.php"><i class="fa fa-heart" aria-hidden="true"></i></i>   NOSOTROS</a></li>
                                <li><a href="registroUsuario.php"><i class="fa fa-commenting-o" aria-hidden="true"></i></i>   SUGERENCIAS</a></li>
                                <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i></i>  SALIR</a></li>
                                <style>

                                    #wainer{
                                        margin-top: 10%;

                                    }

                                </style>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!--este div es la parte del de la información de la página-->
                <div class="col-md-9 col-sm-8 main-content">
                    <h1 class="GYM-UTN">GYM-UTN
                </div>
                <div class="col-md-9 col-sm-8 main-content"><img src="https://images.vexels.com/media/users/3/132665/isolated/lists/cf0b4b825cd99b7e00ccf5cad3e7a014-weightlifting-circle-icon.png" class="device">
                </div>
                <div class="col-md-9 col-sm-8 main-content">
                    <h1 class="cnt">¡Siempre pensando en usted!</h1>
                    <p class="cnt">Esperamos que pueda lograr sus objetivos, día a dia, ya que esa es nuestra meta, estaremos actualizando esta página para que te sintas como en tu casa. </p>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>