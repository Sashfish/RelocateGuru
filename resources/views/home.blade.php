@extends('layouts.app')
@section('content')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/sweetalert/sweetalert.css" rel="stylesheet">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

      <!-- Profile -->
      <div class="container">
    <div class="row">
         <div class="col-3 p-5">
             <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}" class="rounded-circle w-100">
         </div>

         <div class="col-9 pt-5">
           <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->email }}</p>
                  <div class="d-flex justify-content-between align-items-baseline">
                      <div class="d-flex align-items-center pb-3">
                          <div class="h3">{{ Auth::user()->name }}

                          </div>


                      </div>
</div>
        </div>
<div class="col-3 pt-5">
<p>Registered since {{Auth::user()->created_at->todateString()}}</p>
</div>
</div>
</div>

<nav class="navbar navbar-b navbar-reduce d-flex justify-content-center" id="navii">
<div class="d-flex justify-content-center">


<div class="pr-4">
<form action='/home/editprofile'>
  <button type="button" class="btn btn-primary" id="_addform_botton">Settings</button>
</form>
<div>
</div>
</div>

@if (Auth::user()->role_id == 1)

<div class="pr-4">
  <form action="/admin">
    <button type="submit" class="btn btn-primary">Admin Controls</button>
  </form>
</div>

@endif

<div class="pr-4">
  <form action="/tip/create">
    <button type="botton" class="btn btn-primary" id="_add_form_botton">Add New Post</button>
  </form>
  <div>
</div>
</div>

  <div class="pr-4">
    <button onclick="myFunction('Demo1')" class="btn btn-primary">Posts</button>
  </div>

    <div class="pr-4">
      <button onclick="myFunction('Demo2')" class="btn btn-primary"> My photos</button>
    </div>

  <div class="pr-4">
      <button onclick="myFunction('Demo3')" class="btn btn-primary">Likes</button>
  </div>
      </div>
          </nav>

          <div id="Demo2" class="w3-hide w3-container">

            @foreach(Auth::user()->tip->pluck('image') as $image)</p>
                  <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $image }}" style="width:80%" class="w3-margin-bottom">
            @endforeach
          </div>


          <div id="Demo3" class="w3-hide w3-container">
            <div class="w3-half">
                  @foreach($tip_likes as $likes)
            <h4>{{ $likes->tip->user['name'] }}</h4><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $likes->tip->user['avatar']  }}"  class="w3-circle" style="height:106px;width:106px" >
            <p>{{ $likes->tip['description'] }}</p>
            <p>Liked By <p class="w3-center"><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}"  class="w3-circle" style="height:106px;width:106px" ></p> {{ $likes->user->name }} {{ $likes->created_at }} </p>
            @endforeach
                </div>
                </div>

              <div class="form-group" id="_add_form" style="display:none;">
                <form method="post" action="{{route('tip.create')}}" enctype='multipart/form-data'>
                @csrf
                  <div class="form-group">
                  <div class="col-lg-15">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image"/>
                  </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-15">
                  <input type="text" class="form-control" id="title" placeholder="title" name="title">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-15">
                  <textarea class="form-control" rows="3" placeholder="Describe Tip" id="description" name="description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="">Categories</label>
                <div class="col-lg-15">
                <select class="form-control input-sm" name="category" id="category">
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="">Cities</label>
                <div class="col-lg-15">
                <select class="form-control input-sm" name="city" id="city">
                  @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}     </option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="url" class="col-lg-2 control-label">Site URL</label>
                  <div class="col-lg-15">
                    <input type="text" class="form-control" id="url" placeholder="url" name="url">
                  </div>
                </div>
                <div class="col-1g-15 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
            </div>

          <div class="form-group" id="_addform" style="display:none;">
            <div class="container col-md-8 col-md-offset-2">
              <div class="well well bs-component">
              <form class="form-horizontal" method="post" action="{{route('tip.edit')}}" enctype='multipart/form-data'>
                  @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{$error}}</p>
                  @endforeach
                  @if(session('status'))
                   <div class="alert alert-success">
                     {{session('status')}}
                   </div>
                   @endif
                   <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                   <fieldset>
                     <legend>Profile Settings</legend>
                     <div class="form-group">
                       <label for="title" class="col-lg-2 control-label">Name</label>
                       <div class="col-lg-10">
                         <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{Auth::user()->name}}">
                       </div>
                       <label for="title" class="col-lg-2 control-label">Email</label>
                       <div class="col-lg-10">
                         <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{Auth::user()->email}}">
                       </div>
                       <div class="col-lg-10">
                       <b><p class="w3-left w3-left-align">Current Avatar:</p></b><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}" class="w3-left w3-circle w3-margin-right w3-left-align" style="width:60px">
                       <p class="w3-left w3-left-align">Upload a new avatar</p>
                     </div>
                       <div class="col-lg-10">
                         <input type="file" class="form-control" name="image" id="image"/>
                       </div>
                     </div>
                     <div class="col-1g-10 col-lg-offset-2">
                       <form action='/home'>
                         <button type="submit" class="btn btn_default">Cancel</button>
                       </form>
                       <button type="submit" class="btn btn-default">Submit</button>
                     </div>
                   </fieldset>
                 </form>
                 <button data-toggle="collapse" data-target="#call_content" class="btn btn-info">Delete Your Profile</button>
               </div>
             </div>          
       
             <div class="collapse" id="call_content">
               <div class="d-flex">
                 <div class="pr-4">
                   <form action='/home/deleteuser'>
                     <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align" onclick="if (!confirm('Are you sure you want to delete this account permanently?')) { return false }">Press to confirm profile deletion. This is permanent!</button>
                   </form>
                 </div>
               </div>
             </div>
            </div>


            <div id="Demo1" class="w3-hide w3-container">

              @foreach(Auth::user()->tip as $tip)</p>


              <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

              <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <span class="w3-right w3-opacity"></span>
                <h4> {{ Auth::user()->name }}</h4><br>
                <h3>{{ $tip->title }}</h3>
                <p><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->image }}" style="width:400px; height:400px;"></p>
                <h4>{{ $tip->description }}</h4>

                <hr class="w3-clear">

                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
                <button type="button" data-toggle="collapse" class="w3-button w3-theme-d2 w3-margin-bottom"  data-target="#call_content" id = "_do_delete"><i class="fa fa-delete"></i>  Delete </button>


                <div class="collapse" id="call_content">
                  <div class="d-flex">
                    <div class="pr-4">
                      <form action='/home/{{$tip->id}}/deletepost' method="get">
                        <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align">Press to confirm post deletion. This is permanent!</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
            </div>




<style>
fieldset{
    background-color: #f1f1f1;
    border: none;
    border-radius: 2px;
    margin-bottom: 12px;
    overflow: hidden;
    padding: 0 .625em;
}
.btn-primary {
    color: #fff;
    background-color: #1abc9c;
    border-color: #1abc9c;
}
.btn-primary:hover{
  color:#02e6b9
}
#_add_form{
    width: 1200px;
    margin: 80px auto;
    border: 2px solid black;
    text-align: justify; /*设置文本水平居中*/
    padding: 50px 20px;
  }

  #_addform{
    width: 1200px;
    margin: 80px auto;
    border: 2px solid black;
    text-align: justify; /*设置文本水平居中*/
    padding: 50px 20px;
  }
.navii {
      width: 300px;
      height:300px;
      border: solid 1px;
      display:flex;
      flex-direction:center;
      justify-content: center;
      align-items: center;
}
</style>
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else {
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className =
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<!--script src="../js/jquery-2.1.1.min.js" ></script>
<script src="../js/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
$(function() {
  $("#_do_delete").on("click", function() {
      var url = $(this).attr('rel');;
      swal({
          title: "are you sure?",
          text: "Deleted will not be restored, please be careful!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "yes",
          cancelButtonText: "no",
          closeOnConfirm: false
      }, function () {
          $.get(url,{},function(data){
                swal("sunccess！", "", "success");
                location.reload();
          }, 'json');
      });
  })
  $(".btn-primary").on("click", function() {
    $("_add_form").hide();
  })
  $("#_add_form_botton").on("click", function() {
      $("_add_form").show();
  })
})
</script-->
<script type="text/javascript">
$("#_add_form_botton").click(function(e) {
        if($("#_add_form").is(':hidden')) {
          $("#_add_form").show();
        }else{
          $("#_add_form").hide();
        }
        e.preventDefault();
    });
</script>

<script type="text/javascript">
  $("#_addform_botton").click(function(e) {
          if($("#_addform").is(':hidden')) {
            $("#_addform").show();
          }else{
            $("#_addform").hide();
          }
          e.preventDefault();
      });
  </script>
</body>
@endsection