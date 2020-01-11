
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <head>
    <title>TipMap</title>
  </head>
  <!--Banner-->
  <section id="intro">
      <div class="container" margin-top="50px">
        <div class="row">
          <div class="container" text-align="left">
          <span style="font-size:76px;">
          <span style="color:#FFFFFF;">
          <span style="font-style:italic;">
          <span style="font-family:wfont_c3f509_79df5eba2bea4d558e078e7910e05d06,wf_79df5eba2bea4d558e078e791,orig_malina;">Tips</span>
          </span>
          </span>
          </span>
          </div>
        </div>
      </div>
    </section>
 <!-- <link href="<?php echo e(URL::asset('css/freelancer.min.css')); ?>" rel="stylesheet"> -->
<!--Section: Contact v.1-->
<section class="section pb-5">

<style>
.map-container-6{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container-6 iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
.card {
margin-left: 20px; 
}
.pb-4{
  margin-left: 20px;
}
#intro {
      background: url(../img/tipmapbanner.webp) center center no-repeat fixed;
      background-size: cover;
      padding: 80px 0;
      text-align: center;
    }

    #intro h1 {
      color: #ffffff;
      padding: 0;
      margin: 0 0 20px 0;
      font-size: 42px;
    }

    #intro p {
      color: #ffffff;
      font-size: 18px;
      line-height: 28px;
      padding: 0;
      margin: 0;
    }

      #intro {
        background-attachment: scroll;
      }

      #intro h1 {
        font-size: 28px;
      }

      #intro p {
        font-size: 15px;
      }
      #div1{
          width: 1000px;
          margin: 80px auto;
          border: 2px solid black;
          text-align: justify; /*设置文本水平居中*/
          padding: 50px 20px;
      }
</style>
<style type="text/css">
      #map {
        border:1px solid red;
        width:900px;
        height:500px;}
    </style>

  <!--Section heading-->
  <h2 class="section-heading h1 pt-4">Tips</h2>
  <!--Section description-->
  <p class="section-description pb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error
    amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a
    pariatur accusamus veniam.</p>
<body>
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 mb-4">

      <!--Form with header-->
      <div class="card">

        <div class="card-body">
          <!--Header-->
          <div class="form-header blue accent-1">
            <h3><i class="fas fa-envelope"></i> Tips</h3>
          </div>

          <p>Choose your next destination</p>
          <br>

          <!--Body-->
          <div class="md-form">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="form-name" class="form-control">
            <label for="form-name">Your name</label>
          </div>

          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="form-email" class="form-control">
            <label for="form-email">Your email</label>
          </div>

          <div class="md-form">
            <i class="fas fa-tag prefix grey-text"></i>
            <input type="text" id="form-Subject" class="form-control">
            <label for="form-Subject">Subject</label>
          </div>

          <div class="md-form">
            <i class="fas fa-pencil-alt prefix grey-text"></i>
            <textarea id="form-text" class="form-control md-textarea" rows="3"></textarea>
            <label for="form-text">Icon Prefix</label>
          </div>

          <div class="text-center mt-4">
            <button class="btn btn-light-blue">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <!--Grid column-->
    <div class="col-lg-7">

      <!--Google map-->
      <div id="map-container-google-11" class="z-depth-1-half map-container-6">
      <div id="map"></div>
      <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      //<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA4dnWJ2l84qNuU05p8m8kVbnNClZCe8M&libraries=places">
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
      //add markers to the map
      function addMarker(marker){
        var title=marker.title;
        var description=marker.description;
        var image=marker.image;
        //var buyprice=marker.buy_price;
        //var schools=marker.schools;
        //var crime=marker.crime;

        var html='<br/><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/' + image + '" height="200" width="200"><br/>' + "<b>" + title + "</b> <br/>";
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
      </div>
      <br>
      <!--Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
          <p>San Francisco, CA 94126</p>
          <p>United States</p>
        </div>

        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
          <p>+ 01 234 567 89</p>
          <p>Mon - Fri, 8:00-22:00</p>
        </div>

        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
          <p>info@gmail.com</p>
          <p>sale@gmail.com</p>
        </div>
      </div>
    </div>
    <!--Grid column-->

  </div>
</section>
 <!-- Footer-->
 <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Footer-->
  <!-- Bootstrap core JavaScript -->
  <div id="preloader"></div>
</body>
<?php /**PATH /Users/alice/team_bravo_2019/resources/views/tipmap.blade.php ENDPATH**/ ?>