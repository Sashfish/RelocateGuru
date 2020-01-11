<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>
  <title>Relocateguru tips</title>
</head>
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="{{URL::asset('img/ReGu_Logo_white.png') }}" alt="" width="200" height="150">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Tips</h1>
  </header>
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">
      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"></h2>

      <br>
      <br>
      <!-- Portfolio Grid Items -->
      <div class="nbs" >
          <a href="{{route('tip.create')}}" class="nb nb-main"> + <span>Create Tip</span></a>
        </div>
      <br>

      <div class="row">

        <!-- Portfolio Item 1 -->
        @foreach($data as $key => $tip)
        <div class="col-md-6 col-lg-4">
        <div class="col-md-12">
            <a href="{{route('show', $tip->id)}}">
            <div class="card card-blog">
              <div class="card-img">
                <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->image }}" alt="" class="card-img" width="350px" height="350px">
              </div>
              <br>
              <div class="card-body">
                <div class="card-category-box">
                    <h6 class="category">{{$tip->category['name']}}</h6>
                    <h6 class="subcategory">{{$tip->subcategory['name']}}</h6>
                  </div>
                </div>
                <h4 class="serif">{{$tip->title}}</h4>
              </a>
                <!--This script is meant to add "read more" link to the tip description-->
                <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                    var maxLength = 50;
                    $(".serif").each(function(){
                      var myStr = $(this).text();
                      if($.trim(myStr).length > maxLength){
			                var newStr = myStr.substring(0, maxLength);
			                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                      $(this).empty().html(newStr);
                      $(this).empty().html(newStr);
                      $(this).append('<span class="more-text">' + removedStr + '</span>');
		                  }
	                  });
                    $(".read-more").click(function(){
		                  $(this).siblings(".more-text").contents().unwrap();
		                  $(this).remove();
	                  });
                });
                </script>
                <!--end of "readmore" script-->
                <style type="text/css">
                .more-text {
                 display: none;
                }
                </style>
                <p class="serif">{{ str_limit($tip->description, 20, '....')}} <a href="{{route('show', $tip->id)}}" class='btn btn-info btn-sm'>...ReadMore</a></p>
                <a href="{{$tip->url}}">{{$tip->url}}</a>
              <div class="card-footer">
                <div class="post-author">
                    <a href="/profile/{{ $tip->user['id'] }}">
                    <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{  $tip->user['avatar'] }}" alt="" class="avatar rounded-circle">
                    <span class="author">{{$tip->user['name']}}</span>

                  </a>
                </div>

              </div>
              <div>
                <p class="likebtn" @click="likeTip(tip.id)">
                  <i class="fa fa-thumbs-up"></i>Like</p>
                     <h6>Comments</h6>
                     <form onsubmit="addComment(event);">
                         <input type="text" placeholder="Add a comment" name="text" id="text" required>
                         <input type="hidden" name="tip_id" id="tip_id" value="{{$tip->tip_id}}">
                         <input type="hidden" name="username" id="username" value="{{Auth::user()->name}}">
                         <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                         <button id="addCommentBtn">Comment</button>
                     </form>
                     <div class="alert" id="alert" style="display: none;"></div>
                     <br>

                     <div id="comments">
                         @foreach($comments as $comment)
                             <div>
                                 <small>{{ $comment->username }}</small>
                                 <br>
                                 {{ $comment->body }}
                             </div>
                         @endforeach
                     </div>
                     <script>
                     function displayComment(data) {
                      let $comment = $('<div>').text(data['text']).prepend($('<small>').html(data['username'] + "<br>"));
                      $('#comments').prepend($comment);
                     }
                     function addComment(event) {
                      function showAlert(message) {
                          let $alert = $('#alert');
                          $alert.text(message).show();
                          setTimeout(() => $alert.hide(), 4000);
                      }
                      event.preventDefault();
                      $('#addCommentBtn').attr('disabled', 'disabled');
                      var data = {
                          text: $('#text').val(),
                          username: $('#username').val(),
                          userid: $('#user_id').val()
                          //tipid: $('#tip_id').val(),
                      };
                      fetch('/tip/select', {
                          body: JSON.stringify(data),
                          credentials: 'same-origin',
                          headers: {
                              'content-type': 'application/json',
                              'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
                              'x-socket-id': window.socketId
                          },
                          method: 'POST',
                          mode: 'cors',
                      }).then(response => {
                          $('#addCommentBtn').removeAttr('disabled');
                          displayComment(data);
                          showAlert('Comment posted!');
                      })
                     }
                     </script>

          </div>
        </div>
        </div>
</div>
@endforeach
</form>

      </div>
    </div>
  </section>

  <!-- Contact Section -->

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
  <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <!-- Plugin JavaScript -->
  <!-- Contact Form JavaScript -->
  <script src="{{ URL::asset('js/jqBootstrapValidation.js') }}"></script>

  </body>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>



        <!-- Fonts -->


       <!-- Styles -->
       <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .card-img{
              max-width: 350px;
              max-height: 350px;
            }
            .card-category-box {
            margin-top: 20px;
            }
            .serif .more-text{
                 display: none;
            }
            .card.card-blog {
              text-align: justify;
            }
            .card.card-blog .serif {
            padding: 10px;
            }
            .card.card-blog .comments {
            padding: 10px;
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
    </head>
            </div>
        </div>
        <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
 <script>
     var socket = new Pusher("4ac578a472dff2b47ac9", {
         cluster: 'eu',
     });
     // set the socket ID when we connect
     socket.connection.bind('connected', function() {
         window.socketId = socket.connection.socket_id;
     });
     socket.subscribe('comments')
         .bind('new-comment',displayComment);

 </script>

 </script>
    @include('partials.footer')
    </body>

</html>
<script>
(function ($) {
	"use strict";
	var nav = $('nav');
  var navHeight = nav.outerHeight();

  $('.navbar-toggler').on('click', function() {
    if( ! $('#mainNav').hasClass('navbar-reduce')) {
      $('#mainNav').addClass('navbar-reduce');
    }
  })

  // Preloader
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

	/*--/ Star ScrollTop /--*/
	$('.scrolltop-mf').on("click", function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	});

	/*--/ Star Counter /--*/
	$('.counter').counterUp({
		delay: 15,
		time: 2000
	});

	/*--/ Star Scrolling nav /--*/
	$('a.js-scroll[href*="#"]:not([href="#"])').on("click", function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - navHeight + 5)
				}, 1000, "easeInOutExpo");
				return false;
			}
		}
	});

	// Closes responsive menu when a scroll trigger link is clicked
	$('.js-scroll').on("click", function () {
		$('.navbar-collapse').collapse('hide');
	});

	// Activate scrollspy to add active class to navbar items on scroll
	$('body').scrollspy({
		target: '#mainNav',
		offset: navHeight
	});
	/*--/ End Scrolling nav /--*/

	/*--/ Navbar Menu Reduce /--*/
	$(window).trigger('scroll');
	$(window).on('scroll', function () {
		var pixels = 50;
		var top = 1200;
		if ($(window).scrollTop() > pixels) {
			$('.navbar-expand-md').addClass('navbar-reduce');
			$('.navbar-expand-md').removeClass('navbar-trans');
		} else {
			$('.navbar-expand-md').addClass('navbar-trans');
			$('.navbar-expand-md').removeClass('navbar-reduce');
		}
		if ($(window).scrollTop() > top) {
			$('.scrolltop-mf').fadeIn(1000, "easeInOutExpo");
		} else {
			$('.scrolltop-mf').fadeOut(1000, "easeInOutExpo");
		}
	});

	/*--/ Star Typed /--*/
	if ($('.text-slider').length == 1) {
    var typed_strings = $('.text-slider-items').text();
		var typed = new Typed('.text-slider', {
			strings: typed_strings.split(','),
			typeSpeed: 80,
			loop: true,
			backDelay: 1100,
			backSpeed: 30
		});
	}

	/*--/ Testimonials owl /--*/
	$('#testimonial-mf').owlCarousel({
		margin: 20,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			}
		}
	});

})(jQuery);

</script>
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
