<script>
    var latitud;
    var longitud;
    function getLocation() {
        alert("locatin");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Este navegador no soporta google maps");
        }
    }
    function showPosition(position) {
        var latlon = position.coords.latitude + "," + position.coords.longitude;
        latitud = parseFloat(sessionStorage.getItem(position.coords.latitude));
        longitud = parseFloat(sessionStorage.getItem(position.coords.longitude));
        initMap(position.coords.latitude, position.coords.longitude);
        document.getElementById("txtLatitud").value = position.coords.latitude;
        document.getElementById("txtLongitud").value = position.coords.longitude;
    }
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.")
                break;
        }
    }
    function initMap(a, b) {
        var uluru = {lat: a, lng: b};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>