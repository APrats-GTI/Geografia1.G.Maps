let latitud = document.getElementById("latitud").value;
let longitud = document.getElementById("longitud").value;

document.write(latitud);


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
  // var coord = {lat:-34.5956145 ,lng: -58.4431949};
  var coord = {lat:parseInt(latitud) ,lng: parseInt(longitud)};
  var map = new google.maps.Map(document.getElementById('map'),{
    zoom: 10,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  });
}