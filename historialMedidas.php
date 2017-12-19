<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DETALLES</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css">
        <link rel="stylesheet" type="text/css" href="css/mycss/historialMedidas.css">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="js/MyJS/miHistorial.js"></script>
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "./header.php";
        ?>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic"></label>
                <div class="col-lg-6">
                    <input type="date"  placeholder="De" class="input" id="input-buscar" name="fInicial"/>
                    <label> -> </label>
                    <input type="date" placeholder="Hasta" class="input" id="input-buscar" name="fFinal"/>
                    <button name="btnBuscar" class="btn btn-default" type="submit">Buscar</button>

                </div>
            </div>
        </form>
        <?php
        $resultSet = [];
        include './php/conexion.php';
        $cargados = 0;
        if (isset($_POST['fFinal']) && isset($_POST['fInicial'])) {
        $sql = "SELECT * from historial WHERE usuario = '$navbarUsuario' AND fecha >= '$_POST[fInicial]' and fecha <= '$_POST[fFinal]'";
        $query = $con->query($sql);
        while ($row = $query->fetch_array()) {
            $resultSet[] = $row;
            $cargados++;
            }
        } 
        if ($cargados > 10) {
            die('<h1 class = "text-center" style="color: red">SELECCIONA UN RANGO MENOR DE FECHAS</h1>');
        }
        ?>
        <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-body">
                <div class="text-center center-block" id="div-buttons">
                    <img id="imagenModal" src="" class="img-responsive" />
                    <br>
                </div>
                <button type="button" class="close center-block" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
            </div>
          </div>
       </div>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script>
            Highcharts.chart('container', {
            chart: {
            type: 'line'
            },
                    title: {
                    text: 'Historial de medidas'
                    },
                    subtitle: {
                    text: '<?php echo 'Usuario: ' . $navbarUsuario; ?>'
                    },
                    xAxis: {
                    categories: [<?php foreach ($resultSet as $valor) { ?>
                        '<?php echo $valor["fecha"]; ?>',
                 <?php }
                 ?>]
                    },
                    yAxis: {
                    title: {
                    text: 'Medias registradas'
                    }
                    },
                    plotOptions: {
                    line: {
                    dataLabels: {
                    enabled: true
                    },
                            enableMouseTracking: false
                    }
                    },
                    series: [{
                    name: 'Peso',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["peso"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Altura',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["altura"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Cuello',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["cuello"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Hombros',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["hombros"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Pecho',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["pecho"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Cintura',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["cintura"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'Antebrazo',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["antebrazo"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'muzlo',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["muslo"]); ?>'),
                    <?php }
                    ?>]
                    },
                    {
                    name: 'pantorrillas',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["pantorrillas"]); ?>'),
                   <?php }
                   ?>]
                    },
                    {
                    name: 'Bíceps',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["biceps"]); ?>'),
                  <?php }
                  ?>]
                    },
                    {
                    name: 'Gluteos',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["gluteos"]); ?>'),
                 <?php }
                  ?>] 
                    },
                    {
                    name: 'Caderas',
                            data: [<?php foreach ($resultSet as $valor) { ?>
                                parseInt('<?php echo ceil($valor["cadera"]); ?>'),
                  <?php }
                   ?>]

                    }]
            });
        </script>
        <br>
        <br>
        <div class="container" id="div-buttons">
            <div class="btn-group">
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="IC" onclick="addImageModal(this.value)">MASA CORPORAL</button>
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="FC"  onclick="addImageModal(this.value)">FRECUENCIA CARDIACA</button>
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="ICC" onclick="addImageModal(this.value)">INDICE CINTURA</button>
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="ICC" onclick="addImageModal(this.value)">FALTA</button>
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="ICC" onclick="addImageModal(this.value)">FALTA</button>
                <button type="button" data-toggle="modal" data-target="#processing-modal" class="btn btn-default" value="ICC" onclick="addImageModal(this.value)">FALTA</button>
            </div>
        </div>        
        
    <?php      
       foreach ($resultSet as $valor) 
        {
           $indice = ceil($valor["peso"] / ($valor["altura"]*$valor["altura"]));
           $cardiaca = ceil(207 - (0.7019864*$_SESSION["EDAD"]));
           $indiceCintura = ceil($valor["cintura" / $valor["cadera"]]);  
        ?>    
           <div class="container">
                <h3 class="text-center">Fecha de medias <?php echo$valor["fecha"] ?></h3>
                <div class="row">
                    <div class="col-md-2" >
                        <div class="product-item">
                            <h3 class="text-center">Indice corporal</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php echo $indice; ?></h1>   
                            </div>
                    
                            <h3 class="text-center"><?php echo "Estas en: "."<script> document.write(indiceMasaT($indice)) </script>" ?></h3>
                        </div>
                        
                    </div>
                    <div class="col-md-2">
                        <div class="product-item">
                            <h3 class="text-center">FRECUENCIA CARDIACA</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php echo $cardiaca; ?></h1> 
                            </div>
                               <h3 class="text-center"><?php echo "Condición: "."<script> document.write(indiceFrecuenciaCardiaca($_SESSION[EDAD], $cardiaca, '$_SESSION[GENERO]'))</script>" ?></h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="product-item">
                        <h3 class="text-center">INDICE CINTURA</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php echo$indiceCintura?></h1>
                            </div>
                        <h3 class="text-center"><?php echo "Condición: "."<script> document.write(indiceMasa($indiceCintura, '$_SESSION[GENERO]'))</script>" ?></h3>
                     
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="product-item">
                        <h3 class="text-center">FALTA</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="product-item">
                        <h3 class="text-center">FALTA</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="product-item">
                        <h3 class="text-center">FALTA</h3>
                            <div class="pi-img-wrapper">
                                <h1 class="text-center"><?php?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        <?php
        } 
        if ($cargados === 0) {
            echo '<h1 class = "text-center" style="color: red">NO HAY REGISTROS</h1>';
        }else{
             echo '<h1 class = "text-center" style="color: red"> TOTAL RUTINAS CARGADAS -> '.$cargados.'</h1>';
        }
        ?>
    <?php include "footer.php"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>


