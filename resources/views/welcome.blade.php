<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0 shrink-to-fit=no" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="author" content="">
  <title>RelocateGuru</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="img/core-img/favicon.png">
  <!-- Custom fonts for this template -->
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/landing-page.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Main Stylesheet File -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="page-top">


  <!-- Masthead -->
  <div id="home" class="intro route bg-image" style="background-image: url(img/bg-masthead.jpg)">
  <div class="overlay-itro"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <!--<p class="display-6 color-d">Hello, world!</p>-->
        <img src="img/ReGu_Logo_white.png" width="200" height="150" alt="" class="icon">
        <br>
        <br>
        <br>
        <p class="intro-subtitle"><span class="text-slider-items">RelocateGuru community,a place of sharing,making friends,find the place you love,a new lifestyle</span><strong class="text-slider"></strong></p>

        <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        <div class="top-categories">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <td align="center">
        <a href="/tip/category/lifestyle-and-services"  class="avatar1">
        <span class="cat-icon"><img src="img/activites.png" width="51" height="51" alt="" class="icon"></span></a></td>

        <td align="center">
        <a href="/tip/category/things-to-do" class="avatar1">
        <span class="cat-icon"><img src="img/business.png" width="51" height="51" alt="" class="icon">
        <span class="cat-text"></span></a></td>


        <td align="center">
        <a href="/tip/category/family" class="avatar1">
        <span class="cat__icon"><img src="img/family.png" width="51" height="51" alt="" class="icon"></span></a></td>


        <td align="center">
        <a href="/tip/category/travel" class="avatar1">
        <span class="cat_-icon"><img src="img/Flight.png" width="51" height="51" alt="" class="icon">
        <span class="cat-text"></span></a></td>


        <td align="center">
        <a href="/tip/category/food-and-drink" class="avatar1">
        <span class="cat_-icon"><img src="img/food.png" width="51" height="51" alt="" class="icon">
        <span class="cat-text"></span></a></td>


        <td align="center">
        <a href="/tip/category/health" class="avatar1">
        <span class="cat_-icon"><img src="img/health.png" width="51" height="51" alt="" class="icon">
        <span class="cat-text"></span></a></td>


        <td align="center">
        <a href="tip/category/homes" class="avatar1">
        <span class="cat_-icon"><img src="img/Home.png" width="51" height="51" alt="" class="icon">
        <span class="cat-text"></span></a></td>
        </tr>
        <tr>
        <td align="center">Activities</td>
        <td align="center">Lifestyle</td>
        <td align="center">Family</td>
        <td align="center">Travel</td>
        <td align="center">Food</td>
        <td align="center">Health</td>
        <td align="center">Home</td>
       </tr>
      </table>
      </div>
        <br>
        <br>

</div>

        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <form action="/search"  role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Where"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span>
                    Search</button>
                </span>
            </div>
        </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <a class="buttona" href="https://apps.apple.com/gb/app/relocateguru/id1309648336"><img src="img/apple.webp"  alt="" class="icon"></a>
        <a class="buttona" href="https://play.google.com/store/apps/details?id=uk.co.intellicore.relocateGuru"><img src="img/google.webp"  alt="" class="icon"></a>
      </div>
    </div>
  </div>
</div>

  <!-- Icons Grid -->
  <section id="work" class="portfolio-mf sect-pt4 route">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-box text-center">
          <h3 class="title-a">
            Tips
          </h3>
          <p class="serif">
            Amazing tips make your life colourful!
          </p>
          <div class="line-mf"></div>
        </div>
      </div>
    </div>
    <div class="row">
    @foreach ( $randomTips as $tip )
          <div class="col-md-4">
            <div class="card card-blog ">
              <div class="card-img">
                <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{$tip->image}}" alt="" class="card-img" width="350px" height="350px">
              </div>
              <div class="card-body">

                <div class="card-category-box">
                  <a href="{{route('category', $tip->category)}}">
                  <div class="card-category">
                    <h6 class="category">{{$tip->category['name']}}</h6>
                  </div>
                </div>
              </a>
                <h4 class="serif"><a href="{{route('show', $tip->id)}}">{{ str_limit($tip->title, 25, '')}}</a></h4>
                <p class="serif">
                    {{ str_limit($tip->description, 30, '....')}}
                </p>
              </div>
              <div class="card-footer">
                  <a href="/profile/{{ $tip->user['id'] }}">
                <div class="post-author">
                    <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{$tip->user['avatar']}}" alt="" class="avatar rounded-circle">
                    <span class="author">{{$tip->user['name']}}</span>
                  </a>
                </div>
              </a>
                <div class="post-date">
                  <span class="ion-ios-clock-outline"></span> {{$tip->created_at->diffForHumans()}}
                </div>
              </div>
            </div>
          </div>

      @endforeach

    </div>
  </div>
</section>

<!-- banner-bottom -->
<style>
p.serif{font-family:"futura-lt-w01-light",sans-serif;}
</style>
  <section class="banner-bottom py-5" id="exp">
      <div class="container py-md-4">

          <div class="row mid-grids mt-5">
              <div class="col-md-5 content-w3pvt-img">
                  <img src='img/n1.jpg' alt="" class="img-fluid">
              </div>
              <div class="col-md-7 content-left-bottom entry-w3layouts-info text-left mt-3">
                  <h2>Neighbourhood search</h2>
                  <br><br>
                  <span style="font-size:22px;"><p class="serif text-left">Find your ideal neighbourhood by matching your preferences and get tips and advice from locals, so your new city feels like home sooner.</p>

              </div>

          </div>
          <div class="row mid-grids my-lg-5 py-lg-5">

              <div class="col-md-7 content-left-bottom entry-w3layouts-info text-left mt-3">

                  <h2>Find the things you love</h2>
                  <br><br>
                  <span style="font-size:22px;"><p class="serif text-left">Get matched to local businesses, events and activities you'll love. Create personalised guidebooks to your city and keep everything organised.</p>

              </div>
              <div class="col-md-5 content-w3pvt-img">
                  <img src='img/n2.jpg' alt="" class="img-fluid">
              </div>

          </div>
          <div class="row mid-grids">
              <div class="col-md-5 content-w3pvt-img">
                  <img src='img/n3.jpg' alt="" class="img-fluid">
              </div>
              <div class="col-md-7 content-left-bottom entry-w3layouts-info text-left mt-3">

                  <h2>Share & connect</h2>
                  <br><br>
                  <span style="font-size:22px;"><p class="serif text-left">Share your tips and guidebooks to help others. Find friends, share messages and ask advice about your new city without having to reveal your Facebook account. </p>

              </div>

          </div>
      </div>
  </section>
  <style>
  /*--/ banner --*/
  p.w3pvt-phone {
    color: #fff;
    font-size: 1em;
    font-weight: 600;
    margin-left: 5em;
}

.dropdown-menu {
  display:none;
  position:absolute;
  z-index:1;
}


    .card-img{
        max-width:350px;
        max-height: 350px;
    }

.dropdown:hover .dropdown-menu {display:block; margin-top:-7px;}

.banner-content-w3pvt {
    padding-top: 17em;
}
.entry-w3pvt-main {
    background-color: #ecf0f1;
}
.content-w3pvt-img {
    padding: 0 5em;
}
.searchbar {
  display:none;
}
.content-w3pvt-img img {
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -o- border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
}
.w3pvt_mail_grid_right {
    padding: 1em 2em;
}

.w3pvt_mail_grid_right input[type="text"],
.w3pvt_mail_grid_right input[type="email"],
.w3pvt_mail_grid_right textarea,
.w3pvt_mail_grid_right select {
    display: block;
    width: 100%;
    padding: 0.6rem 1rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.w3pvt_mail_grid_right textarea {
    min-height: 180px;
    width: 100% !important;
    resize: none;
}
.footer-w3pvt-copy-social ul li,
.contact-left-footer ul li {
    display: inline-block;
}

.footer-w3pvt-copy-social ul li a {
    color: #333;
    text-align: center;
}

.footer-w3pvt-copy-social ul li a span {
    width: 20px;
    font-size: 20px;
    color: #666;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.footer-w3pvt-copy-social ul li a:hover {
    opacity: 0.8;

}
.main-content {
    background: url(../images/banner.jpg) center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-size: cover;
    position: relative;
    min-height: 47em;
}

.main-content.inner {
    min-height: 20em;
}

.banner-content-w3pvt {
    padding-top: 17em;
}

.banner-w3layouts-info h3 {
    font-size: 2.7em;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.37);
    font-weight: 300;
    margin: 1em 0;
    line-height: 1.5em;
}

.banner-w3layouts-info {
    width: 50%;
    margin: 0 auto;
}

form.banner-form {
    background: #fff;
    padding: 0.5em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -o- border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    box-shadow: 0 12px 60px rgba(0, 0, 0, .2);
    -webkit-box-shadow: 0 12px 60px rgba(0, 0, 0, .2);
    -o-box-shadow: 0 12px 60px rgba(0, 0, 0, .2);
    -moz-box-shadow: 0 12px 60px rgba(0, 0, 0, .2);
    -ms-box-shadow: 0 12px 60px rgba(0, 0, 0, .2);
    display: flex;
    width: 60%;
    margin: 0 auto;
}

.banner-form input[type="email"] {
    outline: none;
    padding: 7px 15px;
    color: #666;
    font-size: 15px;
    width: 68%;
    background: transparent;
    border: none;
    letter-spacing: 2px;
}

.banner-form button.btn,
a.btn.btn-course {
    color: #fff;
    border: none;
    padding: 8px 15px;
    text-decoration: none;
    background: #ff3838;
    float: right;
    cursor: pointer;
    width: 37%;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -o- border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    font-weight: 400;
    letter-spacing: 1px;
    font-size: 1em;
}

a.btn.btn-course {
    width: 100%;
}

.banner-form button.btn:hover,
a.btn.btn-course:hover {
    opacity: 0.9;

}

.lead {
    font-size: 1.25rem;
    font-weight: 400;
    color: #333;
}

/*--// banner --*/

.tittle-w3layouts,
.tittle-w3layouts.two {
    color: #fff;
    font-size: 2.7em;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
}

.tittle-w3layouts.two {
    color: #333;
}

.entry-w3pvt-main {
    background-color: #ecf0f1;
}

.entry-w3layouts-info h4 {
    color: #444;
    font-size: 1.8em;
    text-align: left;
    letter-spacing: 1px;
    margin-bottom: .7em;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
}

.content-left-bottom h5 {
    color: #ff3838;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    font-size: 1em;
}

.content-w3pvt-img {
    padding: 0 5em;
}

.btn-primary {
    color: #fff;
    background-color: #1abc9c;
    border-color: #1abc9c;
}
.btn-primary:hover{
  color:#02e6b9
}


.avatar1:hover img {
                transform: scale(1.3);
                transition: all 1s ease 0s;
                -webkit-transform: scale(1.3);
                -webkit-transform: all 1s ease 0s;
            }
}

/*--// searchbar for header (https://codepen.io/912lab/pen/LsplC) --*/
#searchbar input[type=search] {
	width: 15px;
	padding-left: 10px;
	color: transparent;
	cursor: pointer;
}
#searchbar input[type=search]:hover {
	background-color: #fff;
}
#searchbar input[type=search]:focus {
	width: 130px;
	padding-left: 32px;
	color: #000;
	background-color: #fff;
	cursor: auto;
}
#searchbar input:-moz-placeholder {
	color: transparent;
}
#searchbar input::-webkit-input-placeholder {
	color: transparent;
}

input[type=search] {
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
	display: none;
}

input[type=search] {
	background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 55px;

	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;

	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 130px;
	background-color: #fff;
	border-color: #66CC75;

	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}

input:-moz-placeholder {
	color: #999;
}
input::-webkit-input-placeholder {
	color: #999;
}
  </style>

  <!-- //banner-bottom -->
  <!-- Testimonials -->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="serif">
              Try to share your happiness with Relocateguru！
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-1.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Travel</h6>
                </div>
              </div>
              <h4 class="serif"><a href="blog-single.html">See more ideas about Travel</a></h4>
              <p class="serif">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Morgan Freeman</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 10 min
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-2.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Web Design</h6>
                </div>
              </div>
              <h4 class="serif"><a href="blog-single.html">See more ideas about Travel</a></h4>
              <p class="serif">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Morgan Freeman</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 10 min
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-3.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Web Design</h6>
                </div>
              </div>
              <h4 class="serif"><a href="blog-single.html">See more ideas about Travel</a></h4>
              <p class="serif">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Morgan Freeman</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 10 min
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Email signup
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary" disabled>Sign up!(disabled)</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Footer -->
   @include('partials.footer')


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

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
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="js/roberto.bundle.js"></script>
<!-- Active -->
<script src="js/default-assets/active.js"></script>

</div>
