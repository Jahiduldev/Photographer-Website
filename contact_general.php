<?php
session_start(); 
include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">
            <!-- Login Box -->
            <div class="col-md-12">
                <div id="googleMap" style="width:100%;height:380px;"></div>
                <img src="assets/img/contact_general.png" width="100%" height="auto"/>
            </div>
            <!-- End Login Box -->
            <div id="base">
                <div class="container padding-vert-30 margin-top-40">
                </div>
                <div class="container padding-vert-30 margin-top-40">
                </div>
                <div class="container padding-vert-30 margin-top-40">
                </div>
            </div>
        </div>     
    </div>



</div>
</div>
</div>
<!-- === END CONTENT === -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(23.804645,90.501165),
            zoom:13,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker=new google.maps.Marker({
            position:new google.maps.LatLng(23.804645,90.501165),
            animation:google.maps.Animation.BOUNCE          
        });
        marker.setMap(map);


    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php include_once 'common/footer.php';  ?>