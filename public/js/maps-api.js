$(function() {
    //set your google maps parameters
    // @42.153943,24.7596773,17z
    var latitude =  42.153943, longitude = 24.7596773,map_zoom = 15;
    //custom marker icon - .png fallback IE11
    var is_internetExplorer11 = navigator.userAgent.toLowerCase().indexOf('trident') > -1;
    var marker_url = (is_internetExplorer11) ? 'assets/images/g-maps-icon.png' : 'assets/images/g-maps-icon.svg';
    var image = {
      url: marker_url,
      size: new google.maps.Size(96, 96),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(24, 44),
      scaledSize: new google.maps.Size(48, 48),
      labelOrigin: new google.maps.Point(24, 60)
  };
    //define the basic color of your map, plus a value for saturation and brightness
    var main_color = '#227ed6',
    saturation_value = 100,
    saturation_value_labels = 100,
    brightness_value = -30;
    brightness_value_labels = 70;
    //we define here the style of the map
    var style = [{
            //set saturation for the labels on the map
            elementType: "labels",
            stylers: [{hue: main_color},
            {saturation: saturation_value_labels},
            {lightness: brightness_value_labels}]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [
            {"color": "#000000"},
            {"saturation": 100},
            {"lightness": -100},
            {"weight": 0.5}
            ]
        }
        ,{ //poi stands for point of interest - don't show these labels on the map 
        featureType: "poi",
        elementType: "labels",
        stylers: [{ visibility: "off" }]
    }, {
            //don't show highways lables on the map
            featureType: 'road.highway',
            elementType: 'labels',
            stylers: [{ visibility: "off" }]
        }, {
            //don't show local road lables on the map
            featureType: "road.local",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }]
        }, {
            //don't show arterial road lables on the map
            featureType: "road.arterial",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }]
        }, {
            //don't show road lables on the map
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{ visibility: "off" }]
        },
        //style different elements on the map ON
        {
            featureType: "transit",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "poi",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "poi.government",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "poi.sport_complex",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "poi.attraction",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "poi.business",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "transit",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "transit.station",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "landscape",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]

        }, {
            featureType: "road",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "road.highway",
            elementType: "geometry.fill",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }, {
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                hue: main_color
            }, {
                visibility: "on"
            }, {
                lightness: brightness_value
            }, {
                saturation: saturation_value
            }]
        }
        ];

    //set google map options
    var map_options = {
        center: new google.maps.LatLng(latitude, longitude), 
            // LONG + 0.007
            zoom: map_zoom,
            panControl: true,
            zoomControl: false,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,//ROADMAP, TERRAIN, HYBRID, SATELLITE
            scrollwheel: false,
            styles: style,
        }
        //inizialize the map
        var map = new google.maps.Map(document.getElementById('g-maps-container'), map_options);
    //add a custom marker to the map                
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitude, longitude),
        map: map,
        label: { text: 'Limacon Event Center', color: 'white', fontSize: '15px', fontWeight: 'bold'},
        visible: true, clickable:false, icon: image
    });
    //add custom buttons for the zoom-in/zoom-out on the map
    function CustomZoomControl(controlDiv, map) {
        //grap the zoom elements from the DOM and insert them in the map 
        var controlUIzoomIn = document.getElementById('g-maps-zoom-in'),
        controlUIzoomOut = document.getElementById('g-maps-zoom-out');
        controlDiv.appendChild(controlUIzoomIn);
        controlDiv.appendChild(controlUIzoomOut);

        // Setup the click event listeners and zoom-in or out according to the clicked element
        google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
            map.setZoom(map.getZoom() + 1)
        });
        google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
            map.setZoom(map.getZoom() - 1)
        });
    }
    var zoomControlDiv = document.createElement('div');
    var zoomControl = new CustomZoomControl(zoomControlDiv, map);
    //insert the zoom div on the top left of the map
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
});