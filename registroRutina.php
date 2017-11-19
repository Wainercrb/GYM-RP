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
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="php/registroRutina.php" method="post">
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
                                            <option value="nd" selected="selected">Seleccion el lugar del cuerpo a trabajar</option>
                                            <option value="Ninguna">Ninguno</option>
                                            <option value="Pecho">Pecho</option>
                                            <option value="Bíceps">Bíceps</option>
                                            <option value="Hombros">Hombros</option>
                                            <option value="Abdomen">Abdomen</option>
                                            <option value="Antebrazo">Antebrozo</option>
                                            <option value="Abductores y Aductores">Abductores y aductores</option>
                                            <option value="Cúadrices">Cuádriceps</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Equipo</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" id="tipoMaquina" name="node_type">
                                            <option value="nd" selected="selected">Seleccion el ejercicio</option>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Banco plano">Banco plano</option>
                                            <option value="Prensa de piernas">Prensa de piernas</option>
                                            <option value="Paralelas">Paralelas</option>
                                            <option value="Mariposa">Mariposa</option>
                                            <option value="Dorsalera">Dorsalera</option>
                                            <option value="Máquinas de femorales">Máquinas de femorales</option>
                                            <option value="10">cuádriceps o hiperextensión</option>
                                            <option value="Peck Deck">Peck Deck</option>
                                            <option value="Multifuerza">Multifuerza</option>
                                            <option value="Pesas fijasa">Pesas fijasa</option>
                                            <option value="Pesas ajustables">Pesas ajustables</option>
                                            <option value="Kettlebells">Kettlebells</option>
                                            <option value="Abdiminales">Abdiminales</option>
                                            <option value="Lagartijas">Lagartijas</option>
                                            <option value="Sentadillas">Sentadillas</option>
                                            <option value="Apdominales">Apdominales</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Tipo Ejercicio</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" name="tipoEjercicio" id="tipoEjercicio" name="node_type">
                                            <option value="nd" selected="selected">Seleccion el tipo de ejercicio</option>
                                            <option value="Maquina">Maquina</option>
                                            <option value="Banco Press">Banco Press</option>
                                            <option value="Elevaciones frontales con disco de pie">Elevaciones frontales con disco de pie</option>
                                            <option value="Elevación frontal con disco">Elevación frontal con disco</option>
                                            <option value="Remo al mentón">Remo al mentón</option>
                                            <option value="Elevación frontal con disco">Elevación frontal con disco</option>
                                            <option value="Elevaciones frontales con barra z">Elevaciones frontales con barra z</option>
                                            <option value="Remo al mentón">Remo al mentón</option>
                                            <option value="Curl de bíceps con barra parado">Curl de bíceps con barra parado</option>
                                            <option value="press militar con barra sentado">press militar con barra sentado</option>
                                            <option value="Press frontal con barra">Press frontal con barra</option>
                                            <option value="Sentadillas con piernas abiertas">Sentadillas con piernas abiertas</option>
                                            <option value="Remo con barra sobre banco inclinado">Remo con barra sobre banco inclinado</option>
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
                                            <option value="nd" selected="selected">Nueces</option>
                                            <option value="Maquina">Yoghurt</option>
                                            <option value="Banco Press">Huevo hervido</option>
                                            <option value="Elevaciones frontales con disco de pie">Semillas de Chía</option>
                                            <option value="Elevación frontal con disco">Avena</option>
                                            <option value="Remo al mentón">Frutas</option>
                                            <option value="Elevación frontal con disco">Barras de proteína</option>
                                            <option value="Elevaciones frontales con barra z">Cereales</option>
                                            <option value="Remo al mentón">Carnes y pescado</option>
                                            <option value="Curl de bíceps con barra parado">Lácteos</option>
                                            <option value="press militar con barra sentado">Nueces y almendras</option>
                                            <option value="Press frontal con barra">Fruta</option>
                                            <option value="Sentadillas con piernas abiertas">Verduras</option>
                                            <option value="Remo con barra sobre banco inclinado">Huevos</option>
                                            <option value="Remo con barra sobre banco inclinado">Batidos de proteína</option>
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
                        </form>
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
