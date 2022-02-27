let latitud = document.getElementById("latitud").value;
let longitud = document.getElementById("longitud").value;

// let latlong = 'latitud,longitud'.split(",");

// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: parseFloat(latitud), lng: parseFloat(longitud) };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
