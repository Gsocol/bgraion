var map, featureList, boroughSearch = [], theaterSearch = [], museumSearch = [], fapSearch = [],raionSearch = [], fedSearch = [],pchSearch = [];

var baselayersConf = [
    {
        "name"         : "open street map",
        "key"          : "open_street_map",
        "tileUrlTmpl"  : "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        "isElliptical" : false,
        "subdomains"   : "abc",
        "minZoom"      : 0,
        "maxZoom"      : 19
    },
    {
        "name"         : "2gis",
        "key"          : "2gis",
        "tileUrlTmpl"  : "http://tile{s}.maps.2gis.com/tiles?x={x}&y={y}&z={z}",
        "isElliptical" : false,
        "subdomains"   : "0123",
        "minZoom"      : 0,
        "maxZoom"      : 18
    },
    {
        "name"         : "yandex",
        "key"          : "yandex",
        "tileUrlTmpl"  : "http://vec0{s}.maps.yandex.net/tiles?l=map&x={x}&y={y}&z={z}",
        "isElliptical" : true,
        "subdomains"   : "1234",
        "minZoom"      : 0,
        "maxZoom"      : 18
    },
    {
        "name"         : "yandex satellite",
        "key"          : "yandex_satellite",
        "tileUrlTmpl"  : "http://sat0{s}.maps.yandex.net/tiles?l=sat&x={x}&y={y}&z={z}",
        "isElliptical" : true,
        "subdomains"   : "1234",
        "minZoom"      : 0,
        "maxZoom"      : 19
    }
];
var orenburgLatLng = L.latLng(51.7689, 55.100555);

$(window).resize(function() {
  sizeLayerControl();
});

$(document).on("click", ".feature-row", function(e) {
  $(document).off("mouseout", ".feature-row", clearHighlight);
  sidebarClick(parseInt($(this).attr("id"), 10));
});

if ( !("ontouchstart" in window) ) {
  $(document).on("mouseover", ".feature-row", function(e) {
    highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
  });
}

$(document).on("mouseout", ".feature-row", clearHighlight);

$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#full-extent-btn").click(function() {
//  map.fitBounds(boroughs.getBounds());
    map.fitBounds(wifi.getBounds());
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#legend-btn").click(function() {
  $("#legendModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#login-btn").click(function() {
  $("#loginModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#list-btn").click(function() {
  animateSidebar();
  return false;
});

$("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});

$("#sidebar-toggle-btn").click(function() {
  animateSidebar();
  return false;
});

$("#sidebar-hide-btn").click(function() {
  animateSidebar();
  return false;
});

function animateSidebar() {
  $("#sidebar").animate({
    width: "toggle"
  }, 350, function() {
    map.invalidateSize();
  });
}

function sizeLayerControl() {
  $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
}

function clearHighlight() {
  highlight.clearLayers();
}

function sidebarClick(id) {
  var layer = markerClusters.getLayer(id);
  map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
  layer.fire("click");
  /* Hide sidebar and go to the map on small screens */
  if (document.body.clientWidth <= 767) {
    $("#sidebar").hide();
    map.invalidateSize();
  }
}

function syncSidebar() {
  /* Empty sidebar features */
  $("#feature-list tbody").empty();
  /* Loop through theaters layer and add only features which are in the map bounds */
  theaters.eachLayer(function (layer) {
    if (map.hasLayer(theaterLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon2.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through museums layer and add only features which are in the map bounds */
  omsu.eachLayer(function (layer) {
    if (map.hasLayer(omsuLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });

  wifi.eachLayer(function (layer) {
    if (map.hasLayer(wifiLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/img/wifi.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });

    OIV.eachLayer(function (layer) {
        if (map.hasLayer(OIVLayer)) {
            if (map.getBounds().contains(layer.getLatLng())) {
                $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/img/icon3.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            }
        }
    });
    fed.eachLayer(function (layer) {
        if (map.hasLayer(fedLayer)) {
            if (map.getBounds().contains(layer.getLatLng())) {
                $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/img/pch1.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            }
        }
    });
    pch.eachLayer(function (layer) {
        if (map.hasLayer(pchLayer)) {
            if (map.getBounds().contains(layer.getLatLng())) {
                $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/img/pch2.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            }
        }
    });

  /* Update list.js featureList */
  featureList = new List("features", {
    valueNames: ["feature-name"]
  });
  featureList.sort("feature-name", {
    order: "asc"
  });
}

/* Basemap Layers */
var cartoLight = L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>'
});

var gis_2 = L.tileLayer("http://tile{s}.maps.2gis.com/tiles?x={x}&y={y}&z={z}&v=1&ts=online_sd", {
    minZoom: 0,
    maxZoom:18,
    isElliptical:false,
    subdomains: "abc",
});
//var yandex = L.tileLayer("http://vec{s}.maps.yandex.net/tiles?l=map&v=4.55.2&z={z}&x={x}&y={y}&scale=2&lang=ru_RU", {
var yandex = L.tileLayer("http://vec{s}.maps.yandex.net/tiles?l=map&z={z}&x={x}&y={y}&lang=ru_RU", {
//var yandex = L.tileLayer("http://vec0{s}.maps.yandex.net/tiles?l=map&x={x}&y={y}&z={z}", {
    subdomains: ['01', '02', '03', '04'],
    attribution: '<a http="yandex.ru" target="_blank">Яндекс</a>',
    isElliptical:false,
    reuseTiles: true,
    updateWhenIdle: false,
    zoomControl: false,
    maxNativeZoom: 18
});

var gis = L.tileLayer("http://tile{s}.maps.2gis.com/tiles?x={x}&y={y}&z={z}", {
    subdomains: "0123",
    attribution: '<a http="2gis.com" target="_blank">2GIS</a>',
    reuseTiles: true,
    updateWhenIdle: false,
    zoomControl: false,
    maxNativeZoom: 17
});

//var yandex_sat = L.tileLayer("http://sat0{s}.maps.yandex.net/tiles?l=sat&x={x}&y={y}&z={z}", {
//    subdomains:"0123",
//    updateWhenIdle: false,
//    attribution: '<a http="yandex.ru" target="_blank">Яндекс</a>',
//    reuseTiles: true,
//    maxNativeZoom: 17
//});

var osm = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
});

var sputnik = L.tileLayer("http://tiles.maps.sputnik.ru/tiles/kmt2/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution: '&copy; <a href="http://maps.sputnik.ru/">Спутник</a>'
});

var mapbox = L.tileLayer("https://api.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
    maxZoom: 18,
    attribution: '&copy; <span>MapBox</span>'
});
var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});


var usgsImagery = L.layerGroup([L.tileLayer("http://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}", {
  maxZoom: 15,
}), L.tileLayer.wms("http://raster.nationalmap.gov/arcgis/services/Orthoimagery/USGS_EROS_Ortho_SCALE/ImageServer/WMSServer?", {
  minZoom: 16,
  maxZoom: 19,
  layers: "0",
  format: 'image/jpeg',
  transparent: true,
  attribution: "Aerial Imagery courtesy USGS"
})]);

/* Overlay Layers */
var highlight = L.geoJson(null);
var highlightStyle = {
  stroke: false,
  fillColor: "#00FFFF",
  fillOpacity: 0.7,
  radius: 10
};

var boroughs = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "red",
      weight: 2,
      fill: false,
      opacity: 1,
//      clickable: false
    };
  },
  onEachFeature: function (feature, layer) {
    boroughSearch.push({
      name: layer.feature.properties.Name,
      source: "Boroughs",
      id: L.stamp(layer),
      bounds: layer.getBounds()
    });
      if (feature.properties) {
          var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Площадь</th><td>" + feature.properties.AREA + " кв.км"+"</td></tr>" + "<tr><th>Название</th><td>" + feature.properties.NAME_EN + "</td></tr>" + "<table>";
          layer.on({
              click: function (e) {
                  $("#feature-title").html(feature.properties.NAME);
                  $("#feature-info").html(content);
                  $("#featureModal").modal("show");

              }
          });
      }

  }
});

$.getJSON("data/Board.geojson", function (data) {
//$.getJSON("data/wi-fi.geojson", function (data) {
  boroughs.addData(data);
});

////////////////////////////////////////////////////////////////////////////////////////////////
////////////    РАЙОНЫ
var raions = L.geoJson(null, {
    style: function (feature) {
        return {
            color: "green",
            weight: 2,
            fill: true,
            opacity: 1,
//            clickable: false
        };
    },

    onEachFeature: function (feature, layer) {
        raionSearch.push({
            name: layer.feature.properties.NAME,
            source: "Raions",
            id: L.stamp(layer),
            bounds: layer.getBounds()
        });

        if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.NAME);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");

                }
            });
        }

        layer.on({
            mouseover: function (e) {
                var layer = e.target;
                layer.setStyle({
                    weight: 2,
                    color: "#49ff72",
                    opacity: 1
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            },
            mouseout: function (e) {
                raions.resetStyle(e.target);
            }
        });


    }
}).bindTooltip(function (layer) {
    return layer.feature.properties.NAME;
});

$.getJSON("data/kvark.geojson", function (data) {
//$.getJSON("data/wi-fi.geojson", function (data) {
    raions.addData(data);
});



///////////////////////////////////////////////////////////////////////////////////////////////////////////




//Create a color dictionary based off of subway route_id
var subwayColors = {"1":"#ff3135", "2":"#ff3135", "3":"ff3135", "4":"#009b2e",
    "5":"#009b2e", "6":"#009b2e", "7":"#ce06cb", "A":"#fd9a00", "C":"#fd9a00",
    "E":"#fd9a00", "SI":"#fd9a00","H":"#fd9a00", "Air":"#ffff00", "B":"#ffff00",
    "D":"#ffff00", "F":"#ffff00", "M":"#ffff00", "G":"#9ace00", "FS":"#6e6e6e",
    "GS":"#6e6e6e", "J":"#976900", "Z":"#976900", "L":"#969696", "N":"#ffff00",
    "Q":"#ffff00", "R":"#ffff00" };

var subwayLines = L.geoJson(null, {
  style: function (feature) {
      return {
        color: subwayColors[feature.properties.route_id],
        weight: 3,
        opacity: 1
      };
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Division</th><td>" + feature.properties.Division + "</td></tr>" + "<tr><th>Line</th><td>" + feature.properties.Line + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Line);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
    layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 3,
          color: "#00FFFF",
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
        }
      },
      mouseout: function (e) {
        subwayLines.resetStyle(e.target);
      }
    });
  }
});

$.getJSON("data/subways.geojson", function (data) {
  subwayLines.addData(data);
});






// Добавляем кластеризацию

var markerClusters = new L.MarkerClusterGroup({
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: true,
  zoomToBoundsOnClick: true,
  disableClusteringAtZoom: 16
 });

/* Empty layer placeholder to add to layer control for listening when to add/remove theaters to markerClusters layer */
var theaterLayer = L.geoJson(null);
var theaters = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/img/icon2.png",
        iconSize: [24, 28],
        iconAnchor: [12, 28],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.NAME,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.SUBTYPE + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.F_ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.NAME);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon3.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      theaterSearch.push({
        name: layer.feature.properties.NAME,
        address: layer.feature.properties.F_ADRES,
        source: "Theaters",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("data/ADM_RAION.geojson", function (data) {
  theaters.addData(data);
});


var OIVLayer = L.geoJson(null);
var OIV = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: "assets/img/icon3.png",
                iconSize: [24, 28],
                iconAnchor: [12, 28],
                popupAnchor: [0, -25]
            }),
            title: feature.properties.NAME,
            riseOnHover: true
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.SUBTYPE + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.F_ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.NAME);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");
                    highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon3.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            boroughSearch.push({
                name: layer.feature.properties.NAME,
                address: layer.feature.properties.F_ADRES,
                source: "Boroughs",
                id: L.stamp(layer),
                lat: layer.feature.geometry.coordinates[1],
                lng: layer.feature.geometry.coordinates[0]
            });
        }
    }
});

$.getJSON("data/OIV.geojson", function (data) {
    OIV.addData(data);
    map.addLayer(OIVLayer);
});



/* Empty layer placeholder to add to layer control for listening when to add/remove museums to markerClusters layer */


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////
var wifiLayer = L.geoJson(null);
var wifi = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/img/wifi.png",
        iconSize: [28, 28],
        iconAnchor: [12, 28],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.NAME,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.SUBTYPE + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.NAME);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/museum.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      fapSearch.push({
        name: layer.feature.properties.NAME,
        address: layer.feature.properties.ADRES,
        source: "fap",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("data/medic.geojson", function (data) {
  wifi.addData(data);
});
/////////////////////

var omsuLayer = L.geoJson(null);
var omsu = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: "assets/img/icon.png",
                iconSize: [28, 28],
                iconAnchor: [12, 28],
                popupAnchor: [0, -25]
            }),
            title: feature.properties.NAME,
            riseOnHover: true
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.OPIS + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.F_ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.NAME);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");
                    highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            museumSearch.push({
                name: layer.feature.properties.NAME,
                address: layer.feature.properties.F_ADRES,
                source: "Museums",
                id: L.stamp(layer),
                lat: layer.feature.geometry.coordinates[1],
                lng: layer.feature.geometry.coordinates[0]
            });
        }
    }
});
$.getJSON("data/selsovet1.geojson", function (data) {
    omsu.addData(data);
});
/////////////////////

var fedLayer = L.geoJson(null);
var fed = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: "assets/img/pch1.png",
                iconSize: [28, 28],
                iconAnchor: [12, 28],
                popupAnchor: [0, -25]
            }),
            title: feature.properties.NAME,
            riseOnHover: true
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.SUBTYPE + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.F_ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.SUBTYPE);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");
                    highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            fedSearch.push({
                name: layer.feature.properties.NAME,
                address: layer.feature.properties.F_ADRES,
                source: "Fed",
                id: L.stamp(layer),
                lat: layer.feature.geometry.coordinates[1],
                lng: layer.feature.geometry.coordinates[0]
            });
        }
    }
});
$.getJSON("data/fed.geojson", function (data) {
    fed.addData(data);
});
/////////////////////

var pchLayer = L.geoJson(null);
var pch = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: "assets/img/pch2.png",
                iconSize: [28, 28],
                iconAnchor: [12, 28],
                popupAnchor: [0, -25]
            }),
            title: feature.properties.NAME,
            riseOnHover: true
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Название</th><td>" + feature.properties.NAME + "</td></tr>" + "<tr><th>Тип</th><td>" + feature.properties.SUBTYPE + "</td></tr>" + "<tr><th>Адрес</th><td>" + feature.properties.F_ADRES + "</td></tr>" + "<tr><th>Код ФИАС</th><td>" + feature.properties.FIAS + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.SUBTYPE);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");
                    highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
            pchSearch.push({
                name: layer.feature.properties.NAME,
                address: layer.feature.properties.F_ADRES,
                source: "Fed",
                id: L.stamp(layer),
                lat: layer.feature.geometry.coordinates[1],
                lng: layer.feature.geometry.coordinates[0]
            });
        }
    }
});
$.getJSON("data/obl.geojson", function (data) {
    pch.addData(data);
});
/////////////////////



map = L.map("map", {
  zoom: 10,
  center: [51.7689, 55.100555],
  layers: [OpenTopoMap, mapbox, cartoLight, osm, yandex, gis,sputnik,boroughs, highlight],
//, markerClusters],
  zoomControl: false,
  attributionControl: false
});

//var overlay = L.wms.tileLayer("http://172.16.101.76:8080/geoserver/wms", {
//    layers: 'topp:tasmania_roads',
//    format: 'image/png',
//    transparent: true
//});
//overlay.addTo(map);


/* Layer control listeners that allow for a single markerClusters layer */
map.on("overlayadd", function(e) {
  if (e.layer === wifiLayer) {
    markerClusters.addLayer(wifi);
    syncSidebar();
  }
    if (e.layer === omsuLayer) {
        markerClusters.addLayer(omsu);
        syncSidebar();
    }
    if (e.layer === theaterLayer) {
        markerClusters.addLayer(theaters);
        syncSidebar();
    }
    if (e.layer === OIVLayer) {
        markerClusters.addLayer(OIV);
        syncSidebar();
    }
    if (e.layer === fedLayer) {
        markerClusters.addLayer(fed);
        syncSidebar();
    }
    if (e.layer === pchLayer) {
        markerClusters.addLayer(pch);
        syncSidebar();
    }

});

map.on("overlayremove", function(e) {
  if (e.layer === wifiLayer) {
    markerClusters.removeLayer(wifi);
    syncSidebar();
  }
    if (e.layer === omsuLayer) {
        markerClusters.removeLayer(omsu);
        syncSidebar();
    }
    if (e.layer === theaterLayer) {
        markerClusters.removeLayer(theaters);
        syncSidebar();
    }
    if (e.layer === OIVLayer) {
        markerClusters.removeLayer(OIV);
        syncSidebar();
    }
    if (e.layer === fedLayer) {
        markerClusters.removeLayer(fed);
        syncSidebar();
    }
    if (e.layer === pchLayer) {
        markerClusters.removeLayer(pch);
        syncSidebar();
    }
});

/* Filter sidebar feature list to only show features in current map bounds */
map.on("moveend", function (e) {
  syncSidebar();
});

/* Clear feature highlight when map is clicked */
map.on("click", function(e) {
  highlight.clearLayers();
});

/* Attribution control */
function updateAttribution(e) {
  $.each(map._layers, function(index, layer) {
    if (layer.getAttribution) {
      $("#attribution").html((layer.getAttribution()));
    }
  });
}
map.on("layeradd", updateAttribution);
map.on("layerremove", updateAttribution);

var attributionControl = L.control({
  position: "bottomright"
});

attributionControl.onAdd = function (map) {
  var div = L.DomUtil.create("div", "leaflet-control-attribution");
  div.innerHTML = "<span class='hidden-xs'>Developed by <a href='http://dit.orb.ru'>ДИТОО</a> | </span><a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Attribution</a>";
  return div;
};

map.addControl(attributionControl);

var zoomControl = L.control.zoom({
  position: "bottomright"
}).addTo(map);

var scale = L.control.scale().addTo(map);

//var m = L.control.polylineMeasure ({position:'topleft', unit:'metres', showBearings:true, clearMeasurementsOnStop: false, showClearControl: true, showUnitControl: true}).addTo (map);


if (document.body.clientWidth <= 767) {
  var isCollapsed = true;
} else {
  var isCollapsed = false;
}

var baseLayers = {
    "OpenTopoMap": OpenTopoMap,
    "Mapbox" : mapbox,
    "Street Map": cartoLight,
    "OSM": osm,
    "Яндекс карта": yandex,
    "2gis": gis,
    "Спутник" : sputnik,
};

var groupedOverlays = {
  "Точечные слои":
      {
//          "<img src='assets/img/theater.png' width='24' height='28'>&nbsp;Театры": theaterLayer,
//    "<img src='assets/img/museum.png' width='24' height='28'>&nbsp;Музеи": museumLayer,
      "<img src='assets/img/icon3.png' width='28' height='28'>&nbsp;ОИВ": OIVLayer,
      "<img src='assets/img/icon2.png' width='28' height='28'>&nbsp;Администрации": theaterLayer,
      "<img src='assets/img/icon.png' width='28' height='28'>&nbsp;Сельсоветы": omsuLayer,
      "<img src='assets/img/wifi.png' width='28' height='28'>&nbsp;Медицина": wifiLayer,
      "<img src='assets/img/pch1.png' width='28' height='28'>&nbsp;ПЧ (фед.)": fed,
      "<img src='assets/img/pch2.png' width='28' height='28'>&nbsp;ПЧ (обл.)": pchLayer,

       },
    "Полигоны и линии":
        {
        "Граница области": boroughs,
        "Районы области": raions,
//        "Необследованные":layer1,
//        "Данные 2015г":layer2,
//        "Данные 2009-2013гг":layer3,
        }

};

var layerControl = L.control.groupedLayers(baseLayers, groupedOverlays, {
  collapsed: false
}).addTo(map);




/* Highlight search box text on click */
$("#searchbox").click(function () {
  $(this).select();
});

/* Prevent hitting enter from refreshing the page */
$("#searchbox").keypress(function (e) {
  if (e.which == 13) {
    e.preventDefault();
  }
});

$("#featureModal").on("hidden.bs.modal", function (e) {
  $(document).on("mouseout", ".feature-row", clearHighlight);
});

/* Typeahead search functionality */
$(document).one("ajaxStop", function () {
  $("#loading").hide();
  sizeLayerControl();

  /* Fit map to boroughs bounds */
  map.fitBounds(wifi.getBounds());
  featureList = new List("features", {valueNames: ["feature-name"]});
  featureList.sort("feature-name", {order:"asc"});

  var boroughsBH = new Bloodhound({
    name: "Boroughs",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: boroughSearch,
    limit: 10
  });

  var theatersBH = new Bloodhound({
    name: "Theaters",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: theaterSearch,
    limit: 10
  });
    var fapBH = new Bloodhound({
        name: "fap",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: fapSearch,
        limit: 10
    });

    var raionBH = new Bloodhound({
        name: "Raions",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: raionSearch,
        limit: 10
    });

  var museumsBH = new Bloodhound({
    name: "Museums",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: museumSearch,
    limit: 10
  });
    var fedBH = new Bloodhound({
        name: "Fed",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: fedSearch,
        limit: 10
    });

    var pchBH = new Bloodhound({
        name: "Pch",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: pchSearch,
        limit: 10
    });

    var geonamesBH = new Bloodhound({
    name: "GeoNames",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      url: "http://api.geonames.org/searchJSON?username=gsocol&featureClass=P&maxRows=5&countryCode=RU&name_startsWith=%QUERY",
      filter: function (data) {
        return $.map(data.geonames, function (result) {
          return {
            name: result.name + ", " + result.adminCode1,
            lat: result.lat,
            lng: result.lng,
            source: "GeoNames"
          };
        });
      },
      ajax: {
        beforeSend: function (jqXhr, settings) {
          settings.url += "&east=" + map.getBounds().getEast() + "&west=" + map.getBounds().getWest() + "&north=" + map.getBounds().getNorth() + "&south=" + map.getBounds().getSouth();
          $("#searchicon").removeClass("fa-search").addClass("fa-refresh fa-spin");
        },
        complete: function (jqXHR, status) {
          $('#searchicon').removeClass("fa-refresh fa-spin").addClass("fa-search");
        }
      }
    },
    limit: 10
  });
  boroughsBH.initialize();
  theatersBH.initialize();
  museumsBH.initialize();
  geonamesBH.initialize();
  fapBH.initialize();
  raionBH.initialize();



  $("#searchbox").typeahead({
    minLength: 3,
    highlight: true,
    hint: false
  }, {
    name: "Boroughs",
    displayKey: "name",
    source: boroughsBH.ttAdapter(),
    templates: {
        header: "<h4 class='typeahead-header'><img src='assets/img/icon3.png' width='24' height='28'>&nbsp;ОИВ</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  },
      {
          name: "Raions",
          displayKey: "name",
          source: raionBH.ttAdapter(),
          templates: {
              header: "<h4 class='typeahead-header'>Районы</h4>"
          }
      },
      {
      name: "fap",
      displayKey: "name",
      source: fapBH.ttAdapter(),
      templates: {
          header: "<h4 class='typeahead-header'><img src='assets/img/wifi.png' width='24' height='28'>&nbsp;Медицина</h4>",
          suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
      }
  }, {
    name: "Theaters",
    displayKey: "name",
    source: theatersBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/img/icon2.png' width='24' height='28'>&nbsp;Администрации</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Museums",
    displayKey: "name",
    source: museumsBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/img/icon.png' width='24' height='28'>&nbsp;Сельсоветы</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "GeoNames",
    displayKey: "name",
    source: geonamesBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/img/globe.png' width='25' height='25'>&nbsp;GeoNames</h4>"
    }
  }).on("typeahead:selected", function (obj, datum) {

      //    if (datum.source === "Boroughs") {
//      map.fitBounds(datum.bounds);
//    }

      if (datum.source === "Boroughs") {
          if (!map.hasLayer(OIVLayer)) {
              map.addLayer(OIVLayer);
          }
          map.setView([datum.lat, datum.lng], 16);
          if (map._layers[datum.id]) {
              map._layers[datum.id].fire("click");
          }
      }
      if (datum.source === "Raions") {
          map.fitBounds(datum.bounds);
      }


      if (datum.source === "Theaters") {
      if (!map.hasLayer(theaterLayer)) {
        map.addLayer(theaterLayer);
      }
      map.setView([datum.lat, datum.lng], 16);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
    if (datum.source === "Museums") {
      if (!map.hasLayer(omsuLayer)) {
        map.addLayer(omsuLayer);
      }
      map.setView([datum.lat, datum.lng], 16);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
      if (datum.source === "fap") {
          if (!map.hasLayer(wifiLayer)) {
              map.addLayer(wifiLayer);
          }
          map.setView([datum.lat, datum.lng], 16);
          if (map._layers[datum.id]) {
              map._layers[datum.id].fire("click");
          }
      }
    if (datum.source === "GeoNames") {
      map.setView([datum.lat, datum.lng], 14);
    }
    if ($(".navbar-collapse").height() > 50) {
      $(".navbar-collapse").collapse("hide");
    }
  }).on("typeahead:opened", function () {
    $(".navbar-collapse.in").css("max-height", $(document).height() - $(".navbar-header").height());
    $(".navbar-collapse.in").css("height", $(document).height() - $(".navbar-header").height());
  }).on("typeahead:closed", function () {
    $(".navbar-collapse.in").css("max-height", "");
    $(".navbar-collapse.in").css("height", "");
  });
  $(".twitter-typeahead").css("position", "static");
  $(".twitter-typeahead").css("display", "block");
});


// Leaflet patch to make layer control scrollable on touch browsers
var container = $(".leaflet-control-layers")[0];
if (!L.Browser.touch) {
  L.DomEvent
  .disableClickPropagation(container)
  .disableScrollPropagation(container);
} else {
  L.DomEvent.disableClickPropagation(container);
}
