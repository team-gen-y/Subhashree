<?php 
  session_start();

  $servername="deepblue.cyooo8gyhpld.us-east-2.rds.amazonaws.com";
  $uname="deepblue";
  $dbname="deepblue";

  $db = mysqli_connect($servername, $uname, "Deepblue_123!",$dbname);
  $servername="deepblue.cyooo8gyhpld.us-east-2.rds.amazonaws.com";
  $uname="deepblue";
  $dbname="deepblue";

  $db = mysqli_connect($servername, $uname, "Deepblue_123!",$dbname);

  $check_query = "select * from deepblue.sos_alert;";
  $result = mysqli_query($db, $check_query);

  $r = array();

  while($row = mysqli_fetch_array($result)) {
    $r[] = array($row['latitude'],$row['longtitude']);
}

?>

<!DOCTYPE html> 
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Markers</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {

       var locations = <?php echo json_encode($r); ?>;

       
       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(12.881111,80.111111),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        })

       infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your Location.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


        var marker, i
        var markers = []

        for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][0], locations[i][1]),
            map: map,
          })
          markers.push(marker)
        }

        google.maps.event.addListener(map, 'click', find_closest_marker);

        function rad(x) {return x*Math.PI/180;}
      function find_closest_marker( event ) {

    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    var R = 6371; // radius of earth in km
    var distances = [];
    var closest = -1;
    var i;

    for( i=0;i< markers.length; i++ ) {
      

        var mlat = markers[i].position.lat();
        var mlng = markers[i].position.lng();
        var dLat  = rad(mlat - lat);
        var dLong = rad(mlng - lng);
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(rad(mlat)) * Math.cos(rad(mlat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        var d = R * c;
        
        distances[i] = d;
        if ( closest == -1 || d < distances[closest] ) {
            closest = i;
        }
    }
    window.alert("Nearest Location! Lat:"+ markers[closest].position.lat() +" Long: " + markers[closest].position.lng());
    addMarker(markers[closest], map);
  }

    

    function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: 'Nearest',
          map: map
        });
      }

      
    

}


      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpozuSFcTgRiIhsztIZZroutZwIiOLFf8&callback=initMap">
    </script>
  </body>
</html>