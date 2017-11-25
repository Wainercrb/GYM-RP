function initMap() {
    var im = 'http://www.robotwoods.com/dev/misc/bluecircle.png';
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 16
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            document.getElementById("inputLatitud").value = position.coords.latitude;
            document.getElementById("inputLongitud").value = position.coords.longitude;
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var userMarker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: im
            });
            map.setCenter(pos);
        });
    }
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
}