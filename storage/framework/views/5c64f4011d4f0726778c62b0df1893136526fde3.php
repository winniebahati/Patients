<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome admin</div>

                <div class="panel-body">
                    <li><a href="<?php echo e(URL::route('register-patient')); ?>"> Register patient</a></li>
                    <li><a href="<?php echo e(URL::route('view-patient')); ?>"> View patients</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>