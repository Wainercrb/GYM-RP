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
        <title>Rutinas</title>
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
        $where = "WHERE usuario = '$_GET[id]'";
        $mensaje = "";
        if (isset($_POST['buscarValor']) && isset($_POST["tipoFiltro"])) {
            if ($_POST["tipoFiltro"] === "todo") {
                $where = "WHERE usuario = '$_GET[id]'";
            } else {
                $where = "WHERE usuario = '$_GET[id]' and fecha like '$_POST[valor]'";
            }
        }
        include './php/conexion.php';
        $sql = "SELECT * FROM `historial` $where";
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
                        <h4 class="text-center" style="padding-top:1%">Medidas registradas para <?php echo $_GET['id']; ?></h4>
                        <div class="table-responsive" id="div-table">
                            <form name="mantenimeintoUsuairo" action="php/registroUsuario.php" method="POST">
                                <table id="mytable" class="table table-bordred table-inverse">
                                    <thead>
                                    <th style="display: none">id</th>
                                    <th>Usuario</th>
                                    <th>Peso</th>
                                    <th>Altura</th>
                                    <th>Cuello</th>
                                    <th>Hombros</th>
                                    <th>Pecho</th>
                                    <th>Cintura</th>
                                    <th>Antebrazo</th>
                                    <th>Muzlo</th>
                                    <th>Pantorrillas</th>
                                    <th>Biceps</th>
                                    <th>Gletos</th>
                                    <th>Cadera</th>
                                    <th>Fecha</th>
                                    <th>Editar</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        while ($row = $query->fetch_array()) {

                                            $contador++;
                                            $idHistorial = $row['id_historial'];
                                            $usuairo = $row['usuario'];
                                            $peso = $row['peso'];
                                            $altura = $row['altura'];
                                            $cuello = $row['cuello'];
                                            $hombros = $row['hombros'];
                                            $pecho = $row['pecho'];
                                            $cintura = $row['cintura'];
                                            $antebrazo = $row['antebrazo'];
                                            $muzlo = $row['muslo'];
                                            $pantorrillas = $row['pantorrillas'];
                                            $biceps = $row['biceps'];
                                            $gluteos = $row['gluteos'];
                                            $cadera = $row['cadera'];
                                            $fecha = $row['fecha'];
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $idHistorial; ?></td>
                                                <td><?php echo $usuairo; ?></td>
                                                <td><?php echo $peso; ?></td>
                                                <td><?php echo $altura; ?></td>
                                                <td><?php echo $cuello; ?></td>
                                                <td><?php echo $hombros; ?></td>
                                                <td><?php echo $pecho; ?></td>
                                                <td><?php echo $cintura; ?></td>
                                                <td><?php echo $antebrazo; ?></td>
                                                <td><?php echo $muzlo; ?></td>
                                                <td><?php echo $pantorrillas; ?></td>
                                                <td><?php echo $biceps; ?></td>
                                                <td><?php echo $gluteos; ?></td>
                                                <td><?php echo $cadera; ?></td>
                                                <td><?php echo $fecha; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal" value="<?php echo $idHistorial; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
                        <h3 class="modal-title" id="lineModalLabel">Mantenimineto Medidas</h3>
                    </div>
                    <form  action="php/Historial.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtIdHistorial">Id</label>
                                <input type="number"  id="txtIdHistorial" name="txtIdHistorial" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="txtUsuario">Usuario</label>
                                <input type="text" class="form-control" name="txtUsuario" required id="txtUsuario">
                            </div>
                            <div class="form-group">
                                <label for="txtPeso">Peso</label>
                                <input type="number" step=0.01 class="form-control" name="txtPeso" required id="txtPeso">
                            </div>
                            <div class="form-group">
                                <label for="txtAltura">Altura</label>
                                <input type="number" step=0.01 class="form-control" name="txtAltura" required id="txtAltura">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cuello</label>
                                <input type="number"  step=0.01 class="form-control" name="txtCuello" required id="txtCuello">
                            </div>
                            <div class="form-group">
                                <label for="txtHombros">Hombros</label>
                                <input  type="number" step=0.01 class="form-control" name="txtHombros" required id="txtHombros">
                            </div>
                            <div class="form-group">
                                <label for="txtPecho">Pecho</label>
                                <input type="number" step=0.01 class="form-control" name="txtPecho" required id="txtPecho">
                            </div>
                            <div class="form-group">
                                <label for="txtCintura">Cintura</label>
                                <input  type="number" step=0.01 class="form-control" name="txtCintura" required id="txtCintura">
                            </div>
                            <div class="form-group">
                                <label for="txtAntebrazo">Antebrazo</label>
                                <input  type="number" step=0.01 class="form-control" name="txtAntebrazo" required id="txtAntebrazo">
                            </div>
                            <div class="form-group">
                                <label for="txtMuzlo">Muzlo</label>
                                <input  type="number" step=0.01 class="form-control" name="txtMuzlo" required id="txtMuzlo">
                            </div>
                            <div class="form-group">
                                <label for="txtPantorrillas">Pantorrillas</label>
                                <input  type="number" step=0.01 class="form-control" name="txtPantorrillas" required id="txtPantorrillas">
                            </div>
                            <div class="form-group">
                                <label for="txtBiceps">Biceps</label>
                                <input  type="number" step=0.01 class="form-control" name="txtBiceps" required id="txtBiceps">
                            </div>
                            <div class="form-group">
                                <label for="txtGletos">Gletos</label>
                                <input type="number" step=0.01 class="form-control" name="txtGletos" required id="txtGletos">
                            </div>
                            <div class="form-group">
                                <label for="txtCadera">Cadera</label>
                                <input type="number" step=0.01 class="form-control" name="txtCadera" required id="txtCadera">
                            </div>
                            <div class="form-group">
                                <label for="txtFecha">Fecha</label>
                                <input type="date" class="form-control" name="txtFecha" required id="txtFecha">
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
<script>

    var table = document.getElementsByTagName("table")[0];
    var tbody = table.getElementsByTagName("tbody")[0];
    tbody.onclick = function (e) {
        e = e || window.event;
        var target = e.srcElement || e.target;
        while (target && target.nodeName !== "TR") {
            target = target.parentNode;
        }
        if (target) {
            var cells = target.getElementsByTagName("td");
            document.getElementById("txtIdHistorial").value = cells[0].innerHTML;
            document.getElementById("txtUsuario").value = cells[1].innerHTML;
            document.getElementById("txtPeso").value = cells[2].innerHTML;
            document.getElementById("txtAltura").value = cells[3].innerHTML;
            document.getElementById("txtCuello").value = cells[4].innerHTML;
            document.getElementById("txtHombros").value = cells[5].innerHTML;
            document.getElementById("txtPecho").value = cells[6].innerHTML;
            document.getElementById("txtCintura").value = cells[7].innerHTML;
            document.getElementById("txtAntebrazo").value = cells[8].innerHTML;
            document.getElementById("txtMuzlo").value = cells[9].innerHTML;
            document.getElementById("txtPantorrillas").value = cells[10].innerHTML;
            document.getElementById("txtBiceps").value = cells[11].innerHTML;
            document.getElementById("txtGletos").value = cells[12].innerHTML;
            document.getElementById("txtCadera").value = cells[13].innerHTML;
            document.getElementById("txtFecha").value = cells[14].innerHTML;
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