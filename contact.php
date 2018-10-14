<!doctype html>
<html>
<head>

    <?php include 'php/reusables/head.php' ?>
    <style>
        #block-wrp {
        display: flex;
        display: -webkit-flex;
        justify-content: space-around;
        flex-wrap: wrap;
        width: 80%;
        margin: auto;
        }
        #block-wrp .block-item {
        height: 400px;
        width: 48%;
        position: relative;
        display: flex;
        display: -webkit-flex;
        flex-direction: column;
        -webkit-flex-direction: column
        }
        #block-wrp .block-item .map-item {
        height: 90%
        }
        #block-wrp .block-item span.city-name {
        text-align: center;
        color: #000;
        text-transform: uppercase;
        font-weight: bold;
        background: #a2ccff;
        height: 10%;
        line-height: 2em;
        }
    </style>
</head>
<body>
    <?php include 'php/reusables/hero.php' ?>
    <div style="background-color: #e7e7e7;">
        <?php include 'php/reusables/contact.php' ?>
        <div id="block-wrp">
            <div class="block-item">
                <div id="mapCanvas1" class="map-item">
                </div>
                <span class="city-name">Calgary Campus</span> 
            </div>
            <div class="block-item">
                <div id="mapCanvas2" class="map-item"> 
                </div>
                <span class="city-name">Edmonton Campus</span> 
            </div>
        </div>
        <script type="text/javascript">
            var map1, map2, marker;
            function drawMap() {
                
                var mapOptions = {
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    fullscreenControl: false,
                }

                myLatLng = {lat: 51.017740, lng:-114.062860 };
                mapOptions.center = new google.maps.LatLng(51.017740, -114.062860); // Calgary
                map1 = new google.maps.Map(document.getElementById("mapCanvas1"), mapOptions);
                
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map1
                });
                marker.setMap(map1);

                myLatLng = {lat:53.541140, lng:-113.493420 };
                mapOptions.center = new google.maps.LatLng(53.541140, -113.493420); // Edmonton
                map2 = new google.maps.Map(document.getElementById("mapCanvas2"), mapOptions);
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map2
                });
                marker.setMap(map2);
            }
        </script> 
        <script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyDMH56XYTfv4tKScOSIFm6GUv1nHwO74Hk&callback=drawMap"></script>
        <br>
        <br>   
    </div>
    <!-- FOOTER -->

    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>
</body>
</html>