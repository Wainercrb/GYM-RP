<script>
    var usuariosAñadidos = [];
</script>
<?php
include 'php/conexion.php';
$sql = "SELECT * FROM `usuario";
if (!$query = $con->query($sql)) {
    die("Error description: " . mysqli_error($con));
    return;
}
while ($row = $query->fetch_array()) {
    ?>
    <script>
        var usuario = {
            id: "<?php echo $row['id_usuario']; ?>",
            nombreCompleto: "<?php echo $row['nombre'] . " " . $row['apellidos']; ?>",
            usuario: "<?php echo $row['usuario']; ?>",
            cedula: "<?php echo $row['cedula']; ?>"
        };
        usuariosAñadidos.push(usuario);

    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Agregar Rutina</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css">
        <link rel="stylesheet" type="text/css" href="css/RegistroRutinas.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="librerias/bootstrap-datepicker/css/bootstrap-datepicker.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <form class="form-horizontal" action="php/registroRutina.php" method="post">
            <div class="container" id="main-container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="well well-sm">
                            <fieldset>
                                <legend class="text-center">GTM-UTN-AÑADIR RUTINAS</legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Participánte</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="btnBuscarUsuario" placeholder="Usuario">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" id="btnAnadir"  onclick="usuarioExiste()" type="button">Añadir</button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" id="btnMembers" type="button">Miembros</button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" id="btnCompleto" onclick="grupoCompleto();" type="button">Completo</button>
                                            </span>
                                            <div class="modal fade" id="modalMiembros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="exampleModalLabel">Integrantes del grupo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                    <tr>
                                                                        <th># id</th>
                                                                        <th>Particinte</th>
                                                                        <th>Usuario</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-center">Rutinas</h3>
                                <legend class="text-center"></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Lugar a tonificar</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" id="tipoCuerpo" name="node_type">
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
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Equipo</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" id="tipoMaquina" name="node_type">       
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
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Tipo Ejercicio</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" name="tipoEjercicio" id="tipoEjercicio" name="node_type">
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
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Series</label>
                                    <div class="col-md-9">
                                        <input type="number" id="txtSeries" class="form-control">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Rutinas agregadas</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped" id="tbRutina">

                                                                <thead id="tblHead">
                                                                    <tr>
                                                                        <th>Rutina</th>
                                                                        <th>Ejercicio</th>
                                                                        <th>Maquina</th>
                                                                        <th>Series</th>
                                                                        <th>Repeticiones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Repeticiones</label>
                                    <div class="col-md-9">
                                        <input type="number" id="txtRepeticiones" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="button" id="btnRegisterRoutine" onclick="agregarEjercicio()" class="btn btn-info btn-lg">Agregar</button>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Rutinas</button>
                                    </div>
                                </div>
                            </fieldset>
                            <legend class="text-center">GTM-UTN-RUTINAS COMDA</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="">Cantidad</label>
                                <div class="col-md-9">
                                    <input type="number" id="txtCantidadComida" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Tipo Comida</label>
                                <div class="col-md-9">
                                    <select class="form-control form-select ajax-processed" name="tipoEjercicio" id="tipoComida" name="node_type">
                                        <option value="Nueces" selected="selected">Nueces</option>
                                        <option value="Yoghurt">Yoghurt</option>
                                        <option value="Huevo hervido">Huevo hervido</option>
                                        <option value="Semillas de Chía">Semillas de Chía</option>
                                        <option value="Avena">Avena</option>
                                        <option value="Frutas">Frutas</option>
                                        <option value="Barras de proteína">Barras de proteína</option>
                                        <option value="Cereales">Cereales</option>
                                        <option value="Carnes y pescado">Carnes y pescado</option>
                                        <option value="Lácteos">Lácteos</option>
                                        <option value="Nueces y almendras">Nueces y almendras</option>
                                        <option value="Verduras">Verduras</option>
                                        <option value="Batidos de proteína">Batidos de proteína</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="time">Hora</label>
                                <div class="col-md-9">
                                    <input type="time" id="txtTiempo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="date">Fecha</label>
                                <div class="col-md-9">
                                    <input type="date" id="txtFecha" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="details">Detalles</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtDetalle" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="button" id="btnRegistroComida" onclick="anadirColumnaComida();" class="btn btn-info btn-lg">Agregar</button>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaComida">Comida</button>
                                </div>
                            </div>

                            <legend class="text-center">ACCIONES FINALES</legend>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaMedidas">Medidas</button>
                                    <button type="submit" id="btnRegisterRoutine" name="formalizar" class="btn btn-primary btn-lg">Formalizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="modal fade" id="modaMedidas" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Agrege las medidas</h4>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tabla_medidas">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Altura</th>
                                                    <th>Peso</th>
                                                    <th>Cuello</th>
                                                    <th>Hombros</th>
                                                    <th>Pecho</th>
                                                    <th>Cintura</th>
                                                    <th>Antebrazo</th>
                                                    <th>Muzlo</th>
                                                    <th>Pantorrillas</th>
                                                    <th>Bíceps</th>
                                                    <th>Gluteos</th>
                                                    <th>Cadera</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="container">
                <div class="modal fade" id="modaComida" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Comidas Agregadas</h4>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tabla_comidas">
                                            <thead>
                                                <tr>
                                                    <th>Cantidad</th>
                                                    <th>Comida</th>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Detalles</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input value="<?php echo $navbarId; ?>" name="id_trabajador"/>
        </form>
        <?php include "footer.php" ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/MyJS/RegistroRutina.js"></script>
    </body>
</html>
<style>
    #input-table{
        border: none;

    }

</style>
