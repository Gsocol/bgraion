//var map = L.map('map')
//    .setView([51.7689, 55.100555], 7)
//    .layers: [OpenTopoMap, mapbox, cartoLight, osm, yandex, gis,sputnik,boroughs, highlight]
//;
var mainpath='http://apkbg/';

var basemap = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
    subdomains: 'abcd',
    maxZoom: 19
});
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

$.getJSON(mainpath+"data/kvark.geojson", function (data) {
//$.getJSON("data/wi-fi.geojson", function (data) {
    raions.addData(data);
});


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

$.getJSON(mainpath+"data/Board.geojson", function (data) {
//$.getJSON("data/wi-fi.geojson", function (data) {
    boroughs.addData(data);
});

var OIVLayer = L.geoJson(null);
var OIV = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/icon3.png",
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
        }
    }
});

$.getJSON(mainpath+"data/OIV.geojson", function (data) {
    OIV.addData(data);
    map.addLayer(OIVLayer);
});

var theaterLayer = L.geoJson(null);
var theaters = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/icon2.png",
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
        }
    }
});
$.getJSON(mainpath+"data/ADM_RAION.geojson", function (data) {
    theaters.addData(data);
});

var wifiLayer = L.geoJson(null);
var wifi = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/wifi.png",
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
        }
    }
});
$.getJSON(mainpath+"data/medic.geojson", function (data) {
    wifi.addData(data);
});

var omsuLayer = L.geoJson(null);
var omsu = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/icon.png",
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
        }
    }
});
$.getJSON(mainpath+"data/selsovet1.geojson", function (data) {
    omsu.addData(data);
});

var fedLayer = L.geoJson(null);
var fed = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/pch1.png",
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
        }
    }
});
$.getJSON(mainpath+"data/fed.geojson", function (data) {
    fed.addData(data);
});
/////////////////////

var pchLayer = L.geoJson(null);
var pch = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: mainpath+"assets/img/pch2.png",
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
//                    $("#featureModal").modal("show");
                    $('#featureModal').modal({
                        backdrop: false,
                        show: true
                    });

                    highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/icon.png"></td><td class="feature-name">' + layer.feature.properties.NAME + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
    }
});
$.getJSON(mainpath+"data/obl.geojson", function (data) {
    pch.addData(data);
});
/////////////////////


var markerClusters = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: true,
    zoomToBoundsOnClick: true,
    disableClusteringAtZoom: 16
});

map = L.map("map", {
    zoom: 10,
    center: [51.7689, 55.100555],
    layers: [basemap, markerClusters],
    zoomControl: false,
    attributionControl: false
});

// side bar begin
var sidebar = L.control.sidebar({ container: 'sidebar1' })
    .addTo(map)
    .open('home');

// add panels dynamically to the sidebar
sidebar
    .addPanel({
        id:   'js-api',
        tab:  '<i class="fa fa-gear"></i>',
        title: 'JS API',
        pane: '<p>The Javascript API allows to dynamically create or modify the panel state.<p/><p><button onclick="sidebar.enablePanel(\'mail\')">enable mails panel</button><button onclick="sidebar.disablePanel(\'mail\')">disable mails panel</button></p><p><button onclick="addUser()">add user</button></b>',
    })
    // add a tab with a click callback, initially disabled
    .addPanel({
        id:   'mail',
        tab:  '<i class="fa fa-envelope"></i>',
        title: 'Messages',
        button: function() { alert('{{$page_title}}') },
        disabled: true,
    })

// be notified when a panel is opened
sidebar.on('content', function (ev) {
    switch (ev.id) {
        case 'autopan':
            sidebar.options.autopan = true;
            break;
        default:
            sidebar.options.autopan = false;
    }
});

var userid = 0
function addUser() {
    sidebar.addPanel({
        id:   'user' + userid++,
        tab:  '<i class="fa fa-user"></i>',
        title: 'Профиль № ' + userid,
        pane: '<p>{{$page_title}}</p>',
    });
}

// side bar end

var xlng = 0.000256;
var xlat = 0.000200;

map.on('click', function(e) {
    console.log(e.latlng.lat,e.latlng.lng);
    //var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(map);
    L.polygon([
        [e.latlng.lat-xlat,e.latlng.lng-xlng],
        [e.latlng.lat+xlat,e.latlng.lng-xlng],
        [e.latlng.lat-xlat,e.latlng.lng+xlng],
        [e.latlng.lat+xlat,e.latlng.lng+xlng],
    ]).addTo(map);

    L.polyline([
        [e.latlng.lat,e.latlng.lng-xlng],
        [e.latlng.lat,e.latlng.lng+xlng]
    ]).addTo(map);

});

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
var baseMaps = {
    "Grayscale": basemap,
};
var overlayMaps = {
    "Board": boroughs,
    "Raions": raions,

};
var baseLayers = {
    "OpenTopoMap": OpenTopoMap,
    "Mapbox" : mapbox,
    "Street Map": cartoLight,
    "OSM": osm,
    "2gis": gis,
    "Спутник" : sputnik,
};

var groupedOverlays = {
    "Точечные слои":
        {
            "<img src='http://apkbg/assets/img/icon3.png' width='20' height='20'>&nbsp;ОИВ": OIVLayer,
//          "<img src='assets/img/theater.png' width='24' height='28'>&nbsp;Театры": theaterLayer,
//    "<img src='assets/img/museum.png' width='24' height='28'>&nbsp;Музеи": museumLayer,
//        "<img src='assets/img/icon3.png' width='28' height='28'>&nbsp;ОИВ": OIVLayer,
        "<img src='http://apkbg/assets/img/icon2.png' width='20' height='20'>&nbsp;Администрации": theaterLayer,
        "<img src='http://apkbg/assets/img/icon.png' width='20' height='20'>&nbsp;Сельсоветы": omsuLayer,
        "<img src='http://apkbg/assets/img/wifi.png' width='20' height='20'>&nbsp;Медицина": wifiLayer,
        "<img src='http://apkbg/assets/img/pch1.png' width='20' height='20'>&nbsp;ПЧ (фед.)": fedLayer,
        "<img src='http://apkbg/assets/img/pch2.png' width='20' height='20'>&nbsp;ПЧ (обл.)": pchLayer,

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
