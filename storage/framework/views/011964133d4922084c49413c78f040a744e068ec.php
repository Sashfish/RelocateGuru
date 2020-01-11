
<?php $__env->startSection('content'); ?>

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
             <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle w-100">
         </div>

         <div class="col-9 pt-5">
           <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo e(Auth::user()->email); ?></p>
                  <div class="d-flex justify-content-between align-items-baseline">
                      <div class="d-flex align-items-center pb-3">
                          <div class="h3"><?php echo e(Auth::user()->name); ?>


                          </div>


                      </div>
</div>
        </div>
<div class="col-3 pt-5">
<p>Registered since <?php echo e(Auth::user()->created_at->todateString()); ?></p>
</div>
</div>
</div>
<nav class="navbar navbar-b navbar-reduce" id="navii">
<div class="d-flex">
<div class="pr-4">
<form action='/home/editprofile'>
  <button type="submit" class="btn btn-primary">Settings</button>
</form>
</div>

<?php if(Auth::user()->role_id == 1): ?>

<div class="pr-4">
  <form action="/admin">
    <button type="submit" class="btn btn-primary">Admin Controls</button>
  </form>
</div>

<?php endif; ?>
<div class="pr-4">
  <form action="/tip/create">
    <button type="botton" class="btn btn-primary" id="_add_form_botton">Add New Post</button>
  </form>
  <div>
</div>
</div>

              <div class="pr-4">
                <button onclick="myFunction('Demo1')" class="btn btn-primary">Posts</button>
                <div id="Demo1" class="w3-hide w3-container">

                  <?php $__currentLoopData = Auth::user()->tip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>


                  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

                  <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e(Auth::user()->avatar); ?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <span class="w3-right w3-opacity"></span>
                    <h4> <?php echo e(Auth::user()->name); ?></h4><br>
                    <h3><?php echo e($tip->title); ?></h3>
                    <p><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($tip->image); ?>" style="width:400px; height:400px;"></p>
                    <h4><?php echo e($tip->description); ?></h4>

                    <hr class="w3-clear">
                    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
                    <form action='/home/<?php echo e($tip->id); ?>/deletepost' method="get">
                    <button type="submit" data-toggle="collapse" class="delete_link"  data-target="#call_content" id = "_do_delete" onclick="if (!confirm('Are you sure you want delete this post permanently?')) { return false }"><i class="fa fa-delete"></i>Delete</button>
                    </form>

                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
              </div>
                <div class="pr-4">
                  <button onclick="myFunction('Demo2')" class="btn btn-primary"> My photos</button>
                  <div id="Demo2" class="w3-hide w3-container">

                      <?php $__currentLoopData = Auth::user()->tip->pluck('image'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>
                     <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($image); ?>" style="width:80%" class="w3-margin-bottom">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                    </div>
                  </div>
                      <div class="pr-4">
                        <button onclick="myFunction('Demo3')" class="btn btn-primary">Likes</button>
                        <div id="Demo3" class="w3-hide w3-container">
                          <div class="w3-half">
                            <?php $__currentLoopData = $tip_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <h4><?php echo e($likes->tip->user['name']); ?></h4><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($likes->tip->user['avatar']); ?>"  class="w3-circle" style="height:106px;width:106px" >
                      <p><?php echo e($likes->tip['description']); ?></p>
                      <p>Liked By <p class="w3-center"><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e(Auth::user()->avatar); ?>"  class="w3-circle" style="height:106px;width:106px" ></p> <?php echo e($likes->user->name); ?> <?php echo e($likes->created_at); ?> </p>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
          </nav>
          <div class="form-group" id="_add_form" style="display:none;">
            <form method="post" action="<?php echo e(route('tip.create')); ?>" enctype='multipart/form-data'>
            <?php echo csrf_field(); ?>
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
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="">Cities</label>
                <div class="col-lg-15">
                <select class="form-control input-sm" name="city" id="city">
                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?>     </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/team_bravo_2019/resources/views/home.blade.php ENDPATH**/ ?>