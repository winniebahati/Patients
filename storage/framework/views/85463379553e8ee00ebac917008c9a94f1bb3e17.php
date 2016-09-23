

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form id="patient-registration-form" class="form-horizontal" role="form">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob" value="<?php echo e(old('dob')); ?>">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gender">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('marital') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Marital Status</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="marital">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('national') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">National ID no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="national">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nhif') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">NHIF no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nhif">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Mobile Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('home') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Home Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="home">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('education') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Education level</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="education">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('occupation') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Occupation</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="occupation">
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

<?php $__env->startSection('javascripts'); ?>
<script src="https://cdn.jsdelivr.net/pouchdb/6.0.4/pouchdb.min.js"></script>
<script>
    var remote_db = new PouchDB('http://localhost:5984/patients');
    var local_db = new PouchDB('patients');

    local_db.sync(remote_db, {
       live: true,   // do a live, ongoing sync
       retry: true   // retry if the conection is lost
    });

    $('#patient-registration-form').submit(function(e){
        e.preventDefault();

        var $inputs = $('#patient-registration-form :input');
        var values = {
            _id: new Date().toISOString(),
        };

        $inputs.each(function() {
            if (this.name && $(this).val()){
                values[this.name] = $(this).val();
            }
        });

        local_db.put(values, function(err, result){
            if (err) {
                console.error(err);
                return;
            }

            alert(JSON.stringify(result))
        })

        local_db.replicate.to(remote_db).on('complete', function () {
              // yay, we're done!
            }).on('error', function (err) {
              console.log(err);
            });


    });

        window.location.replace("<?php echo e(URL::route('home')); ?>");
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>