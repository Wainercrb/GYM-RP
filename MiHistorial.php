<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HISTORIAL</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilosHistorial.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="librerias/bootstrap-datepicker/css/bootstrap-datepicker.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "./header.php";
        include "./php/conexion.php";
        $PuntMas = 0;
        $PuntMen = 0;
        $sql = "SELECT puntuacionMas, puntuacionMenos from locales WHERE id_local = " . $_SESSION["IDTIENDA"];
        if (!$query = $con->query($sql)) {
            die("Error description: " . mysqli_error($con));
        }
        while ($row = $query->fetch_array()) {
            $PuntMas = $row["puntuacionMas"];
            $PuntMen = $row["puntuacionMenos"];
        }
        ?>
        <div class="container"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <legend class="text-center" style="display: inline" >GYM <?php echo $_SESSION["NOMBRETIENDA"]; ?></legend>
                        <form style="align-items: center" action="php/voto.php" name="frmVotaciones" method="POST" enctype="multipart/form-data">
                            <h1 class="text-center">
                                <input class="like" type="submit" value="<?php echo "Likes " . $PuntMas ?>" name="btnLike" />
                                <input class="dislike" type="submit" value="<?php echo "Deslikes " . $PuntMen ?>" name="btnDeslike" />
                                <input  style="display: none" value="<?php echo $PuntMas ?>" name="like" />
                                <input  style="display: none" value="<?php echo $PuntMen ?>" name="deslike" />
                            </h1>
                            <br>
                            <br>
                        </form>
                        <form method="post">
                            <fieldset>
                                <div class='input-group date text-center center-block' id='divMiCalendario'>
                                    <button type="button" id="buttonCalendar"  class="btn btn-primary">fecha rutina</button>
                                    <button type="button" onclick="btnHistorial();" class="btn btn-primary">Historial</button>
                                    <div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group date wr-date">
                                                        <input type="text" name="txtFecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Cargar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h1 class="text-center">Rutinas registradas</h1>
                <?php
                $fecha = "";
                if (isset($_GET["fc"])) {
                    $fecha = $_GET["fc"];
                } else
                if (isset($_POST['txtFecha'])) {
                    $fecha = $_POST['txtFecha'];
                } else {
                    $fecha = date("Y/m/d");
                }
                ?>
                <?php
                $ctRutina = 0;
                $sql = "SELECT * from rutina where fecha = '$fecha' and id_usuario = $navbarId";
                include './php/conexion.php';
                if (!$query = $con->query($sql)) {
                    echo("Error description: " . mysqli_error($con));
                    return;
                }
                while ($row = $query->fetch_array()) {
                    $ctRutina++;
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="mainDiv">
                        <div class="my-list center-block text-center"id="divdiv">
                            <img id="div100" src="ejercicios/<?php echo $row['lugar_tonificar']; ?>.jpg"/>
                            <h3 class="text-center"><?php echo "Lugar Trabajar: " . $row['lugar_tonificar']; ?></h3>
                            <h5 class="text-center"><?php echo $row['fecha']; ?></h5>
                            <span class="pull-right"></span>
                            <div class="detail text-center pull-center">
                                <?php
                                if ($row['equipo'] === "Ninguna") {
                                    ?>
                                    <img id="img-show" src="ejercicios/<?php echo $row['tipo_ejercicio']; ?>.jpg" alt="dsadas" />
                                <?php } else { ?>
                                    <img id="img-show" src="ejercicios/<?php echo $row['equipo']; ?>.jpg" alt="dsadas" />
                                <?php } ?>
                                <br>
                                <h4><?php echo 'Máquina: ' . $row['equipo']; ?></h4>
                                <h4><?php echo 'Series: ' . $row['session'] . ' ' . 'Repeticiones: ' . $row['repeticiones']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if ($ctRutina === 0) {
                    echo '<h1 class="text-center" style="color: red"> No hay rutinas registradas en: ' . $fecha . '</h1>';
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h1 class="text-center">Comidas registradas</h1>
                <?php
                $busqueda;
                if (isset($_POST["txtFecha"])) {
                    $busqueda = $_POST["txtFecha"];
                } else {
                    $busqueda = date("Y-m-d");
                }
                $ctComida = 0;
                $sql = "SELECT DISTINCT c.tipo_comida, c.estado, c.fecha, c.hora, c.detalles, c.id_comida from comida c where c.id_usuario = $navbarId AND c.fecha >= '" . $busqueda . "' AND c.estado = 'pendiente'";
                include './php/conexion.php';
                if (!$query = $con->query($sql)) {
                    die("Error description: " . mysqli_error($con));
                }
                while ($row = $query->fetch_array()) {
                    $ctComida++;
                    $horaInicio = strtotime($row["hora"]);
                    $horaInicio = date("H:i", strtotime('-30 minutes', $horaInicio));
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                        <form name="frmActualizarComida" action="php/registroComida.php" method="POST" enctype="multipart/form-data">
                            <div class="my-list center-block text-center">
                                <img id="div100" src="ejercicios/<?php echo $row['tipo_comida']; ?>.jpg" />
                                <span><?php echo 'Tipo comida: ' . $row['tipo_comida']; ?></span>
                                <span>Estado: <?php echo$row['estado']; ?></span>
                                <div class="offer"> Fecha: <?php echo $row['fecha'] . " ". $horaInicio." a ". $row["hora"]; ?></div>
                                <div class="detail">
                                    <p> <?php echo $row['detalles']; ?> </p>
                                    <img id="div100" src="ejercicios/<?php echo $row['tipo_comida']; ?>.jpg" alt="dsadas" />
                                    <input value="<?php echo$row["id_comida"]; ?>" name="idComida" style="display: none"/>
                                    <?php
                                    $hora = strtotime(date('H:i:s'));
                                    $hora = date("H:i", strtotime('+30 minutes', $hora));
                                    ?>
                                    <?php if ($row["fecha"] === date("Y-m-d") && (strtotime($row["hora"]) > strtotime(date('H:i:s')) && (strtotime($row["hora"]) < strtotime($hora)))) { ?>
                                        <div class="btn-group">
                                            <input type="submit" class="btn btn-default" name="loHice" value="¡Lo hice!">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                if ($ctComida === 0) {
                    echo '<h1 class="text-center" style="color: red">No hay registros de comida</h1>';
                }
                ?>
            </div>
        </div>
        <?php include "footer.php" ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="librerias/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="js/js.js"></script>
    </body>
</html>