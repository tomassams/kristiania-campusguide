$('#floor-container > a > img').hover(function() {

    $('#floor-container').toggleClass('floor-active');

    $(this).toggleClass('selected').siblings().toggleClass('selected');
})

$('#floor-buttons > button').hover(function() {

        $('#floor-container').toggleClass('floor-active');

        var hoveredFloor = $(this).val();

        $('#' + hoveredFloor).toggleClass('selected').siblings().toggleClass('selected');

    });

var map;

var markerArray = [];
var infoWindowArray = [];
var infoWindow;

// initialize map, which will altso listen for customization changes
function initMap() {

    var filterType = 'cafe';
    var pyrmont = {
        lat: 59.9161644,
        lng: 10.7596752
    };
    var filterTypes = setTypeArr();

    var geocoder = new google.maps.Geocoder();

    // create the map, center it on the given campus position
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: true
    });
    centerOnCampus(geocoder, currentCampus, map);

    for (var j = 0; j < filterTypes.length; j++) {
        filterType = filterTypes[j];
        infoWindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: pyrmont,
            radius: 1000,
            type: filterTypes[j]
        }, createCallback(filterType));
    }

    function createCallback(filterType) {
        return function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                console.log(results)
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i], filterType);
                }
            }
        }
    }



    // directions service
    var directionsService = new google.maps.DirectionsService;

    // directions renderer, bind to our map
    var directionsDisplay = new google.maps.DirectionsRenderer({
        map: map
    });

    // handle update button click
    var updateMapHandler = function() {

        // only reset markers if an origin has been chosen
        if (!(document.getElementById('start').value === 'velg')) {
            // first, remove any existing markers and infowindows from the map.
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(null);
            }
            for (var i = 0; i < infoWindowArray.length; i++) {
                infoWindowArray.close();
            }
        }

        if (document.getElementById('geolocationOption').selected === true) {

            if (navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function(position) {

                    var lat = position.coords.latitude;
                    var long = position.coords.longitude;
                    var coords = new google.maps.LatLng(lat, long);

                    // retrieve the start and end locations and create a DirectionsRequest using our selected travel mode
                    directionsService.route({
                        origin: coords,
                        destination: document.getElementById('end').value,
                        travelMode: document.getElementById('mode').value

                    }, function(response, status) {
                        // route the directions and pass the response to a function to create markers for each step.
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            console.log('Directions request failed due to ' + status);
                        }
                    });

                });

            } else {
                console.log("Geolocation is not supported by this browser.");
            }

        } else {

            // retrieve the start and end locations and create a DirectionsRequest using our selected travel mode
            directionsService.route({
                origin: document.getElementById('start').value,
                destination: document.getElementById('end').value,
                travelMode: document.getElementById('mode').value

            }, function(response, status) {
                // route the directions and pass the response to a function to create markers for each step.
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    console.log('Directions request failed due to ' + status);
                }
            });


        }




    };

    document.getElementById('submitBtn').addEventListener('click', updateMapHandler);


} // ./initMap


// centers the map on a campus address
function centerOnCampus(geocoder, address, map) {
    geocoder.geocode({
        'address': address
    }, function(results, status) {

        if (status === 'OK') {

            // center map on the given campus
            map.setCenter(results[0].geometry.location);

            // create a marker for the given position
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });

            // add it to our marker collection
            markerArray.push(marker);

            infoWindow = new google.maps.InfoWindow({
                content: campusName
            });

            // open an infowindow on the marker position
            infoWindow.open(map, marker);

            // helper method to check if the infowindow is open or not
            function isInfoWindowOpen(infoWindow) {
                var map = infoWindow.getMap();
                return (map !== null && typeof map !== "undefined");
            }

            // listen for clicks on the marker to open/close infowindow
            marker.addListener('click', function() {
                if (isInfoWindowOpen(infoWindow)) {
                    // its open
                    infoWindow.close();
                } else {
                    // its not open
                    infoWindow.open(map, marker);
                }
            });

        } else {

            console.log('Geocode was not successful for the following reason: ' + status);

        }

    });
}



function createIcon(type, rating) {
    var filterTypes = ['cafe', 'liquor_store', 'gym', 'night_club', 'restaurant', 'library', 'park', 'store'];
    for (var j = 0; j < filterTypes.length; j++) {
        if (type === filterTypes[j]) {
            var iconBase = 'http://tek.westerdals.no/~samtom17/pgr101_icons/'
            var image = {
                url: iconBase + type + '.png',
                size: new google.maps.Size(72, 72),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            }
            return image;
        }
    }
}

function createMarker(place, type) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        icon: createIcon(type, place.rating),
        position: place.geometry.location


    });

    google.maps.event.addListener(marker, 'click', function() {
        function getRate() {
            var rate = place.rating;
            var out;
            if (rate >= 1 && rate < 2) {
                out = "\n <span class='fa fa-star checked'></span>" +
                    "<span class='fa fa-star'></span>" +
                    `<span class="fa fa-star"></span>` +
                    `<span class="fa fa-star"></span>` +
                    `<span class="fa fa-star"></span>`;
            } else if (rate >= 2 && rate < 3) {
                out = '\n <span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star"></span>' +
                    '<span class="fa fa-star"></span>' +
                    '<span class="fa fa-star"></span>';
            } else if (rate >= 3 && rate < 4) {
                out = '\n <span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star"></span>' +
                    '<span class="fa fa-star"></span>';
            } else if (rate >= 4 && rate < 5) {
                out = '\n <span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star"></span>';
            } else if (rate === 5) {
                out = '\n <span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>' +
                    '<span class="fa fa-star checked"></span>';
            }
            return out;
        }
        infoWindow.setContent(place.name + getRate());
        infoWindow.open(map, this);
        if (marker.getAnimation() == null) {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        } else {
            marker.setAnimation(null);
        }
    });
};

function setTypeArr() {

    var allowedTypes = ['cafe', // kafeer
        'restaurant', // restauranter
        'convenience_store', // kiosker
        'gas_station', // bensinstasjoner
        'supermarket', // dagligvarebutikker
        'bar', // barer
        'night_club', // nattklubber
        'library', // bibliotek
        'park', // parker
        'gym', // treningsstudioer
        'book_store', // bokhandler
        'art_gallery', // kunstgallerier
        'museum'
    ]; // museer

    var filterTypes = [];

    var selectedFilterType = document.getElementById('filterTypeSelect').value;

    // check if its an allowed filter before pushing type to the array
    for (var i = 0; i < allowedTypes.length; i++) {
        if (selectedFilterType === allowedTypes[i]) {
            filterTypes.push(selectedFilterType);
        }
    }

    return filterTypes;
}