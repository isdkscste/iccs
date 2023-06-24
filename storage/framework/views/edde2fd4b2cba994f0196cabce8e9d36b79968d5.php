<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo e($page_title ?? "Recruitment Portal"); ?></title>
    <link rel="icon" href="<?php echo e(URL::asset('favicon.ico')); ?>" type="image/x-icon">
    <meta name="description"
    content="Online Portal" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script type="text/javascript">
        var APP_URL = '<?php echo e(URL::to('/')); ?>';
    </script>
    <?php echo $__env->make('layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('commonstyle'); ?>
</head>

<body class="sidebar-mini hold-transition">
    <div class="wrapper" style="">
        <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper" style="background-color: #f4f6f9;">
             <?php if(Session::has('message')): ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo e(Session::get('message')); ?>

        <?php
        Session::forget('message');
        ?>
        </div>
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo e(Session::get('error')); ?>

        <?php
        Session::forget('error');
        ?>
        </div>
        <?php endif; ?>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo e(Session::get('success')); ?>

        <?php
        Session::forget('success');
        ?>
        </div>
        <?php endif; ?>
            <!-- <section class="content-header">
            </section>
            <section class="content"> -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- </section> -->
            </div>

            <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- change password -->
        <div class="modal fade" id="changeModal">
            <div class="modal-dialog">
              <div class="modal-content">
 
                <form method="POST" action="<?php echo e(route('update-password')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                      <h4 class="modal-title">Change Password</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <p><div class="form-group row">
                    <label for="old_password" class="col-md-6 col-form-label"><?php echo e(__('Current password')); ?></label>
                    <div class="col-md-6">
                        <input id="old_password" name="old_password" type="password" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new_password" class="col-md-6 col-form-label"><?php echo e(__('New password')); ?></label>
                    <div class="col-md-6">
                        <input id="new_password" name="new_password" type="password" class="form-control" required autofocus>
                         
                    </div>
                </div>
               </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                <?php echo e(__('Submit')); ?>

            </button>
        </div>

    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- change password -->
<?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('commonjs'); ?>
<?php echo $__env->yieldPushContent('pagescripts'); ?>

</body>

</html><?php /**PATH F:\xampp\htdocs\iccs\resources\views/layout/master.blade.php ENDPATH**/ ?>