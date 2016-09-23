<?php $__env->startSection('content'); ?>

<script>
          //var PouchDB = require('pouchdb');
          var localDB = new PouchDB('patients');

          var remoteDB = new PouchDB('http://localhost:5984/patients');




// remoteDB.info().then(function (info) {
//   console.log(info);
// })

// localDB.info().then(function (info) {
//   console.log(info);
// })


// var doc = {
//   "_id": "bac9f54f6d147386273bff7beb0007a0",
//    "_rev": "2-0039f6407e12c193a73b9434cf3aaf3a",
//   "Name": "Erick",
//   "Username": "emabusi"
// };
// localDB.put(doc);


//           localDB.replicate.to(remoteDB).on('complete', function () {
//               // yay, we're done!
//             }).on('error', function (err) {
//               console.log("error");
//             });



//             remoteDB.info().then(function (info) {
//   console.log(info);
// })

// localDB.info().then(function (info) {
//   console.log(info);
// })
     
            // localDB.sync(remoteDB, {
            //   live: true,
            //   retry: true
            // }).on('change', function (change) {
            //   // yo, something changed!
            // }).on('paused', function (info) {
            //   // replication was paused, usually because of a lost connection
            // }).on('active', function (info) {
            //   // replication was resumed
            // }).on('error', function (err) {
            //   // totally unhandled error (shouldn't happen)
            // });
      </script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome admin</div>
                   
                
                    <li><a href="<?php echo e(URL::route('register-patient')); ?>"> Register patient</a></li>
                    <li><a href="<?php echo e(URL::route('view-patient')); ?>"> View patients</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('js/apps.js')); ?>"></script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>