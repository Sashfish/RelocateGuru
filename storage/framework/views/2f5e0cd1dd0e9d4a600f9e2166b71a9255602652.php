<?php $__env->startSection('content'); ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<p>Registered since <?php echo e(Auth::user()->created_at); ?></p>
</div>
<div class="d-flex">
<div class="pr-4">
<form action='/home/editprofile'>
  <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align">Settings</button>
</form>
</div>
</div>
<?php if(Auth::user()->role_id == 1): ?>
<div class="d-flex">
<div class="pr-4">
  <form action="/admin">
    <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align">Admin Controls</button>
  </form>
</div>
</div>
<?php endif; ?>
<div class="d-flex">
<div class="pr-4">
  <form action="/tip/create">
    <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align">Add New Post</button>
  </form>
</div>
</div>
        <div class="d-flex">
              <div class="pr-4">
                <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align">Posts</button>
                <div id="Demo1" class="w3-hide w3-container">

                  <?php $__currentLoopData = Auth::user()->tip->pluck('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>
                  <?php $__currentLoopData = Auth::user()->tip->pluck('description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>
                  <?php $__currentLoopData = Auth::user()->tip->pluck('image'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>
                  <?php $__currentLoopData = Auth::user()->tip->pluck('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

                  <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e(Auth::user()->avatar); ?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <span class="w3-right w3-opacity"></span>
                    <h4> <?php echo e(Auth::user()->name); ?></h4><br>
                    <h3><?php echo e($title); ?></h3>
                    <h4><?php echo e($description); ?></h4>
                    <p><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($image); ?>" style="width:200px; height:200px;"></p>
                    <hr class="w3-clear">

                    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>

                    <button data-toggle="collapse" data-target="#call_content" class="btn btn-info">Delete Post</button>

                    <div class="collapse" id="call_content">
                      <div class="d-flex">
                        <div class="pr-4">
                          <form action='/home/<?php echo e($tip_id); ?>/deletepost' method="get">
                            <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align">Press to confirm post deletion. This is permanent!</button>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
          </div>
          <div class="d-flex">
                <div class="pr-4">
                  <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"> My photos</button>
                  <div id="Demo2" class="w3-hide w3-container">
                    <div class="w3-half">
                      <?php $__currentLoopData = Auth::user()->tip->pluck('image'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?></p>
                     <img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/<?php echo e($image); ?>" style="width:80%" class="w3-margin-bottom">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex">
                      <div class="pr-4">
                        <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align">Likes</button>
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
      </div>
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
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alice/team_bravo_2019/resources/views/home.blade.php ENDPATH**/ ?>