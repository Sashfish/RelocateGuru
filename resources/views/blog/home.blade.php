
<head>
   @include('partials.header')
  <br>
  
   <section id="intro">
      <div class="container" margin-top="50px">
        <div class="row">
          <div class="container" text-align="left">
          <span style="font-size:76px;">
          <span style="color:#FFFFFF;">
          <span style="font-style:italic;">
          <span style="font-family:wfont_c3f509_79df5eba2bea4d558e078e7910e05d06,wf_79df5eba2bea4d558e078e791,orig_malina;">Blog</span>
          </span>
          </span>
          </span>
            <h1></h1>
            <p></p>
          </div>
        </div>
      </div>
    </section>
    <title>RelocateGuru Blog</title>

    <style>
    #intro {
      background: url(../img/blogbanner.jpeg) center center no-repeat fixed;
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
        margin-top: 95px;
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
        .card {
            border-color: #ABEBC6;
        }
        .card-img-top {
            padding: 0px 0;
            height: 200px;
            margin-top: 20px;
            margin-bottom: 20px;
            background: url(../img/banner.jpg) center center no-repeat fixed;
            background-attachment: scroll;
            background-size: cover;
            width: 100%;
        }

        .card-title,
        .card-header {
            font-size: 10pt !important;
        }
        .recent-posts {
            margin-bottom: 20px;
        }
    </style>
</head>

<body id="page-top">
    <!-- Main body -->
    <!-- Page Content -->
    <br>
    <br>
    <div class="container">
        <div class="row">
            <!-- <img class="card-img-top" src="" alt="">-->
            <p></p>
            <!-- Blog Entries Column -->
            <div class="col-md-9">
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body" text-align="justify">
                        <h2 class="card-title"></h2>
                     @include('partials.article1')
                             </div>

                    <!-- Blog Post 
                    <div class="card-body">
                        <h2 class="card-title">Section Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    </div>-->

                    <!-- Blog Post 
                    <div class="card-body">
                        <h2 class="card-title">Section Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    </div> -->

                    <!-- Blog Post 
                    <div class="card-body">
                        <h2 class="card-title">Section Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    </div>-->
                </div>

                <!-- Recent posts -->
                <b><h1 class="h6">Discover New Tips</h1></b>

               
                <div class="row recent-posts">
                @foreach ($tip as $tip)
                    <div class="col-sm-4"> 
                            <a href="{{route('show', $tip->id)}}">                           
                        <div class="card">
                        <img class="card-img-top" src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{$tip->image}}" alt="" style = "width:200px height:200px">
                            <div class="card-body text-center">
                            <p>{{$tip->title}}</p>
                            </div>                            
                        </div>  
                    </a>                      
                    </div>                 
                    @endforeach                   
                </div>

                <!-- Login to leave comment -->
                <div class="card leave-comment">
                    <div class="card-body text-center">
                        <span class="align-text-middle"><a href="/login" style="color:#ABEBC6;">Log in</a> to leave a comment.</span>
                    </div>
                </div>


                <!-- Pagination -->
                <!-- <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Latest Posts</h5>
                    <div class="card-body">
                        <p>List of latest posts goes here</p>
                        <a href="#" class="btn">View All &rarr;</a>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">What are you interested in?</h5>
                    <div class="card-body">
                        Discover something nice
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- Footer-->
    @include('partials.footer')
    <!-- Footer-->

    <!-- Bootstrap core JavaScript -->
    <div id="preloader"></div>

</body>
