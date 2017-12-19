<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MANTENIMINETO PERSONAL</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="css/manteniminetoUsuario.css">
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "./header.php";
        ?>
        <?php
        $mensaje = "";
        if (isset($_POST['buscarValor'])) {
            if ($_POST["tipoFiltro"] === "nombre") {
                $where = " AND t.nombre LIKE '%" . $_POST['valor'] . "%'";
            } else if ($_POST["tipoFiltro"] === "apellidos") {
                $where = " AND t.apellidoUno LIKE '%" . $_POST['valor'] . "%'";      
            } else if ($_POST["tipoFiltro"] === "usuario") {
                $where = " AND t.usuario LIKE '%" . $_POST['valor'] . "%'";
            } else if ($_POST["tipoFiltro"] === "email") {
                $where = " AND t.email LIKE '%" . $_POST['valor'] . "%'";
            } else if ($_POST["tipoFiltro"] === "Todo") {
                $where = "";
            }
            include './php/conexion.php';
            $sql = "SELECT DISTINCT * FROM trabajador t, gym_admin gd where t.id_trabajador = gd.id_admin and id_local = $_SESSION[IDTIENDA]".$where;
            if (!$query = $con->query($sql)) {
                die("Error description: " . mysqli_error($con));
            }
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
                        <h4 class="text-center">Trabajadores registrados</h4>
                        <div class="table-responsive" id="div-table">
                            <form name="mantenimeintoTrabajador" action="php/registroTrabajador.php.php" method="POST">
                                <table id="mytable" class="table table-bordred table-inverse">
                                    <thead>        
                                    <th>Nombre</th>
                                    <th>ApellidoUno</th>
                                    <th>ApellidoDos</th>
                                    <th>Cedula</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>usuario</th>
                                    <th>contraseña</th>
                                    <th>Actualizar</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        if (isset($_POST['buscarValor'])) {
                                            while ($row = $query->fetch_array()) {
                                                $contador++;
                                                $idT = $row['id_trabajador'];
                                                $nombre = $row["nombre"];
                                                $apellidoUno = $row['apellidoUno'];
                                                $apellidoDos = $row['apellidoDos'];
                                                $cedulaT = $row['cedula'];
                                                $telefono = $row['telefono'];
                                                $direccion = $row['direccion'];
                                                $email = $row['email'];
                                                $rol = $row['rol'];
                                                $usuairo = $row['usuario'];
                                                $contrasenna = $row["contrasenna"];
                                                ?>
                                                <tr>
                                                    <td style="display: none"><?php echo $idT; ?></td>
                                                    <td><?php echo $nombre; ?></td>
                                                    <td><?php echo $apellidoUno; ?></td>
                                                    <td><?php echo $apellidoDos; ?></td>
                                                    <td><?php echo $cedulaT; ?></td>
                                                    <td><?php echo $telefono; ?></td>
                                                    <td><?php echo $direccion; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $rol; ?></td>
                                                    <td><?php echo $usuairo; ?></td>
                                                    <td><?php echo $contrasenna; ?></td>                             
                                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal"  value="<?php echo $idT; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                </tr>
                                                <?php
                                            }
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
        <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Mantenimiento Trabajador</h3>
                    </div>
                    <form  action="php/registroTrabajador.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Id</label>
                                <input type="number" class="form-control" name="txtId" id="txtId" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" name="txtnombre" id="txtnombre">  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ApellidoUno</label>
                                <input type="text" class="form-control" name="txtApellidoUno" id="txtApellidoUno">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ApellidoDos</label>
                                <input type="text" class="form-control" name="txtApellidoDos" id="txtApellidoDos">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cedula</label>
                                <input type="text" class="form-control" name="txtCedula" id="txtCedula">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dirección</label>
                                <input type="text" class="form-control" name="txtDireccion" id="txtDireccion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rol</label>
                                <input type="text" class="form-control" name="txtRol" id="txtRol">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <input type="text" class="form-control" name="txtContrasena" id="txtContrasena">
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
                    document.getElementById("txtId").value = cells[0].innerHTML;
                    document.getElementById("txtnombre").value = cells[1].innerHTML;
                    document.getElementById("txtApellidoUno").value = cells[2].innerHTML;
                    document.getElementById("txtApellidoDos").value = cells[3].innerHTML;
                    document.getElementById("txtCedula").value = cells[4].innerHTML;
                    document.getElementById("txtTelefono").value = cells[5].innerHTML;
                    document.getElementById("txtDireccion").value = cells[6].innerHTML;
                    document.getElementById("txtEmail").value = cells[7].innerHTML;
                    document.getElementById("txtRol").value = cells[8].innerHTML;
                    document.getElementById("txtUsuario").value = cells[9].innerHTML;
                    document.getElementById("txtContrasena").value = cells[10].innerHTML;
                }
            };
        </script>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/MyJS/mantenimientoUsuario.js"></script>

    </body>
</html>