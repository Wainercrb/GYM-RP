<!DOCTYPE html>
<?php
if (!isset($_GET["id"])) {
    print "<script>alert(\"No se puede abrir esta página :(\");window.location='principal.php';</script>";
    return;
}
?>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comida</title>
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
        $sql = "SELECT * FROM `comida` $where";
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
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Detalles</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        while ($row = $query->fetch_array()) {

                                            $contador++;
                                            $idComida = $row['id_comida'];
                                            $tipoComida = $row['tipo_comida'];
                                            $estadoComida = $row['estado'];
                                            $horaComida = $row['hora'];
                                            $fechaComida = $row['fecha'];
                                            $detallesComida = $row['detalles'];
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $idComida; ?></td>
                                                <td><?php echo $tipoComida; ?></td>
                                                <td><?php echo $estadoComida; ?></td>
                                                <td><?php echo $horaComida; ?></td>
                                                <td><?php echo $fechaComida; ?></td>
                                                <td><?php echo $detallesComida; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal" value="<?php echo $idComida; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
                        <h3 class="modal-title" id="lineModalLabel">Mantenimineto Comida</h3>
                    </div>
                    <form  action="php/registroComida.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id</label>
                                <input type="number" class="form-control" name="txtIdComida" REQUIRED id="txtIdComida">
                            </div>
                            <div class="form-group">
                                <label for="maquina">Máquina</label>
                                <select class="form-control form-select ajax-processed" name="tipoComida" REQUIRED id="tipoComida" name="node_type">
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
                            <div class="form-group">
                                <label for="estadoComida">Estado Comida</label>
                                <select class="form-control form-select ajax-processed" name="estadoComida" REQUIRED id="estadoComida" name="node_type">
                                    <option value="Pendiente" selected="selected">Pendiente</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipoCuerpo">Hora</label>
                                <input type="date" id="txtFecha" name="txtFecha" REQUIRED class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tipoHora">Fecha</label>
                                <input type="time" id="txtHora" name="txtHora" REQUIRED class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tipoDetalles">Detalles</label>
                                <input type="text" id="txtDetalles" name="txtDetalles" class="form-control">
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
            document.getElementById("txtIdComida").value = cells[0].innerHTML;
            document.getElementById("tipoComida").value = cells[1].innerHTML;
            $("#tipoMaquina").val(cells[2].innerHTML).change();
            document.getElementById("txtHora").value = cells[3].innerHTML;
            document.getElementById("txtFecha").value = cells[4].innerHTML;
            document.getElementById("txtDetalles").value = cells[5].innerHTML;
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