<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>CITASD NT</title>
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
        <div class="container" style="margin-bottom: 30%; ">	
            <h1 class="text-center">Mis citas pendientes</h1>
            <div class="row category-child" style="margin-top:20px">
                <?php
                $sql = "SELECT * FROM `cita` WHERE id_trabajador = $_SESSION[ID]";
                if (!$query = $con->query($sql)) {
                    die("Error description: " . mysqli_error($con));
                    return;
                }
                $contador = 0;
                while ($row = $query->fetch_array()) {
                    $contador++;
                    ?>
                    <div class="col-lg-2 col-md-4 col-xs-6 thumb ">
                        <form name="frmTerminaCita" action="php/citas.php" method="POST" enctype="multipart/form-data">
                            <a class="thumbnail" href="#">
                                <img class="img-responsive" src="imagenes/calendar.png" alt="">
                                <div class="wrapper">
                                    <div class="caption post-content">
                                        <h6><?php echo "fecha: " . $row["fecha"]; ?></h6>
                                        <h6><?php echo "detalle: " . $row["detalles"]; ?></h6>
                                        <input style="display: none" name="idCita" value="<?php echo $row["id_cita"]; ?>" />
                                        <input value="Terminar" name="btnTermina" type="submit" class="btn btn-default btn-group-justified">
                                    </div>
                                </div>
                            </a>
                        </form>
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
