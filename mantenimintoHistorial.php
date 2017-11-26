<!DOCTYPE html>
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
        $idusua;
        ?>
        <?php
        $where = "";
        $mensaje = "";
        if (isset($_POST['buscarValor'])) {
            $filtro = $_POST['tipoFiltro'];
            $valor = $_POST['valor'];
            if ($filtro === "Todo" && $valor === "") {
                $where = "ORDER by nombre DESC limit 5";
            } else if ($filtro === "Todo" && $valor === "todo") {
                $where = "";
            } else if ($filtro != "Todo" && $valor != "todo") {
                $where = "where " . $filtro . " like '" . $valor . "%'";
            } else {
                $where = "ORDER by nombre DESC limit 5";
            }
        }
        include './php/conexion.php';
        $sql = "SELECT * FROM `usuario` $where";
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
                                <input type="text" placeholder="Buscar..." class="input" id="input-buscar" name="valor"/>
                                <select name="tipoFiltro" class="selectpicker" id="search-select">
                                    <option value="Todo">Todo</option>
                                    <option value="nombre">Nombre</option>
                                    <option value="apellidos">Apellidos</option>
                                    <option value="usuario">Usuairo</option>
                                    <option value="email">correo</option>
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
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Cédula</th>
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Rutinas</th>
                                    <th>Medidas</th>
                                    <th>Comidas</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        while ($row = $query->fetch_array()) {
                                            $contador++;
                                            $idT = $row['id_usuario'];
                                            $nombreT = $row['nombre'];
                                            $apellidosT = $row['apellidos'];
                                            $cedulaT = $row['cedula'];
                                            $edadT = $row['edad'];
                                            $generoT = $row['genero'];
                                            $usuarioT = $row['usuario'];
                                            $emailT = $row['email'];
                                            $direccionT = $row['direccion'];
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $idT; ?></td>
                                                <td><?php echo $nombreT; ?></td>
                                                <td><?php echo $apellidosT; ?></td>
                                                <td><?php echo $cedulaT; ?></td>
                                                <td><?php echo $edadT; ?></td>
                                                <td><?php echo $generoT; ?></td>
                                                <td><?php echo $usuarioT; ?></td>
                                                <td><?php echo $emailT; ?></td>
                                                <td><?php echo $direccionT; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#edit"  onclick="editarRutina(this.value)" value="<?php echo $idT; ?>"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#edit"  onclick="editarMedida(this.value)" value="<?php echo $idT; ?>"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#edit"  onclick="editarComida(this.value)" value="<?php echo $idT; ?>"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
        <?php
        echo $mensaje;
        ?>
        <script>
            function editarRutina(valor) {
                window.location = "rutinas.php?id=" + valor;
            }
            function editarMedida(valor) {
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
                        window.location = "medidas.php?id=" + cells[1].innerHTML;

                    }
                };
            }
            function editarComida(valor) {

                window.location = "comida.php?id=" + valor;
            }
        </script>
        <?php include "footer.php" ?>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>

