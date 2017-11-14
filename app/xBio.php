<?php
# pripojeni do db
require 'db.php';
require 'user_required.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Street Change Webpage</title>
  <!--CSS style-->
  <link rel="stylesheet" type="text/css" href="./style.css"/>
  <meta charset="utf-8"/>
  <!--HTML5 Shiv-->
  <script src="./js/html5shiv.js"></script>
  <script src="./js/jquery.js"></script>     
  <script src="./js/bootstrap.min.js"></script>
    <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
  <div id="container">
    <!--Include HEADER-->
    <?php include("header.php");?>
   
    <div id="box">
           <h2>Bio</h2>
           
    </div>
    <div class="info">
    <h1>Info</h1>
    <p>What we are doing?</p>
    <p>What are our abitions?</p>
    <p>Do we hate all the wordl?</p>
    <p>You can find us: </p>
    
    
     
    
    </div>
    <div id="map">
    <script>
      function initMap() {
        var uluru = {lat: 50.0200607, lng: 14.4964552};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDszhniDk2dOMQ8LcHKixZTCryotlqN8w&callback=initMap">
    </script>
    </div>
     
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
  </div>

</body>
</html>
