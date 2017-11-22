
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mis rutinas</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
        <?php
        include './php/InfoNavbar.php';
        include "header.php";
        ?>
        <?php
        include './php/conexion.php';
        $sql = "SELECT * from historial where usuario = '$navbarUsuario'";      
        ?>


        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <script>
            Highcharts.chart('container', {
            chart: {
            type: 'line'
            },
                    title: {
                    text: 'Historaial'
                    },
                    subtitle: {
                    text: '<?php echo 'Usuario: '.$navbarUsuario; ?>'
                    },
                    xAxis: {
                    categories: [<?php
                            
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          '<?php echo $row["fecha"]; ?>',
       
                                        <?php 
                                       }
                                       ?>]
                    },
                    yAxis: {
                    title: {
                    text: 'Historial de peso'
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
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["peso"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Altura',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["altura"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]
                                    },
                                    {
                    name: 'Cuello',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["cuello"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]
                                    },
                                    {
                    name: 'Hombros',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["hombros"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]
                                    },
                                    {
                    name: 'Pecho',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["pecho"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Cintura',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["cintura"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Antebrazo',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["antebrazo"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'muzlo',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["muslo"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'pantorrillas',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["pantorrillas"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Bíceps',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["biceps"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Gluteos',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["gluteos"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]},
                                    {
                    name: 'Caderas',
                            data: [<?php
                                $query = $con->query($sql);
                                    while ($row = $query->fetch_array()) 
                                         {
                                        ?>
                                          parseInt('<?php echo $row["cadera"]; ?>'),
       
                                        <?php 
                                       }
                                       ?>
                                    ]
                    }]
            });
        </script>
        <?php
        include "footer.php";
        ?>
        <style>
                
            footer{
                margin-top: 10%;
                
            }
            
        </style>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

