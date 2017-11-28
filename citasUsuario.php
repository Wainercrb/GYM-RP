<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>CITAS</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/mycss/citas.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        include "./php/conexion.php";
        $sql = "SELECT tr.id_trabajador, tr.nombre, tr.apellidoUno, tr.apellidoDos FROM trabajador tr, gym_admin ga WHERE tr.id_trabajador = ga.id_admin AND ga.id_local = $_SESSION[IDTIENDA] AND tr.rol = 'Nutricionista'";
        $mensaje = "";
        if (!$query = $con->query($sql)) {
            echo("Error description: " . mysqli_error($con));
            return;
        }
        ?>
        <div class="container">
            <div class="row">
                <form name="frmCita" action="php/citas.php" method="POST">
                    <div class="col-md-4 col-md-offset-4" id="selecDiv" style="background-color: #00c176">
                        <h4 class="page-header text-center">Seleccione un nutricionista deseado</h4>
                        <input value="" id="inputNutricionista" name="inputNutricionista" style="display: none"/>
                        <select id="mySelect" name="selectTrabajador" class="form-control">
                            <?php
                            while ($row = $query->fetch_array()) {
                                ?>
                                <option value="<?php echo $row["id_trabajador"]; ?>"><?php echo $row["nombre"] . " " . $row["apellidoUno"] . " " . $row["apellidoDos"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-md-4 col-md-offset-4" style="background-color: #00c176">
                        <br>
                        <label class="center-block text-center">Fecha y hora</label>
                        <br>
                        <input type="datetime-local" name="txtFecha" class="input-group center-block" />
                        <br>
                        <label class="center-block text-center">Detalle</label>
                        <br>
                        <input type="text" name="txtDetalle" class="input-group center-block" />
                        <br>
                        <br>
                        <input value="cita" onclick="cargarNitricionista();" type="submit" name="addCita" class="btn bg-success center-block"/>
                        <br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">	
            <h1 class="text-center">Mis citas pendientes</h1>
            <div class="row category-child" style="margin-top:20px">
                <?php
                $sql = "SELECT c.fecha, c.detalles, t.nombre, t.apellidoUno, t.apellidoDos FROM cita c, trabajador t WHERE c.id_trabajador = t.id_trabajador AND c.id_usuario  = '$_SESSION[ID]'";
                if (!$query = $con->query($sql)) {
                    die("Error description: " . mysqli_error($con));
                    return;
                }
                $contador = 0;
                while ($row = $query->fetch_array()) {
                    $contador++;
                    ?>
                    <div class="col-lg-2 col-md-4 col-xs-6 thumb ">
                        <a class="thumbnail" href="#">
                            <img class="img-responsive" src="imagenes/calendar.png" alt="">
                            <div class="wrapper">
                                <div class="caption post-content">
                                    <h6><?php echo "fecha: " . $row["fecha"]; ?></h6>
                                    <h6><?php echo "detalle: " . $row["detalles"]; ?></h6>
                                    <p><?php echo "trabajador: " . $row["nombre"] . " " . $row["apellidoUno"] . " " . $row["apellidoDos"]; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>   
                    <?php
                }
                if ($contador === 0) {
                    $mensaje = "<h1 class = 'text-center' style='color:red;'>No se encontraron citas</h1>";
                }
                ?>
            </div>
        </div>
        <script>
            function cargarNitricionista() {
                var valor = document.getElementById('mySelect').options[document.getElementById('mySelect').selectedIndex].text;
                document.getElementById("inputNutricionista").value = valor;
            }
        </script>
        <?php
        echo $mensaje;
        ?>
        <?php include "footer.php" ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
