
        </main>         
        <footer class="footer"> 
            <div class="container"> 
                <p><?php _e( 'Takk for besøket', 'kristianiacampusguide' ); ?>  
            </div>             
        </footer>         
        <!-- scripts -->                                    
        <?php wp_footer(); ?>
<script>
  var currentCampus; // populated by WordPress

  var markerArray = [];
  var infoWindow;

  // initialize map, which will altso listen for customization changes
  function initMap() {

    // create the map, center it on the given position
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14
    });

    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);

    // directions service
    var directionsService = new google.maps.DirectionsService;

    // directions renderer, bind to our map
    var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

    // listener / handler to changes in the start and end dropdowns
    var directionsChangeHandler = function() {
      setDisplayRoute(directionsDisplay, directionsService, markerArray, map);
    };
    document.getElementById('start').addEventListener('change', directionsChangeHandler);
    document.getElementById('end').addEventListener('change', directionsChangeHandler);

    // listener / handler to changes in the travel mode dropdown
    var travelModeChangeHandler = function() {
      setTravelMode(directionsService, directionsDisplay);
    };
    document.getElementById('mode').addEventListener('change', travelModeChangeHandler);

    // listener / handler to use geolocation
    var geolocationHandler = function() {
      setGeolocation(directionsDisplay, directionsService, markerArray, map);
    }

    document.getElementById('geolocationBtn').addEventListener('click', geolocationHandler);


  } // ./initMap

  function geocodeAddress(geocoder, resultsMap) {
      var address = currentCampus;
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
          
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });

          markerArray.push(marker);

          var contentString = campusName;

          infoWindow = new google.maps.InfoWindow({
            content: contentString
          });

          infoWindow.open(resultsMap, marker);

        } else {
          console.log('Geocode was not successful for the following reason: ' + status);
        }
      });
    }

  // change to use geolocation for directions
  function setGeolocation(directionsDisplay, directionsService, markerArray, map) {
    if (navigator.geolocation) {

      navigator.geolocation.watchPosition(function (position) {

        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        var coords = new google.maps.LatLng(lat, long);

        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }
        infoWindow.close();

        // Retrieve the start and end locations and create a DirectionsRequest using our selected travel mode
        directionsService.route({

          origin: coords,
          destination: document.getElementById('end').value,
          travelMode: document.getElementById('mode').value

        }, function(response, status) {

          // Route the directions and pass the response to a function to create markers for each step.
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            console.log('Directions request failed due to ' + status);
          }
        });

      });


    } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  // Element which we will print the location
  var x = document.getElementById("demo");



  // change travel mode
  function setTravelMode(directionsService, directionsDisplay) {

    var selectedMode = document.getElementById('mode').value;

    directionsService.route({

      origin: document.getElementById('start').value,
      destination: document.getElementById('end').value,

      // Note that Javascript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      travelMode: google.maps.TravelMode[selectedMode]

    }, function(response, status) {
      if (status == 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
  }

  // change display route
  function setDisplayRoute(directionsDisplay, directionsService, markerArray, map) {

    // First, remove any existing markers from the map.
    for (var i = 0; i < markerArray.length; i++) {
      markerArray[i].setMap(null);
    }
    infoWindow.close();

    // Retrieve the start and end locations and create a DirectionsRequest using our selected travel mode
    directionsService.route({

      origin: document.getElementById('start').value,
      destination: document.getElementById('end').value,
      travelMode: document.getElementById('mode').value

    }, function(response, status) {

      // Route the directions and pass the response to a function to create markers for each step.
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        console.log('Directions request failed due to ' + status);
      }
    });
  }

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKdWUdFemcajjFsNuBejQcdDQg99-17hc&callback=initMap">
</script>

    </body>     
</html>