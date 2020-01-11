@extends('layouts.app')
@include('partials.header')
<head>

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Relocateguru tips</title>

</head>


  <!-- Masthead -->

  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="{{URL::asset('img/ReGu_Logo_white.png') }}" alt="" width="200" height="150">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Tips</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Sharing your stories with us</p>

    </div>
  </header>

  <!-- Portfolio Section -->

  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tips gallery</h2>

      <!-- Icon Divider -->


      <!-- Portfolio Grid Items -->

      <div class="row">

        <!-- Portfolio Item 1 -->
        @foreach($tips as $tip)
        <div class="col-md-6 col-lg-4">
        <div class="col-md-12">
            <a href="{{route('show', $tip->id)}}">
            <div class="card card-blog">
              <div class="card-img">
                <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->image }}" alt="" class="img-fluid">
              </div>
              <div class="card-body">
                <div class="card-category-box">
                    <h6 class="category">{{$tip->category['name']}}</h6>

                    <h6 class="subcategory">{{$tip->subcategory['name']}}</h6>
                  </div>
                </div>


                <h4 class="serif">{{$tip->title}}</h4>
                <p class="serif">
                    {{ str_limit($tip->description, 50, '....')}}
                </p>
              <div class="card-footer">
                <div class="post-author">
                    <a href="/profile/{{ $tip->user['id'] }}">
                    <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{  $tip->user['avatar'] }}" alt="" class="avatar rounded-circle">
                    <span class="author">{{$tip->user['name']}}</span>

                  </a>
                </div>
                <div class="post-date">
                  <span class="ion-ios-clock-outline"></span> {{$tip->created_at->diffForHumans() }}
                </div>
              </div>
            </a>
              <div>
                     <h3>Comments</h3>
                     <form onsubmit="addComment(event);">
                         <input type="text" placeholder="Add a comment" name="text" id="text" required>
                         <button id="addCommentBtn">Comment</button>
                     </form>
                     <div class="alert" id="alert" style="display: none;"></div>
                     <br>
                     <div id="comments">
                         @foreach($comments as $comment)
                             <div>
                                 <small>{{ $comment->username }}</small>
                                 <br>
                                 {{ $comment->text }}
                             </div>
                         @endforeach
                     </div>
                     <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                      crossorigin="anonymous"></script>
                     <script>
                     function displayComment(data) {
                      let $comment = $('<div>').text(data['text']).prepend($('<small>').html(data['user_id'] + "<br>"));
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
                      let data = {
                          text: $('#text').val(),
                          username: $('#username').val(),
                      };
                      fetch('/tip/select/comments', {
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
                     <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                       <div class="portfolio-item-caption-content text-center text-white">
                     </div>
                   </div>
          </div>
        </div>
        </div>
</div>
@endforeach
<!-- Add jQuery -->
      </div>
      <!-- /.row -->
    </div>
  </section>

  <!-- About Section -->




  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="{{ URL::asset('js/jqBootstrapValidation.js') }}"></script>
  <script src="{{ URL::asset('js/contact_me.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ URL::asset('js/freelancer.min.js') }}"></script>

</body>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RelocateGuru</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Styling from Bootstrap CDN (getbootstrap.com) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
        </style>

    </head>


            </div>
        </div>
        <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
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


    </body>

</html>
