export default class GoogleMap {
  contactMap() {
    (function ($) {
      function initMap($el) {
        // Find marker elements within map.
        var $markers = $el.find('.marker');

        // Create gerenic map.
        var mapArgs = {
          zoom: $el.data('zoom') || 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles: [
            {
              "featureType": "all",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#202c3e"
                }
              ]
            },
            {
              "featureType": "all",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "gamma": 0.01
                },
                {
                  "lightness": 20
                },
                {
                  "weight": "1.39"
                },
                {
                  "color": "#ffffff"
                }
              ]
            },
            {
              "featureType": "all",
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "weight": "0.96"
                },
                {
                  "saturation": "9"
                },
                {
                  "visibility": "on"
                },
                {
                  "color": "#000000"
                }
              ]
            },
            {
              "featureType": "all",
              "elementType": "labels.icon",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "landscape",
              "elementType": "geometry",
              "stylers": [
                {
                  "lightness": 30
                },
                {
                  "saturation": "9"
                },
                {
                  "color": "#29446b"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                {
                  "saturation": 20
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                {
                  "lightness": 20
                },
                {
                  "saturation": -20
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [
                {
                  "lightness": 10
                },
                {
                  "saturation": -30
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#193a55"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "saturation": 25
                },
                {
                  "lightness": 25
                },
                {
                  "weight": "0.01"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "all",
              "stylers": [
                {
                  "lightness": -20
                }
              ]
            }
          ]
        };
        var map = new google.maps.Map($el[0], mapArgs);

        // Add markers.
        map.markers = [];
        $markers.each(function () {
          initMarker($(this), map);
        });

        // Center map based on markers.
        centerMap(map);

        // Return map instance.
        return map;
      }

      function initMarker($marker, map) {

        // Get position from marker.
        var lat = $marker.data('lat');
        var lng = $marker.data('lng') - 0.0909;
        var latLng = {
          lat: parseFloat(lat),
          lng: parseFloat(lng)
        };
        // Create marker instance.
        var marker = new google.maps.Marker({
          position: latLng,
          map: map,
          icon: $marker[0].attributes[3].value,
        });

        // Append to reference for later use.
        map.markers.push(marker);
        
        // marker.setVisible(false);

        // If marker contains HTML, add it to an infoWindow.
        if ($marker.html()) {

          // Create info window.
          var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
          });

          // Show info window when marker is clicked.
          google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
          });
        }
      }

      function centerMap(map) {
        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function (marker) {
          bounds.extend({
            lat: marker.position.lat() + 0.002,
            lng: marker.position.lng() - 0.012
          });
        });

        // Case: Single marker.
        if (map.markers.length == 1) {
          map.setCenter(bounds.getCenter());

          // Case: Multiple markers.
        } else {
          map.fitBounds(bounds);
        }
      }

      // Render maps on page load.
      $(document).ready(function () {
        $('.acf-map').each(function () {
          var map = initMap($(this));
        });
      });

    })(jQuery);

  }


  init(){
    document.querySelector('.acf-map') ? this.contactMap() : null
  }
}