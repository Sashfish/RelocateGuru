

<?php $__env->startSection('content'); ?>
<div class="container col-md-8 col-md-offset-2">
  <div class="well well bs-component">
    <form class="form-horizontal" method="post" action="<?php echo e(route('tip.create')); ?>" enctype='multipart/form-data'>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p class="alert alert-danger"><?php echo e($error); ?></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if(session('status')): ?>
        <div class="alert alert-success">
          <?php echo e(session('status')); ?>

        </div>
      <?php endif; ?>
      <?php echo e(csrf_field()); ?>




<fieldset>
  <legend>Create a new tip</legend>
    <div class="form-group">

    <form method="post" action="<?php echo e(route('tip.create')); ?>" enctype='multipart/form-data'>
        <?php echo csrf_field(); ?>
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image"/>
          </div>


      <div class="form-group">
        <label for="title" class="col-lg-2 control-label">Title</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
      </div>

      <div class="form-group">
        <label for="description" class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" placeholder="Describe Tip" id="description" name="description"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="">Categories</label>
        <select class="form-control input-sm" name="category" id="category">
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">Cities</label>
        <select class="form-control input-sm" name="city" id="city">
          <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?>     </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>


      <div class="form-group">
        <label for="url" class="col-lg-2 control-label">Site URL</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="url" placeholder="url" name="url">
          </div>
        </div>


        <div class="col-1g-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
        </form>
      </div>
    </fieldset>
  </form>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/team_bravo_2019/resources/views/tip/create.blade.php ENDPATH**/ ?>