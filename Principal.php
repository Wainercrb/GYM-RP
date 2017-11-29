<!DOCTYPE html>
<?php
$contador = 0;
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
<script>
    var fechas = [];
</script>

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
                    <div class="left-navigation" id="divItems">
                        <ul class="list" id="wainer">
                            <?php
                            if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "admin") {
                                ?>
                                <li><a href="registroTrabajador.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO TRABAJADOR</a></li>
                                <li><a href="registroUsuario.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO USUARIO</a></li>
                                <li><a href="RegistroGym.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO GYM</a></li>
                                <li><a href="registroRutina.php"><i class="fa fa-users" aria-hidden="true"></i>     NUEVA RUTINA</a></li>
                                <li><a href="mantenimintoUsuario.php"><i class="fa fa-users" aria-hidden="true"></i>     ADMINISTRAR USUARIO</a></li>
                                <li><a href="MantenimientoTrabajador.php"><i class="fa fa-users" aria-hidden="true"></i>     ADMINISTRAR TRABAJADOR</a></li>
                                <li><a href="mantenimintoHistorial.php"><i class="fa fa-users" aria-hidden="true"></i>     ADMINISTRAR MEDIDAS</a></li>
                                <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i>     SALIR</li>
                                <style>
                                    #wainer{
                                        margin-top: 10%;
                                    }
                                </style>
                                <?php
                            } else if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "user") {
                                ?>
                                <li><a href="citasUsuario.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>   CITA</a></li>
                                <li><a href="MiHistorial.php"><i class="fa fa-clock-o" aria-hidden="true"></i></i>   MI HISTORIAL</a></li>
                                 <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i></i>  SALIR</a></li>
                                <style>
                                    #divItems{
                                        margin-top: 50%;
                                    }
                                </style>
                                <?php
                            } else if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "Entrenador") {
                                ?>
                                <li><a href="registroRutina.php"><i class="fa fa-users" aria-hidden="true"></i>     NUEVA RUTINA</a></li>
                                <li><a href="registroUsuario.php"><i class="fa fa-users" aria-hidden="true"></i>     REGISTRO USUARIO</a></li>
                                <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i></i>  SALIR</a></li>
                                <style>
                                    #wainer{
                                        margin-top: 55%;

                                    }

                                </style>
                                <?php
                            } else
                            if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "Nutricionista") {
                                ?>
                                <li><a href="citasTrabajador.php"><i class="fa fa-commenting-o" aria-hidden="true"></i></i>   CITAS PENDIENTES</a></li>
                                <li><a href="index.php"><i class="fa fa-times-circle" aria-hidden="true"></i></i>  SALIR</a></li>
                                <style>
                                    #wainer{
                                        margin-top: 75%;

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
                <div class="col-md-9 col-sm-8 main-content" id="div_information">
                    <h1 class="cnt">¡Siempre pensando en usted!</h1>
                    <p class="cnt">Esperamos que pueda lograr sus objetivos, día a dia, ya que esa es nuestra meta, estaremos actualizando esta página para que te sintas como en tu casa. </p>
                </div>
                <?php
                if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "user") {
                    ?>
                    <div class="col-md-9 col-sm-8 main-content">
                        <label id="labelNotification"></label>
                        <img data-toggle="modal" style="cursor:pointer" data-target="#exampleModalLong" src="imagenes/notificaciones.png" width="240" height="240" alt="cama"/>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Comidas pendientes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    if (isset($_SESSION["TIPOUSUARIO"]) && $_SESSION["TIPOUSUARIO"] === "user") {
                        ?>
                        <div class="modal-body">
                            <table id="mytable" class="table table-bordred table-inverse">
                                <thead>
                                <th style="display: none">id</th>
                                <th>Detalle</th>
                                <th>Fecha</th>
                                <th>Acción</th>                                
                                </thead>
                                <tbody>
                                    <?php
                                    include './php/conexion.php';
                                    $sql = "SELECT * FROM `comida`  WHERE estado = 'pendiente' and id_usuario = $id";
                                    if (!$query = $con->query($sql)) {
                                        echo("Error description: " . mysqli_error($con));
                                        return;
                                    }
                                    while ($row = $query->fetch_array()) {
                                        $contador++;
                                        $idCimida = $row['id_comida'];
                                        $fecha = $row['fecha'];
                                        ?>
                                        <tr>
                                            <td style="display: none"><?php echo $idComida; ?></td>
                                            <td>Se registro comida</td>
                                            <td><?php echo $fecha; ?></td>
                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal" onclick="openComida(this.value);" value="<?php echo $fecha; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                <script>
                                    document.getElementById("labelNotification").innerHTML = "<?php echo $contador; ?>"
                                    function openComida(valor) {
                                        window.location = "MiHistorial.php?fc=" + valor;
                                    }
                                </script>

                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

<style>
    #div_information{

        margin-bottom: 3%;

    }
    #labelNotification{
        position: absolute;
        padding-top: -0.5em;
        margin-top: -0.5em;
        font-size: 4em;
        color: red;
    }


</style>