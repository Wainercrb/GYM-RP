<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mantenimineto usuairo</title>
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
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Cédula</th>
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
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
                                                <td><?php echo $nombreT; ?></td>
                                                <td><?php echo $apellidosT; ?></td>
                                                <td><?php echo $cedulaT; ?></td>
                                                <td><?php echo $edadT; ?></td>
                                                <td><?php echo $generoT; ?></td>
                                                <td><?php echo $usuarioT; ?></td>
                                                <td><?php echo $emailT; ?></td>
                                                <td><?php echo $direccionT; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#edit"  onclick="editarUsuario(this.value)" value="<?php echo $idT; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  name="eliminar" type="submit" data-target="#delete" value="<?php echo $idT; ?>"><span class="glyphicon glyphicon-trash"></span></button></p></td>
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

                            <!--                            <ul class="pagination pull-right">
                                                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                                            <li class="active"><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                                        </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo $mensaje;
        ?>
        <script>

            function editarUsuario(wainer) {
                window.location = "UpdateUsuarios.php?id=" + wainer + "";

            }

        </script>
        <?php include "footer.php" ?>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/MyJS/mantenimientoUsuario.js"></script>

    </body>
</html>