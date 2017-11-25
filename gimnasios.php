<!DOCTYPE html>
<?php
include './php/conexion.php';
$sql = "";
$valor = "";
$select = "";
if (isset($_POST["selectBuscar"]) && isset($_POST["btnBuscar"])) {
    if ($_POST["selectBuscar"] === "todo" || $_POST["selectBuscar"] === "distancia" || $_POST["selectBuscar"] === "lugar") {
        $sql = "SELECT * FROM locales";
    } else if ($_POST["selectBuscar"] === "likes") {
        $sql = "SELECT * FROM locales WHERE puntuacionMas >= $_POST[btnBuscar]";
    } else if ($_POST["selectBuscar"] === "nombre") {
        $sql = "SELECT * FROM locales WHERE nombre like '$_POST[btnBuscar]%'";
    }
}
?>
<script>
    var uLatitud = 0.0;
    var uLongitud = 0.0;
    var lati = 0.0;
    var longt = 0.0;
</script>
<script>
    function getDistanceFromLatLonInKm(lat2, lon2) {

        var lat1 = "<?php echo $_POST["inputLatitud"]; ?>";
        var lon1 = "<?php echo $_POST["inputLongitud"]; ?>";
        var R = 6371;
        var dLat = deg2rad(lat2 - lat1);  // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2)
                ;
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km

        distancia = d;
        distancia = distancia.toFixed(2);

        return d;

    }
    function deg2rad(deg) {
        document.getElementById("inputTres").value = deg * (Math.PI / 180);
        return deg * (Math.PI / 180)
    }

</script>

<html>
    <head>
        <title>Geolocation</title>
        <meta charset="utf-8">
        <title>Detalles productos</title>
        <meta name="viewport" content="widt=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css">
        <link rel="stylesheet" type="text/css" href="css/mycss/gimnasios.css">
    </head>
    <body>
        <div class="container" id="container-map">
            <h1>Mi ubucación actual</h1>
            <div id="map_container"></div>
            <div id="map"></div>
        </div>	
        <div class="container" id="container">
            <form name="frmBuscar" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 col-md-offset-3">
                    <div class="input-group my-group ce"> 
                        <input style="display: none" name="inputLatitud" id="inputLatitud"/>
                        <input style="display: none" name="inputLongitud" id="inputLongitud"/>
                        <input type="text" class="form-control" name="btnBuscar" placeholder="Ingrese el valor a buscar"/>
                        <select id="lunch" name="selectBuscar" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                            <option value="todo">todo</option>
                            <option value="likes">Likes</option>
                            <option value="nombre">Nombre</option>
                            <option value="distancia">Distancia</option>
                            <option value="lugar">Lugar</option>
                        </select> 
                        <span class="input-group-btn">
                            <button class="btn btn-default my-group-button" type="submit">buscar</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="container" id="container">
            <div class="row text-center center-block" style="max-width:90%;">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th class="c1">Nombre</th>
                            <th class="c2">Teléfono</th>
                            <th class="c3">Email</th>
                            <th class="c4">likes</th>
                            <th class="c4">deslikes</th>
                            <th style="display: none">Latitud</th>
                            <th style="display: none">Longitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($sql != "") {
                            $contador = 0;
                            if (!$query = $con->query($sql)) {
                                die("Error description al cargar el trabajador :(..Detalles: " . mysqli_error($con));
                                return;
                            }
                            while ($row = $query->fetch_array()) {
                                if ($_POST["selectBuscar"] === "distancia") {
                                    $decimals = 2;
                                    $point1_lat = $row["latitud"];
                                    $point1_long = $row["longitud"];
                                    $point2_lat = $_POST["inputLatitud"];
                                    $point2_long = $_POST["inputLongitud"];
                                    $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));
                                    $distance = $degrees * 111.13384;
                                    $filal = round($distance, $decimals);
                                    if ($filal <= $_POST["btnBuscar"]) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['telefono']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['puntuacionMas']; ?></td>
                                            <td><?php echo $row['puntuacionMenos']; ?></td>
                                            <td style="display: none"><?php echo $row['latitud']; ?></td>
                                            <td style="display: none"><?php echo $row['longitud']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else if ($_POST["selectBuscar"] === "likes" || $_POST["selectBuscar"] === "nombre" || $_POST["selectBuscar"] === "todo") {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['puntuacionMas']; ?></td>
                                        <td><?php echo $row['puntuacionMenos']; ?></td>
                                        <td style="display: none"><?php echo $row['latitud']; ?></td>
                                        <td style="display: none"><?php echo $row['longitud']; ?></td>
                                    </tr>                                                                                                                                                                                                   
                                    <?php
                                } else if ($_POST["selectBuscar"] === "lugar") {
                                    $lat = $row["latitud"];
                                    $lng = $row["longitud"];
                                    $data = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                                    $data = json_decode($data);
                                    $add_array = $data->results;
                                    $add_array = $add_array[0];
                                    $add_array = $add_array->address_components;
                                    $country = "Not found";
                                    $state = "Not found";
                                    $city = "Not found";
                                    foreach ($add_array as $key) {
                                        if ($key->types[0] == 'administrative_area_level_2') {
                                            $city = $key->long_name;
                                        }
                                        if ($key->types[0] == 'administrative_area_level_1') {
                                            $state = $key->long_name;
                                        }
                                        if ($key->types[0] == 'country') {
                                            $country = $key->long_name;
                                        }
                                    }

                                    if ($city === $_POST["btnBuscar"]) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['telefono']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['puntuacionMas']; ?></td>
                                            <td><?php echo $row['puntuacionMenos']; ?></td>
                                            <td style="display: none"><?php echo $row['latitud']; ?></td>
                                            <td style="display: none"><?php echo $row['longitud']; ?></td>
                                        </tr>       
                                        <?php
                                    }
                                }
                            }
                            $contador++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include './footer.php' ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/MyJS/gimnasios.js"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQFJdLinZ94oC6GJD3s_IuxhBJuPRgtjM&callback=initMap">
        </script>
    </body>
</html>







