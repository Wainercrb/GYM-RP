<!DOCTYPE html>
<?php
if (!isset($_GET["id"])) {
    print "<script>alert(\"No se puede abrir esta página :(\");window.location='index.php';</script>";
    return;
}
?>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medidas</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/manteniminetoUsuario.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <?php
        $where = "WHERE id_usuario = $_GET[id]";
        $mensaje = "";
        if (isset($_POST['buscarValor']) && isset($_POST["tipoFiltro"])) {
            if ($_POST["tipoFiltro"] === "todo") {
                $where = "WHERE id_usuario = $_GET[id]";
            } else {
                $where = "WHERE id_usuario = $_GET[id] and fecha like '$_POST[valor]'";
            }
        }
        include './php/conexion.php';
        $sql = "SELECT * FROM `rutina` $where";
        if (!$query = $con->query($sql)) {
            echo("Error description: " . mysqli_error($con));
            return;
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic"></label>
                            <div class="col-lg-6">
                                <input type="date" placeholder="Buscar..." class="input" id="input-buscar" name="valor"/>
                                <select name="tipoFiltro" class="selectpicker" id="search-select">
                                    <option value="todo">todo</option>
                                    <option value="fecha">fecha</option>
                                </select>
                                <button name="buscarValor" class="btn btn-default" type="submit">Buscar</button>

                            </div>
                        </div>
                    </form>
                    <div id="div-table">
                        <h4 class="text-center">Usuarios registrados</h4>
                        <div class="table-responsive" id="div-table">
                            <form name="mantenimeintoUsuairo" action="php/registroUsuario.php" method="POST">
                                <table id="mytable" class="table table-bordred table-inverse">
                                    <thead>
                                    <th style="display: none">id</th>
                                    <th>Equipo</th>
                                    <th>Lugar tonificar</th>
                                    <th>Tipo ejércicio</th>
                                    <th>Sessiones</th>
                                    <th>Repericiones</th>
                                    <th>Fecha</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        while ($row = $query->fetch_array()) {

                                            $contador++;
                                            $idRutina = $row['id_rutina'];
                                            $equipo = $row['equipo'];
                                            $lugarTonifica = $row['lugar_tonificar'];
                                            $tipo_ejercicio = $row['tipo_ejercicio'];
                                            $repeticiones = $row['repeticiones'];
                                            $sessiones = $row['session'];
                                            $fechaRutina = $row['fecha'];
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $idRutina; ?></td>
                                                <td><?php echo $equipo; ?></td>
                                                <td><?php echo $lugarTonifica; ?></td>
                                                <td><?php echo $tipo_ejercicio; ?></td>
                                                <td><?php echo $sessiones; ?></td>
                                                <td><?php echo $repeticiones; ?></td>
                                                <td><?php echo $fechaRutina; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal" value="<?php echo $idRutina; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                            </tr>
                                            <?php
                                        }

                                        if ($contador === 0) {

                                            $mensaje = "<h1 class = 'text-center' style='color:red;'>No se encontraron registros</h1>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- line modal -->
        <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Mantenimineto Rutina</h3>
                    </div>
                    <form  action="php/registroRutina.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id</label>
                                <input type="number" class="form-control" name="txtIdRutina" id="txtIdRutina">
                            </div>
                            <div class="form-group">
                                <label for="maquina">Máquina</label>
                                <select class="form-control form-select ajax-processed" id="tipoMaquina" name="tipoMaquina">       
                                    <option value="Ninguna">Ninguna</option>
                                    <option value="Pesas">Pesas</option>
                                    <option value="Barras de triceps">Barras de triceps</option>
                                    <option value="Banco predicador">Banco predicador</option>
                                    <option value="Hiper">Hiper</option>
                                    <option value="Cajas Plyo">Cajas Plyo</option>
                                    <option value="Bicibleta">Bicibleta</option>
                                    <option value="Pesas de tobillo">Pesas de tobillo</option>
                                    <option value="Máquina de prensa de pierna">Máquina de prensa de pierna</option>
                                    <option value="Hack Squat Machine"> Hack Squat Machine</option>
                                    <option value="Abducción de Piernas"> Abducción de Piernas</option>
                                    <option value="Merodeador">Merodeador</option>
                                    <option value="Mini tranpolín">Mini tranpolín</option>
                                    <option value="Tabla de inversión">Tabla de inversión</option>
                                    <option value="Placa de vibración">Placa de vibración</option>
                                    <option value="Power Rack">Power Rack</option>
                                    <option value="Maxi Climber">Maxi Climber</option>
                                    <option value="Maxi Climber">Máquina de estiramiento</option>
                                    <option value="Smith Machine">Smith Machine</option>
                                    <option value="Entrenador de suspensión">Entrenador de suspensión</option>
                                    <option value="Máquina de poleas de cable">Máquina de poleas de cable</option>
                                    <option value="Kettlebells">Kettlebells</option>
                                    <option value="La silla romana">La silla romana</option>
                                    <option value="Banco abdominal">Banco abdominal</option>
                                    <option value="Ab Coaster">Ab Coaster</option>
                                    <option value="Bicicleta estacionaria">Bicicleta estacionaria</option>
                                    <option value="Bicicleta Cruiser">Bicicleta Cruiser</option>
                                    <option value="Fixie Bike">Fixie Bike</option>
                                    <option value="Mountain Bike">Mountain Bike</option>
                                    <option value="Bicicleta reclinada">Bicicleta reclinada</option>
                                    <option value="Bicicleta de carretera">Bicicleta de carretera</option>
                                    <option value="Spin Bike">Spin Bike</option>
                                    <option value="Bicicleta Comfort">Bicicleta Comfort</option>
                                    <option value="Cinta de correr">Cinta de correr</option>
                                    <option value="Mini bicicletas de ejercicio">Mini bicicletas de ejercicio</option>
                                    <option value="Placas de metal">Placas de metal</option>
                                    <option value="Bolas de medicina">Bolas de medicina</option>
                                    <option value="Saltar la cuerda">Saltar la cuerda</option>
                                    <option value="Banda de resistencia">Banda de resistencia</option>
                                    <option value="Barbell">Barbell</option>
                                    <option value="Escalera de agilidad">Escalera de agilidad</option>
                                    <option value="Tableros de equilibrio">Tableros de equilibrio</option>                                
                                </select>  
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Lugar tonificar</label>
                                <select class="form-control form-select ajax-processed" id="tipoCuerpo" name="tipoCuerpo">
                                    <option value="Pecho">Pecho</option>
                                    <option value="Espalda">Espalda</option>
                                    <option value="Bíceps">Bíceps</option>
                                    <option value="Hombros">Hombros</option>
                                    <option value="Abdomen">Abdomen</option>
                                    <option value="Piernas">Piernas</option>
                                    <option value="Cúadrices">Cuádriceps</option>
                                    <option value="Aduptores">Aduptores</option>
                                    <option value="Pectoral Mayor">Pectoral Mayor</option>
                                    <option value="Deltoides">Deltoides</option>
                                    <option value="Bíceps branquiar">Bíceps branquiar</option>
                                    <option value="Recto Abdomial">Recto Abdomial</option>
                                    <option value="Flexor común de dedos">Flexor común de dedos</option>
                                    <option value="Esternocleidomastoideo">Esternocleidomastoideo</option>
                                    <option value="Músculo Frontal">Músculo Frontal</option>
                                    <option value="Masetero">Masetero</option>
                                    <option value="Obicular de ojos">Obicular de ojos</option>
                                    <option value="Sóleo">Sóleo</option>
                                    <option value="Tibial">Tibial</option>
                                    <option value="Triceps">Triceps</option>
                                    <option value="Trapecio">Trapecio</option>
                                    <option value="Biceps femoral">Biceps femoral</option>
                                    <option value="Gluteo mayor">Gluteo mayor</option>
                                    <option value="Serrato anterior">Serrato anterior</option>
                                    <option value="romboide mayor">romboide mayor</option>
                                    <option value="Romboide mayor">romboide menor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Tipo Ejercicio</label>
                                <select class="form-control form-select ajax-processed" name="tipoEjercicio" id="tipoEjercicio">
                                    <option value="Ninguno" selected="selected">Ninguno</option>
                                    <option value="Maquina">Maquina</option>
                                    <option value="Saltos en Tijera">Saltos en Tijera</option>
                                    <option value="Fondo de Pecho">Fondo de Pecho</option>
                                    <option value="Sentadilla y elevacion de talon">Sentadilla y elevacion de talon</option>
                                    <option value="Saltos en Tijera">Saltos en Tijera</option>
                                    <option value="Planchas de Buzo">Planchas de Buzo</option>
                                    <option value="Flexion y elevacion">Flexion y elevacion</option>
                                    <option value="Lagartijas de Triceps">Lagartijas de Triceps</option>
                                    <option value="Media Sentadilla">Media Sentadilla</option>
                                    <option value="Rotacion de Hombroso">Rotacion de Hombros</option>
                                    <option value="Rotacion cadera">Rotacion cadera</option>
                                    <option value="Patada de Nadador">Patada de Nadador</option>
                                    <option value="Abdominales">Abdominales</option>
                                    <option value="Sentadillas">Sentadillas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Series</label>
                                <input type="number" id="txtSeries" name="series" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Repeticiónes</label>
                                <input type="number" id="txtRepeticiones" name="repeticiones" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Fecha</label>
                                <input type="date" id="txtFecha" name="txtFecha" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-warning" name="btnEliminar" value="Eliminar">

                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
                                </div>
                                <div class="btn-group" role="group">
                                    <input type="submit" class="btn btn-default btn-hover-green"  value="Actualizar" name="Actualizar" role="button"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        echo $mensaje;
        ?>
        <?php include "footer.php" ?>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
<a href="rutinas.php"></a>

<script>
    function editar() {
        window.location = "";
    }

</script>

<script>

    var table = document.getElementsByTagName("table")[0];
    var tbody = table.getElementsByTagName("tbody")[0];
    tbody.onclick = function (e) {
        var todo = "";
        e = e || window.event;
        var target = e.srcElement || e.target;
        while (target && target.nodeName !== "TR") {
            target = target.parentNode;
        }
        if (target) {
            var cells = target.getElementsByTagName("td");
            document.getElementById("txtFecha").value = cells[6].innerHTML;
            document.getElementById("txtSeries").value = cells[4].innerHTML;
            document.getElementById("txtRepeticiones").value = cells[5].innerHTML;
            document.getElementById("txtIdRutina").value = cells[0].innerHTML;
            $("#tipoMaquina").val(cells[1].innerHTML).change();
            $("#tipoCuerpo").val(cells[2].innerHTML).change();
            $("#tipoEjercicio").val(cells[3].innerHTML).change();
        }
    };
</script>

<style>
    .center {
        margin-top:50px;   
    }

    .modal-header {
        padding-bottom: 5px;
    }

    .modal-footer {
        padding: 0;
    }

    .modal-footer .btn-group input button{
        height:40px;
        border-top-left-radius : 0;
        border-top-right-radius : 0;
        border: none;
        border-right: 1px solid #ddd;
    }

    .modal-footer .btn-group:last-child > button {
        border-right: 0;
    }
</style>