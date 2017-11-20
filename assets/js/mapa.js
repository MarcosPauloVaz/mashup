var geocoder;
var map;
var marker;
 
function initialize(latidute, longitude, zoom) {
    var latlng = new google.maps.LatLng(latidute, longitude);
 
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
    
    geocoder = new google.maps.Geocoder();
 
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
    });
 
    marker.setPosition(latlng);
    map.setZoom(zoom);
}
 
