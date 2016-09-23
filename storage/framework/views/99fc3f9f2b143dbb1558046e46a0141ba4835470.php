<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View patients</div>
                <div class="panel-body">
						   <?php if($results->count()): ?>
						    <?php foreach($results as $result): ?>

						     		Name: <?php echo e($result->name); ?> |
						            DOB: <?php echo e($result->dob); ?> |
						            Email: <?php echo e($result->email); ?> |
						            Gender: <?php echo e($result->gender); ?> |
						            Marital status: <?php echo e($result->marital); ?>

						            National ID no: <?php echo e($result->national); ?>

						            NHIF no: <?php echo e($result->nhif); ?>

						            Mobile Phone #: <?php echo e($result->phone); ?>

						            Home Phone #:<?php echo e($result->home); ?>

						            Location: <?php echo e($result->location); ?>

						            Education level: <?php echo e($result->education); ?>

						            Occupation: <?php echo e($result->occupation); ?>

						            <li><a href="<?php echo e(URL::route('edit', $result->id)); ?>"></i>Edit</a></li>|<li><a href="<?php echo e(URL::route('delete', $result->id)); ?>"></i>Delete</a></li><br><br>
						          
						    <?php endforeach; ?>
						  <?php else: ?>
						  <p>Nothing found</p>
						  <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>