<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
    <script>
function checkForm(form) {
  if(!form.terms.checked) {
    alert("Please indicate that you accept Terms and Conditions");
    form.terms.focus();
    return false;
  }
  return true;
}
    </script>
<script>
    window.addEventListener("scroll", function() {
    $('.searchbar')[(window.scrollY>(document.body.clientHeight)*.075)?"slideDown":"slideUp"]();
    },false);
</script>

  <meta charset="utf-8">
  <title>RelocateGuru</title>
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
  <meta name="keywords" content="" >
  <meta name="description" content="" >

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <link href="{{ URL::asset('img/favicon.png') }}" rel="icon">
  <a href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/landing-page.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

</head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-eu-cookie-law-popup.css"/>
  <script src="js/jquery-eu-cookie-law-popup.js"></script>
<div class="eupopup eupopup-top"></div>

<body id="page-top">

    <!-- Navigation -->
  <nav class="navbar navbar-b navbar-expand-md fixed-top navbar-reduce" id="mainNav">
    <div class="container">
    <a class="navbar-brand js-scroll active" href="/"><img src="{{ url('img/apple-touch-icon.png') }}" width="80" height="80" alt="" class="icon"></a>

      &nbsp; <!--non-breaking space, needed for search pop-up in nav bar -->
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>

    <div class="navbar-collapse collapse justify-content-center">
        <form action="/search"  role="search">
            {{ csrf_field() }}
            <div class="searchbar">
              <form id="searchbar">
                <input type="search" name="q" placeholder="Search">
              </form>
            </div>
          </form>
      </div>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/tipmap">Tips</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/tip/select">Tips</a>
          </li>
            -->
          <li class="nav-item">
          <a class="nav-link js-scroll" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            @if(Auth::check() == false)
            <a class="nav-link js-scroll" href="{{ route('login') }}"><img src="{{ url('img/default2.png') }}" width="30" height="30" alt="" class="icon" style ="border-radius :50%">&nbsp; Login</a>

            @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown"  aria-haspopup="true" aria-expanded="false" v-pre class="nav-link js-scroll" href="{{ route('home') }}"><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}" width="30" height="30" alt="" class="icon" style ="border-radius :50%">&nbsp; {{Auth::user()->name}} <i class="fa fa-caret-down" aria-hidden="true"></i></a>

                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href='/home/editprofile'>Settings</a>
                     <!-- <a class="dropdown-item" href='/chat'>Chats</a> -->
                      @if (Auth::user()!==null && Auth::user()->role_id == 1)
                      <a class="dropdown-item" href="/admin">Admin Controls</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
            @endif

          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Navbar styling -->
  <style>
  /*--/ navbar --*/
  .card {
            border-color: #ABEBC6;
        }
        .card-img-top {
            height: 200px;
            padding: 0;
            margin-bottom: 20px;
        }

        .card-title,
        .card-header {
            font-size: 10pt !important;
        }
        .recent-posts {
            margin-bottom: 20px;
        }
        .banner-image {
          background: url(img/banner.jpg);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          position: relative;
        }
        .banner-text {
          text-align: center;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: white;
        }
  img {
    vertical-align: middle;
    border-style: none;
}
.navbar-b.navbar-reduce {
    transition: all .5s ease-in-out;
    background-color: #fff;
    padding-top: 15px;
    padding-bottom: 15px;
    box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.06);
}
.navbar-expand-md .navbar-collapse {
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
}
.collapse:not(.show) {
    display: none;
}
.justify-content-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
}
.navbar-collapse {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
    -ms-flex-positive: 1;
    flex-grow: 1;
    -ms-flex-align: center;
    align-items: center;
}
body {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
}
.navbar-b {
    transition: all .5s ease-in-out;
    background-color: transparent;
    padding-top: 1.563rem;
    padding-bottom: 1.563rem;
}
.fixed-top {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}
.navbar-expand-md {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
}
.navbar {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: .5rem 1rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
}
.fixed-top {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}
.navbar-expand-md {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
}

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
.navbar-b {
  transition: all .5s ease-in-out;
  background-color: transparent;
  padding-top: 1.563rem;
  padding-bottom: 1.563rem;
}

.navbar-b.navbar-reduce {
  box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.06);
}

.navbar-b.navbar-trans .nav-item,
.navbar-b.navbar-reduce .nav-item {
  position: relative;
  padding-right: 10px;
  padding-left: 0;
}

.navbar-b.navbar-trans .nav-link,
.navbar-b.navbar-reduce .nav-link {
  color: #38D1BF;
  text-transform: uppercase;
  font-weight: 600;
}

.navbar-b.navbar-trans .nav-link:before,
.navbar-b.navbar-reduce .nav-link:before {
  content: '';
  position: absolute;
  margin-left: 0px;
  width: 0%;
  bottom: 0;
  left: 0;
  height: 2px;
  transition: all 500ms ease;
}

.navbar-b.navbar-trans .nav-link:hover,
.navbar-b.navbar-reduce .nav-link:hover {
  color: #1B1B1B;
}

.navbar-b.navbar-trans .nav-link:hover:before,
.navbar-b.navbar-reduce .nav-link:hover:before {
  width: 35px;
}

.navbar-b.navbar-trans .show > .nav-link:before,
.navbar-b.navbar-trans .active > .nav-link:before,
.navbar-b.navbar-trans .nav-link.show:before,
.navbar-b.navbar-trans .nav-link.active:before,
.navbar-b.navbar-reduce .show > .nav-link:before,
.navbar-b.navbar-reduce .active > .nav-link:before,
.navbar-b.navbar-reduce .nav-link.show:before,
.navbar-b.navbar-reduce .nav-link.active:before {
  width: 35px;
}

.navbar-b.navbar-trans .nav-link:before {
  background-color: #38D1BF;
}

.navbar-b.navbar-trans .nav-link:hover {
  color: #38D1BF;
}

.navbar-b.navbar-trans .show > .nav-link,
.navbar-b.navbar-trans .active > .nav-link,
.navbar-b.navbar-trans .nav-link.show,
.navbar-b.navbar-trans .nav-link.active {
  color: #38D1BF;
}

.navbar-b.navbar-reduce {
  transition: all .5s ease-in-out;
  background-color: #fff;
  padding-top: 15px;
  padding-bottom: 15px;
  color: #38D1BF;
}

.navbar-b.navbar-reduce .nav-link {
  color: #38D1BF;
}

.navbar-b.navbar-reduce .nav-link:before {
  background-color: #38D1BF;
}

.navbar-b.navbar-reduce .nav-link:hover {
  color: #38D1BF;
}

.navbar-b.navbar-reduce .show > .nav-link,
.navbar-b.navbar-reduce .active > .nav-link,
.navbar-b.navbar-reduce .nav-link.show,
.navbar-b.navbar-reduce .nav-link.active {
  color: #38D1BF;
}

.navbar-b.navbar-reduce .navbar-brand {
  color: #38D1BF;
}

.navbar-b.navbar-reduce .navbar-toggler span {
  background-color: #1B1B1B;
}

.navbar-b .navbar-brand {
  color: #38D1BF;
  font-size: 1.6rem;
  font-weight: 600;
}

.navbar-b .navbar-nav .dropdown-item.show .dropdown-menu,
.navbar-b .dropdown.show .dropdown-menu,
.navbar-b .dropdown-btn.show .dropdown-menu {
  -webkit-transform: translate3d(0px, 0px, 0px);
  transform: translate3d(0px, 0px, 0px);
  visibility: visible !important;
}

.navbar-b .dropdown-menu {
  margin: 1.12rem 0 0;
  border-radius: 0;
}

.navbar-b .dropdown-menu .dropdown-item {
  padding: .7rem 1.7rem;
  transition: all 500ms ease;
}

.navbar-b .dropdown-menu .dropdown-item:hover {
  background-color: #38D1BF;
  color: #fff;
  transition: all 500ms ease;
}

.navbar-b .dropdown-menu .dropdown-item.active {
  background-color: #38D1BF;
}
.dropdown-menu {
  display:none;
  position:absolute;
  z-index:1;
}
.dropdown:hover .dropdown-menu {display:block; margin-top:-7px;}

</style>


   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
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

<script src="{{ asset('js/app.js') }}" defer></script>

</div>
</html>
