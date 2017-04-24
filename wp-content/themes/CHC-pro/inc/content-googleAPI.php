

    <!-- DO NOT TOUCH!!! THIS IS THE Google API. -->


        <style>
      #main > section.home-widget-area.clear > div {
        margin: initial;
      }
      #execphp-5 {
    margin: 0 !important;
}
        #map {
           position: relative;
           display: block;
           height: 500px;
           width: 100vw;
          margin: 0;
         }
        </style>

        <div class="google_outer_container">
          <div id="map">test</div>

        </div>

        <script>
          function initMap() {




            // Styles a map in night mode.
           var map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: 36.171343, lng:-115.064730 },
             zoom: 17,
             zoomControl: true,
             zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
              },
              mapTypeControl: true,
             mapTypeControlOptions: {
                 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                 position: google.maps.ControlPosition.TOP_CENTER
             },
             scaleControl: false,
             scrollwheel: false,
             disableDoubleClickZoom: true,
            //  styles: [
            //    {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            //    {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            //    {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            //    {
            //      featureType: 'administrative.locality',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#d59563'}]
            //    },
            //    {
            //      featureType: 'poi',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#d59563'}]
            //    },
            //    {
            //      featureType: 'poi.park',
            //      elementType: 'geometry',
            //      stylers: [{color: '#263c3f'}]
            //    },
            //    {
            //      featureType: 'poi.park',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#6b9a76'}]
            //    },
            //    {
            //      featureType: 'road',
            //      elementType: 'geometry',
            //      stylers: [{color: '#38414e'}]
            //    },
            //    {
            //      featureType: 'road',
            //      elementType: 'geometry.stroke',
            //      stylers: [{color: '#212a37'}]
            //    },
            //    {
            //      featureType: 'road',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#9ca5b3'}]
            //    },
            //    {
            //      featureType: 'road.highway',
            //      elementType: 'geometry',
            //      stylers: [{color: '#746855'}]
            //    },
            //    {
            //      featureType: 'road.highway',
            //      elementType: 'geometry.stroke',
            //      stylers: [{color: '#1f2835'}]
            //    },
            //    {
            //      featureType: 'road.highway',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#f3d19c'}]
            //    },
            //    {
            //      featureType: 'transit',
            //      elementType: 'geometry',
            //      stylers: [{color: '#2f3948'}]
            //    },
            //    {
            //      featureType: 'transit.station',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#d59563'}]
            //    },
            //    {
            //      featureType: 'water',
            //      elementType: 'geometry',
            //      stylers: [{color: '#17263c'}]
            //    },
            //    {
            //      featureType: 'water',
            //      elementType: 'labels.text.fill',
            //      stylers: [{color: '#515c6d'}]
            //    },
            //    {
            //      featureType: 'water',
            //      elementType: 'labels.text.stroke',
            //      stylers: [{color: '#17263c'}]
            //    }
            //  ] //End of styles

           });
           var marker = new google.maps.Marker({
             position: {lat: 36.1714332, lng:-115.0614248 },
             map: map
           });
          }
        </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtVFddIcuu8o6lZwmghzCoZ3o5waTzD8c&callback=initMap" async defer></script>
