window.addEventListener("DOMContentLoaded", function(){

  //Carte des points topo
  //var map = L.map('map').setView([49.047662, 3.405495],20);

  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  // }).addTo(map);

//LES ICONES
  //Pour les Clou
  var clouIcon = L.icon({
    iconUrl: 'img/Clou.png',
    iconSize: [10, 10],
    iconAnchor: [5, 5],
    popupAnchor: [0, 0],
  });

  //Pour les Laser
  var laserIcon = L.icon({
    iconUrl: 'img/Laser.png',
    iconSize: [10, 10],
    iconAnchor: [5, 5],
    popupAnchor: [0, 0],
  });

  // L.marker([49.0477252, 3.4056773], {icon: bwIcon}).addTo(map)
  //       .bindPopup('Test')

  //Pour les Clous
  var clous = L.layerGroup();

  fetch('coord/Clou.geojson')
  .then(function (result) {
    return result.json();
  })
  .then(function (json) {
    //Affiche chaque marker
    L.geoJSON(json, {
      pointToLayer: function(feature,latlng){
        return L.marker(latlng,{icon: clouIcon});
      }
    }).bindPopup(function (layer) {
        return layer.feature.properties.link;
    }).addTo(clous);
  })

  //Pour les Lasers
  var laser = L.layerGroup();

  fetch('coord/Laser.geojson')
  .then(function (result) {
    return result.json();
  })
  .then(function (json) {
    //Affiche chaque marker
    L.geoJSON(json, {
      pointToLayer: function(feature,latlng){
        return L.marker(latlng,{icon: laserIcon});
      }
    }).bindPopup(function (layer) {
        return layer.feature.properties.name;
    }).addTo(laser);
  })

  //La Carte
  var map = new L.Map("map", {
    center: new L.LatLng(49.0473300, 3.4037355),
    zoom: 18,
    layers: [clous, laser],
  });
  map.options.minZoom = 16;

  var imageUrl = 'img/plan.jpg',
    imageBounds = [[49.0482681, 3.4006980], [49.0461957, 3.4066582]];
  L.imageOverlay(imageUrl, imageBounds).addTo(map);

  var overlayMaps = {
    "Clous": clous,
    "Laser": laser
  };

  var layerControl = L.control.layers(null, overlayMaps).addTo(map);



});
