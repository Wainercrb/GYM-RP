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
        include './php/conexion.php';
        $sql = "SELECT DISTINCT l.id_local, l.nombre, l.telefono, l.email from locales l, gym_admin ga WHERE ga.id_local = l.id_local AND ga.id_admin = $_SESSION[ID]";
        if (!$query = $con->query($sql)) {
            die("Error description: " . mysqli_error($con));
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="div-table">
                        <h4 class="text-center">GTM REGISTRADO</h4>
                        <div class="table-responsive" id="div-table">
                            <form name="mantenimeintoTrabajador" action="php/registroTrabajador.php.php" method="POST">
                                <table id="mytable" class="table table-bordred table-inverse">
                                    <thead>        
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Accion</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;


                                        while ($row = $query->fetch_array()) {
                                            $contador++;
                                            $idT = $row['id_local'];
                                            $nombre = $row["nombre"];
                                            $telefono = $row['telefono'];
                                            $emil = $row['email'];
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $idT; ?></td>
                                                <td><?php echo $nombre; ?></td>
                                                <td><?php echo $telefono; ?></td>
                                                <td><?php echo $emil; ?></td>                      
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" name="editar" type="button" data-target="#squarespaceModal"  value="<?php echo $idT; ?>"                                                                                                                  wainer"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
        <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Mantenimiento Trabajador</h3>
                    </div>
                    <form  action="php/ActualizarGym.php" method="post">
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
                                <label for="exampleInputEmail1">Teléfono</label>
                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail">
                            </div>
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
                    document.getElementById("txtTelefono").value = cells[2].innerHTML;
                    document.getElementById("txtEmail").value = cells[3].innerHTML;
                }
            };
        </script>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/MyJS/mantenimientoUsuario.js"></script>

    </body>
</html>