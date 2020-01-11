
@include('partials.header')
  <br>
  <br>
  <br>
  <br>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
 <!-- <link href="{{ URL::asset('css/freelancer.min.css') }}" rel="stylesheet"> -->
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
position:relative;
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
      .nbs {
  z-index: 1000;
  position: fixed;
  top: 100px;
  right: 20px;
  height: 40px;
  width: 40px;
  opacity: 0.7;
}
.nbs:hover {
  height: 234px;
  opacity: 1;
}
.nb span {
  display: none;
  position: absolute;
  top: 9px;
  right: 47px;
  width: auto;
  color: #FFF;
  background: rgba(0, 0, 0, 0.6);
  padding: 4px 10px;
  font-size: 12px;
  border-radius: 4px;
  white-space: nowrap;
  opacity: 0;
  transition: all 0.2s linear;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
}
.nbi.img {
  background: #FFF;
}
.nbi img {
  width: 32px;
  border-radius: 50%;
  margin-top: -5px;
}
.nbi span {
  right: 40px;
  top: 6px;
}
.nb {
  display: block;
  position: absolute;
  border: none;
  border-radius: 50%;
  box-sizing: content-box;
  cursor: pointer;
  outline: none;
  padding: 0;
  box-shadow: 0 0 2px rgba(0,0,0,.14),0 2px 4px rgba(0,0,0,.28);
  background-color: #38D1BF;
  color: #EEE;
  pointer-events: auto;
  text-align: center;
}
.nb:hover {
  color: #FFF;
}
.nb:hover span {
  display: inline;
  opacity: 1;
  line-height: 1.2em;
  padding-top: 6px;
}
.nb-main {
  height: 40px;
  width: 40px;
  font-size: 1.9em;
  line-height: 1.4em;
  top: 100px;
}
.nbi {
  height: 27px;
  width: 32px;
  padding-top: 5px;
  font-size: 1.2em;
  line-height: 1.4em;
  margin-left: 4px;
  bottom: 4px;
  transition: all 0.2s linear;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
}
.nbi i {
  margin-top: 8px;
}
.nbsb4 {
  bottom: 4px;
  background-color: #D5A716;
}
.nbs:hover .nbsb4 {
  bottom: 45px;
}

</style>
<style type="text/css">
      #map {
        border:1px solid red;
        width:900px;
        height:500px;}
    </style>

  <!--Section heading-->
  <h3 class="section-heading h1 pt-4">Tips</h3>
  <!--Section description-->

<body>
  <div class="row">


    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
            <div class="form-header blue accent-1">

            </div>


            <br>

            <!--Body-->
            <div class="nbs" >
                <a href="{{route('tip.create')}}" class="nb nb-main"> + <span>Create Tip</span></a>
            </div>

            <div class="row">              
              @foreach ($tip as $tip)
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                      <img class="card-img-top" src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{$tip->image}}" alt="Card image cap">
                    <div class ="card-context" height="50rem">
                  <h5 class="card-title">{{$tip->title}}</h5>
                  <p class="card-text">{{ str_limit($tip->description, 35, '....')}} <a href="{{route('show', $tip->id)}}" class='link'>Read More</a></p>
                  <div class="card-category-box card-blog">
                      <div class="card-category">
                        <h6 class="category"><a href="{{route('category', $tip->category)}}">{{$tip->category['name']}} </a></h6>
                      </div>
                    </div>
                  <div class="location">
                      <p><i class="material-icons">place</i>{{$tip->city['name']}}</p>
                    </div>
                </div>
                </div>
                </div>
              </div>
              <br>
              @endforeach
            <!--Body End-->


        </div>
      </div>
    </div>
    </div>


    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <!--Google map-->
        <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: auto">
        <div id="map"></div>
            <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        //<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA4dnWJ2l84qNuU05p8m8kVbnNClZCe8M&libraries=places">
        var map;
        var locs=[];
      var locations ={!!json_encode($locations)!!};

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
          var temp = marker.id;
          //var buyprice=marker.buy_price;
          //var schools=marker.schools;
          //var crime=marker.crime;

          var html='<br/><a href="/tip/' +temp+ '">'+'<img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/' + image + '" height="200" width="200"></a>'+'<br/>' + "<b>" + title + "</b> <br/>" + description;
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

      </div>
        </div>
      </div>
    <br>
    </div>
  </div>

</section>
 <!-- Footer-->
 @include('partials.footer')
   <!-- Footer-->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/counterup/jquery.waypoints.min.js"></script>
    <script src="lib/counterup/jquery.counterup.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>

</html>
