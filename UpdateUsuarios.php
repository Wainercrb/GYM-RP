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

        $where = "WHERE id_usuario = $_GET[id]";
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
                    <div id="div-table">
                        <h4 class="text-center">Usuarios registrados</h4>
                        <div class="table-responsive" id="div-table">
                            <form name="mantenimeintoUsuairo" action="php/registroUsuario.php" method="POST">
                                <table id="mytable" class="table table-bordred table-inverse">
                                    <thead>
                                    <th style="display: none">id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Direccion</th>
                                    <th>Usuario</th>
                                    <th>genero</th>
                                    <th>Contraseña</th>
                                    <th>Edad</th>
                                    <th>Cedula</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        while ($row = $query->fetch_array()) {

                                            $contador++;
                                            $Tid_Usuario = $row['id_usuario'];
                                            $Tnombre = $row['nombre'];
                                            $Tapellidos = $row['apellidos'];
                                            $Tdireccion = $row['direccion'];
                                            $Tusuario = $row['usuario'];
                                            $Tgenero = $row['genero'];
                                            $Tcontraseña = $row['contrasenna'];
                                            $Tedad = $row['edad'];
                                            $Tcedula = $row['cedula'];
                                            $Ttelefono = $row['telefono'];
                                            $Temail = $row['email'];
                                            ?>        
                                            <tr>
                                                <td style="display: none"><?php echo $Tid_Usuario; ?></td>
                                                <td><?php echo $Tnombre; ?></td>
                                                <td><?php echo $Tapellidos; ?></td>
                                                <td><?php echo $Tdireccion; ?></td>
                                                <td><?php echo $Tusuario; ?></td>
                                                <td><?php echo $Tgenero; ?></td>
                                                <td><?php echo $Tcontraseña; ?></td>
                                                <td><?php echo $Tedad; ?></td>
                                                <td><?php echo $Tcedula; ?></td>
                                                <td><?php echo $Ttelefono; ?></td>
                                                <td><?php echo $Temail; ?></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal" value="<?php echo $Tid_Usuario; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
                    <form  action="php/registroUsuario.php" method="post">
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
                                <label for="exampleInputEmail1">Apellidos</label>
                                <input type="text" class="form-control" name="txtApellido" id="txtApellido">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Direccion</label>
                                <input type="text" class="form-control" name="txtDireccion" id="txtDireccion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario">
                            </div>
                            <div class="form-group">
                                <label for="tipoGenero">Tipo Genero</label>
                                <select class="form-control form-select ajax-processed" name="tipoGenero" id="tipoGenero">
                                    <option value="Ninguno" selected="selected">Ninguno</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="DC">DC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <input type="text" id="txtContraseña" name="txtContraseña" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Edad</label>
                                <input type="text" id="txtEdad" name="txtEdad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cedula</label>
                                <input type="text" id="txtCedula" name="txtCedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="text" id="txtTelefono" name="txtTelefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" id="txtEmail" name="txtEmail" class="form-control">
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
            document.getElementById("txtId").value = cells[0].innerHTML;
            document.getElementById("txtnombre").value = cells[1].innerHTML;
            document.getElementById("txtApellido").value = cells[2].innerHTML;
            document.getElementById("txtDireccion").value = cells[3].innerHTML;
            document.getElementById("txtUsuario").value = cells[4].innerHTML;
            document.getElementById("txtContraseña").value = cells[6].innerHTML;
            document.getElementById("txtEdad").value = cells[7].innerHTML;
            document.getElementById("txtCedula").value = cells[8].innerHTML;
            document.getElementById("txtTelefono").value = cells[9].innerHTML;
            document.getElementById("txtEmail").value = cells[10].innerHTML;
        }
    };
</script>

<style>
    .center {
        margin-top:100px;   
    }

    .modal-header {
        padding-bottom: 5px;
    }

    .modal-footer {
        padding: 0;
    }

    .modal-footer .btn-group input button{
        height:30px;
        border-top-left-radius : 0;
        border-top-right-radius : 0;
        border: none;
        border-right: 1px solid #ddd;
    }

    .modal-footer .btn-group:last-child > button {
        border-right: 0;
    }
</style>