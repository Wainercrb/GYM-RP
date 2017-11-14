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
                        <form class="form-horizontal" action="" method="post">
                            <fieldset>
                                <legend class="text-center">GTM-UTN-AÑADIR RUTINAS</legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Participánte</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Usuario">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button">Añadir</button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" id="btnMembers" type="button">Miembros</button>
                                            </span>
                                            <div class="modal fade" id="modalMiembros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document" id="modal_size">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="exampleModalLabel">Integrantes del grupo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="flex-container">
                                                                <div> <table class="table table-striped custab">
                                                                        <thead>
                                                                      
                                                                        <tr>
                                                                           
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Cédula</th>
                                                                            <th class="text-center">Acción</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tr>
                                                                            <td>Wainer</td>
                                                                            <td>Rodriguez Bonila</td>
                                                                            <td>504130864</td>
                                                                            <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Agregar</a></td>
                                                                        </tr>
                                                                       
                                                                    </table></div>
                                                                <div style="width: 10% !important"></div>
                                                  
                                                                <div> <table class="table table-striped custab">
                                                                        <thead>
                                                                      
                                                                        <tr>
                                                                           
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Cédula</th>
                                                                            <th class="text-center">Acción</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tr>
                                                                             <td>Wainer</td>
                                                                            <td>Rodriguez Bonila</td>
                                                                            <td>504130864</td>
                                                                            <td class="text-center"><a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Quitar</a></td>
                                                                        </tr>
                                                                        
                                                                    </table></div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitar</button>
                                                            <button type="button" class="btn btn-primary">Cerrar</button>
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
                                        <select class="form-control form-select ajax-processed" id="edit-node-type" name="node_type">
                                            <option value="-1" selected="selected">Seleccion el lugar del cuerpo a trabajar</option>
                                            <option value="boncoPress.jpg">Banco Press</option>
                                            <option value="11">Blue</option>
                                            <option value="9">Gray</option>
                                            <option value="10">Red</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Equipo</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" id="edit-node-type" name="node_type">
                                            <option value="-1" selected="selected">Seleccion el ejercicio</option>
                                            <option value="boncoPress.jpg">Banco Press</option>
                                            <option value="11">Blue</option>
                                            <option value="9">Gray</option>
                                            <option value="10">Red</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Tipo Ejercicio</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-select ajax-processed" id="edit-node-type" name="node_type">
                                            <option value="-1" selected="selected">Seleccion el tipo de ejercicio</option>
                                            <option value="boncoPress.jpg">Banco Press</option>
                                            <option value="11">Blue</option>
                                            <option value="9">Gray</option>
                                            <option value="10">Red</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" id="btnRegisterRoutine" class="btn btn-primary btn-lg">Cargar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/RegistroRutina.js"></script>
    </body>
</html>