<!DOCTYPE html>
<html>
  <head>
  

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7kXsUNvOr52Uhs1vKTmbFCO-tKh1-4WA&callback=initMap"
    async defer></script>
    <script type="text/javascript" src="js\script.js?180"></script>

    <title>InnoTech JobBoard</title>
    <!-- <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8"> -->
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #mapCanvas {
        height: 50%;
        background-color: olive;
      }
      #mapCanvas2 {
        height: 50%;
        background-color: tomato;
      }
      
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<body>
<?php include 'php/reusables/hero.php' ?>
    <div id="mapCanvas"></div>
    <div id="mapCanvas2"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('mapCanvas'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
        });
      }
      var map2;
      function initMap() {
        map2 = new google.maps.Map(document.getElementById('mapCanvas2'), {
        center: {lat: 51.1910, lng: -114.4679},
        zoom: 8
        });
      }
    </script>
    
  </body>
</html>
