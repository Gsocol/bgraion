var orenburgLatLng = L.latLng(51.7689, 55.100555);
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

/////////////////////

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
    map.addLayer(fed);
});
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
    map.addLayer(theaterLayer);
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
/////////////////////

map = L.map("map", {
    zoom: 10,
    center: [51.7689, 55.100555],
    layers: [OpenTopoMap, mapbox, cartoLight, osm, gis,sputnik,boroughs],
//, markerClusters],
    zoomControl: false,
    attributionControl: false
});


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
          "<img src='assets/img/theater.png' width='24' height='28'>&nbsp;Театры": theaterLayer,
//    "<img src='assets/img/museum.png' width='24' height='28'>&nbsp;Музеи": museumLayer,
//        "<img src='assets/img/icon3.png' width='28' height='28'>&nbsp;ОИВ": OIVLayer,
//        "<img src='assets/img/icon2.png' width='28' height='28'>&nbsp;Администрации": theaterLayer,
//        "<img src='assets/img/icon.png' width='28' height='28'>&nbsp;Сельсоветы": omsuLayer,
//        "<img src='assets/img/wifi.png' width='28' height='28'>&nbsp;Медицина": wifiLayer,
        "<img src='assets/img/pch1.png' width='28' height='28'>&nbsp;ПЧ (фед.)": fed,
//        "<img src='assets/img/pch2.png' width='28' height='28'>&nbsp;ПЧ (обл.)": pchLayer,

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
