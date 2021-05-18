let map;
var opciones = null;

function posicionar_marcadores(){  

  //Markadores
  const marker = new google.maps.Marker({
    position: { lat: -29.90453, lng: -71.24894},
    map: map
  });

  // Informacion marcador
  const infoMark = new google.maps.InfoWindow({
    content: '<h2>La Serena</h2>'
  });

  marker.addListener(
    "mouseover", 
    () =>{ detailWindows.open(map,marker);}
    );
}

function initMap() {
  //Obtengo ubicacion 
  navigator.geolocation.getCurrentPosition(success,error);  
}

function error(){  
  // Opciones del mapa
  opciones = {
    center: {
      lat: -29.90453, 
      lng: -71.24894 
    },
    zoom: 13
  }
  // Mapa 
  map = new google.maps.Map(document.getElementById("map"),opciones);
  posicionar_marcadores(map);
}

function success(posicion){
  // Opciones del mapa
  opciones = {
    center: {
      lat: posicion.coords.latitude, 
      lng: posicion.coords.longitude
    },
    zoom: 15
  };
  // Mapa 
  map = new google.maps.Map(document.getElementById("map"),opciones);
  posicionar_marcadores(map);
}