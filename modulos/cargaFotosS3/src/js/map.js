let markers = [];
let cordinates = "";
let $latlng = $("#latlng");
let $lat = $("#lat");
let $lng = $("#lng");
let $id_cuadra = $("#id_cuadra");
let $calle = $("#calle");
let $no_ext = $("#no_ext");
let $entre_calle = $("#entre_calle");
let $y_calle = $("#y_calle");
let $colonia = $("#colonia");
let $codigo_postal = $("#codigo_postal");
let $municipio = $("#municipio");
let $sector = $("#sector");
let $cuadrante = $("#cuadrante");
let $estado = $("#estado");
let $pais = $("#pais");
let $mapa = document.getElementById('map');
let $barra_busqueda = document.getElementById('searchTextField');
let $datos = $('#datos');
let $pre_datos = $('#pre-datos');
let $datos_variables = $('.datos_variables');
let map = new google.maps.Map($mapa, {
    zoom: 13,
    gestureHandling: 'greedy',
    disableDefaultUI: true,
    center: { lat: 19.43250, lng: -99.018000 },
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{ "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#d6e2e6" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#cfd4d5" }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#7492a8" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "lightness": 25 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{ "color": "#cfd4d5" }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "landscape.natural", "elementType": "labels.text.fill", "stylers": [{ "color": "#7492a8" }] }, { "featureType": "landscape.natural.terrain", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#588ca4" }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "saturation": -100 }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#a9de83" }] }, { "featureType": "poi.park", "elementType": "geometry.stroke", "stylers": [{ "color": "#bae6a1" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#c6e8b3" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.stroke", "stylers": [{ "color": "#bae6a1" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#41626b" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "saturation": -45 }, { "lightness": 10 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#c1d1d6" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#a6b5bb" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [{ "color": "#9fb6bd" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [{ "saturation": -70 }] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{ "color": "#b4cbd4" }] }, { "featureType": "transit.line", "elementType": "labels.text.fill", "stylers": [{ "color": "#588ca4" }] }, { "featureType": "transit.station", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [{ "color": "#008cb5" }, { "visibility": "on" }] }, { "featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": -5 }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#a6cbe3" }] }]
});

var geocoder = new google.maps.Geocoder;

initMap();
initAutocomplete();

function initMap() {

    map.panBy(-200, 0);

    google.maps.event.addListener(map, 'click', function (event) {
        coordinates = event.latLng.lat() + "," + event.latLng.lng();
        $latlng.val("");
        $lat.val("");
        $lng.val("");
        $latlng.val(coordinates);
        $lat.val(event.latLng.lat());
        $lng.val(event.latLng.lng());
        removeMarkers();
        geocodeLatLng(geocoder, map);
    });

}

function initAutocomplete() {

    let autocomplete = new google.maps.places.Autocomplete($barra_busqueda, { types: ['address'], componentRestrictions: { country: "mx" } });

    autocomplete.addListener('place_changed', function () {

        var ubicacion = autocomplete.getPlace();
        coordinates = ubicacion.geometry.location.lat() + "," + ubicacion.geometry.location.lng();
        $latlng.val("");
        $lat.val("");
        $lng.val("");
        $latlng.val(coordinates);
        $lat.val(ubicacion.geometry.location.lat());
        $lng.val(ubicacion.geometry.location.lng());

        removeMarkers();
        geocodeLatLng(geocoder, map);

    });

    return false;

}

function removeMarkers() {
    for (i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
}

function geocodeLatLng(geocoder, map) {
    let input = $latlng.val();
    let latlngStr = input.split(',', 2);
    let latlng = { lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1]) };

    $datos.animate({scrollTop:0}, 'slow');

    geocoder.geocode({ 'location': latlng }, function (results, status) {
        if (status === 'OK') {
            if (results[0]) {
                map.setZoom(18);
                map.panTo(latlng);
                // map.panBy(-200, 0);

                let marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    draggable: true,
                    icon: {
                        url: "src/icons/home646.svg",
                        size: new google.maps.Size(64, 64),
                        scaledSize: new google.maps.Size(64, 64)
                    }
                });

                markers.push(marker);

                $barra_busqueda.value = "";
                $calle.val("");
                $no_ext.val("");
                $codigo_postal.val("");
                $colonia.val("");
                $municipio.val("");
                $estado.val("");
                $pais.val("");
                $sector.val("");
                $cuadrante.val("");

                for (let i = 0; i < results[0].address_components.length; i++) {
                    let component = results[0].address_components[i];
                    let addressType = component.types[0];

                    switch (addressType) {
                        case 'route':
                            $calle.val(component.short_name);
                            break;
                        case 'street_number':
                            $no_ext.val(component.long_name);
                            break;
                        case 'postal_code':
                            $codigo_postal.val(component.long_name);
                            break;
                        case 'political':
                            $colonia.val(component.long_name);
                            break;
                        case 'locality':
                            $municipio.val(component.long_name);
                            break;
                        case 'administrative_area_level_1':
                            $estado.val(component.long_name);
                            break;
                        case 'country':
                            $pais.val(component.long_name);
                            break;
                    }
                }

                $.ajax({
                    url: "data/getDireccion.php?lng=" + $lng.val() + "&lat=" + $lat.val(),
                    dataType: 'json'
                }).done(function (data) {

                    $pre_datos.fadeOut(0);
                    $datos.fadeIn(500);
                    
                    let direccion = data;

                    if(direccion[0] === null){
                        console.log("Dirección fuera de Nezahualcóyotl.");

                        $datos_variables.hide('fast');
                        $id_cuadra.val('');
                        $entre_calle.val('');
                        $y_calle.val('');
                        $sector.val('');
                        $cuadrante.val('');

                    }else{

                        for (id in direccion) {

                            $datos_variables.show('fast');
                            $calle.val(direccion[id].calle);
                            $id_cuadra.val(direccion[id].id_cuadra);
                            $entre_calle.val(direccion[id].entre_calle);
                            $y_calle.val(direccion[id].y_calle);
                            $colonia.val(direccion[id].colonia);
                            $sector.val(direccion[id].sector);
                            $cuadrante.val(direccion[id].cuadrante);

                        }

                        console.log("Dirección en Nezahualcóyotl.");

                    }

                });

            } else {
                console.log("No se encontraron resultados.");
            }
        } else {
            console.log("La Geolocalización ha fallado por: " + status + ".");
        }
    });
}