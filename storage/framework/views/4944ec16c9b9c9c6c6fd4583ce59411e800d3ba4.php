  <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>Place Search Pagination</title>
    <style type="text/css">
      #map {
        border:1px solid red;
        width:800px;
        height:500px;}
    </style>
  </head>
  <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="map"></div>
    <script>
    var map;
    var locs=[];
    var locations =<?php echo json_encode($locations); ?>;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 57.1502749, lng: -2.0779604},
                    zoom: 13
                });
                for(var i=0;i<locations.length;i++){
                  locs[i]=addMarker(locations[i]);
                }
      }

      function addMarker(marker){
        var title=marker.title;
        var description=marker.description;
        var image=marker.image;
        //var buyprice=marker.buy_price;
        //var schools=marker.schools;
        //var crime=marker.crime;

        var html='<br/><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/' + image + '" height="200" width="200"><br/>' + "<b>" + title + "</b> <br/>" + description;
        var markerLatlng = new google.maps.LatLng(parseFloat(marker.lat),parseFloat(marker.lng));
        var mark = new google.maps.Marker({
            map: map,
            position: markerLatlng
        });


        var infoWindow = new google.maps.InfoWindow;
        google.maps.event.addListener(mark, 'click', function(){
            infoWindow.setContent(html);
            infoWindow.open(map, mark);
        });

        return mark;

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA4dnWJ2l84qNuU05p8m8kVbnNClZCe8M&callback=initMap" async defer></script>
  <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH /Users/alice/team_bravo_2019/resources/views/map.blade.php ENDPATH**/ ?>