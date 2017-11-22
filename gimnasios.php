<!DOCTYPE html>
<?php
include './php/conexion.php';
$valor = "";
$select = "";
?>

<html>
    <head>
        <title>Geolocation</title>
        <meta charset="utf-8">
        <title>Detalles productos</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <style>




            h1{
                font-size: 45px;
                width: 100%;
                text-align: center;
                font-weight: bold;
                color:black;
                margin-bottom: 40px;
                color: #000;
                text-shadow: 0 2px 3px #555555;
                font-family: Tahoma;
            }


            .container{
                width: 100%;
                margin: 0 auto;
                margin-top:50px;
            }

            #map_container{
                position: relative;
            }
            #map{
                height: 0;
                overflow: hidden;
                padding-bottom: 22.25%;
                margin-bottom: 15%;
                padding-top: 30px;
                position: relative;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="input-group my-group ce"> 
                    <input type="text" class="form-control" name="btnBuscar" placeholder="Ingrese el valor a buscar"/>
                    <select id="lunch" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                        <option>Likes</option>
                        <option>Nombre</option>
                        <option>Distancia</option>
                        <option>Lugar</option>
                    </select> 
                    <span class="input-group-btn">
                        <button class="btn btn-default my-group-button" type="submit">GO!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="container">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>likes</th>
                        <th>deslikes</th>
                        <th style="display: none">Latitud</th>
                        <th style="display: none">Longitud</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 0;
                    $sql = "SELECT * FROM locales";
                    if (!$query = $con->query($sql)) {
                        die("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
                        return;
                    }
                    while ($row = $query->fetch_array()) {
                        ?>
                        <tr>
                            <td id="<?php echo $contador; ?>" onclick="myFunction();"><?php echo $row['nombre']; ?></td>
                            <td id="<?php echo $contador; ?>" onclick="myFunction();" ><?php echo $row['telefono']; ?></td>
                            <td id="<?php echo $contador; ?>" onclick="myFunction();"  ><?php echo $row['email']; ?></td>
                            <td id="<?php echo $contador; ?>" onclick="myFunction();" ><?php echo $row['puntuacionMas']; ?></td>
                            <td id="<?php echo $contador; ?>" onclick="myFunction();"><?php echo $row['puntuacionMenos']; ?></td>
                            <td style="display: none"><?php echo $row['latitud']; ?></td>
                            <td style="display: none"><?php echo $row['longitud']; ?></td>
                        </tr>

                        <?php
                    }
                    $contador++;
                    ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <h1>Mi ubucación actual</h1>
            <div id="map_container"></div>
            <div id="map"></div>
        </div>	

        <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 16
                });
                var infoWindow = new google.maps.InfoWindow({map: map});

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
            }
        </script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQFJdLinZ94oC6GJD3s_IuxhBJuPRgtjM&callback=initMap">
        </script>
    </body>
</html>

<style>

    .container{
        margin-top: 5% !important;
    }
    .my-group .form-control{
        width:50%;
    }

</style>

<script>


    function myFunction() {
        var x = document.getElementById("myTable").row[parseInt(document.getElementById(""))];
        alert("Found " + x + " cells in the first tr element.");
    }
</script>
<script>
//    var cell = document.getElementsByTagName("td");
//    var i = 0;
//    while (cell[i] != undefined) {
//        alert(cell[i].innerHTML); //do some alert for test
//        i++;
//    }//end while
</script>


