<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
      <img class="masthead-avatar mb-5" src="<?php echo e(URL::asset('img/ReGu_Logo_white.png')); ?>" alt="" width="200" height="150">

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

      <div class="row">

        <!-- Portfolio Item 1 -->
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-lg-4">
        <div class="col-md-12">
            <div class="card card-blog">
              <div class="card-img">
                <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($val->image); ?>" alt="" class="card-img" width="350px" height="350px">
              </div>
              <br>
              <div class="card-body">

                <div class="card-category-box">
                    <h6 class="category"><?php echo e($val->category['name']); ?></h6>
                    <h6 class="subcategory"><?php echo e($val->subcategory['name']); ?></h6>
                  </div>
                </div>
                <h4 class="serif"><?php echo e($val->title); ?></h4>
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
                <p class="serif"><?php echo e($val->description); ?></p>
                <a href="<?php echo e($val->url); ?>"><?php echo e($val->url); ?></a>
              <div class="card-footer">
                <div class="post-author">
                  <a href="#">
                    <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($val->user['avatar']); ?>" alt="" class="avatar rounded-circle">
                    <span class="author"><?php echo e($val->user['name']); ?></span>

                  </a>
                </div>
              </div>

              <div>
                     <h6>Comments</h6>
                     <form onsubmit="addComment(event);">
                         <input type="text" placeholder="Add a comment" name="text" id="text" required>
                         <input type="hidden" name="tip_id" id="tip_id" value="<?php echo e($val->tip_id); ?>">
                         <input type="hidden" name="username" id="username" value="<?php echo e(Auth::user()->name); ?>">
                         <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                         <button id="addCommentBtn">Comment</button>
                     </form>
                     <div class="alert" id="alert" style="display: none;"></div>
                     <br>
                     <div id="comments">
                         <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div>
                                 <small><?php echo e($comment->username); ?></small>
                                 <br>
                                 <?php echo e($comment->body); ?>

                             </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  <script src="<?php echo e(URL::asset('js/jqBootstrapValidation.js')); ?>"></script>

</body>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
<<<<<<< HEAD
=======
>>>>>>> 798c4510587e1df651c1c101f0e049b74df94139
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

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
<?php /**PATH /home/vagrant/code/team_bravo_2019/resources/views/tip.blade.php ENDPATH**/ ?>
