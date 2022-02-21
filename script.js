// let latitud = document.getElementById("latitud").value;
// let longitud = document.getElementById("longitud").value;

// let latlong = 'latitud,longitud'.split(",");
// let latitude = parseFloat(latlong[0]);
// let longitude = parseFloat(latlong[1]);


// function iniciarMap(){
//     var coord = {lat:latitud ,lng: longitud};
//     var map = new google.maps.Map(document.getElementById('map'),{
//       zoom: 10,
//       center: coord
//     });
//     var marker = new google.maps.Marker({
//       position: coord,
//       map: map
//     });
// }

function iniciarMap(){
  var coord = {lat:-34.5956145 ,lng: -58.4431949};
  // var coord = {lat: 38.908967, lng:1.4246295};
  var map = new google.maps.Map(document.getElementById('map'),{
    zoom: 10,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  });
}