<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(URL::route('registration')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob" value="<?php echo e(old('dob')); ?>">

                                <?php if($errors->has('dob')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('dob')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gender">

                                <?php if($errors->has('gender')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('gender')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('marital') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Marital Status</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="marital">

                                <?php if($errors->has('marital')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('marital')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('national') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">National ID no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="national">

                                <?php if($errors->has('national')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('national')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nhif') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">NHIF no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nhif">

                                <?php if($errors->has('nhif')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nhif')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Mobile Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">

                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('home') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Home Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="home">

                                <?php if($errors->has('home')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('home')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location">

                                <?php if($errors->has('location')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('location')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('education') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Education level</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="education">

                                <?php if($errors->has('education')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('education')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('occupation') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Occupation</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="occupation">

                                <?php if($errors->has('occupation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('occupation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>