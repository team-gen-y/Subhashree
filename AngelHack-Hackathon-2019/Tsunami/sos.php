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
          zoom: 8,
          center: new google.maps.LatLng(12.88,80.11),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        })

        var marker, i

        for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][0], locations[i][1]),
            map: map,
        })

      }
    }
      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpozuSFcTgRiIhsztIZZroutZwIiOLFf8&callback=initMap">
    </script>
  </body>
</html>