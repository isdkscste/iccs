
<!-- <header class="main-header"> -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Scientist Post</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    

                    <li class="nav-item dropdown show">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                            style="left: inherit; right: 0px; width: max-content">
                            <a href="#" class="dropdown-item">
                                <div class="">
                                    <div class="text-center">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="text-center m-4">
                                        <h3 class="dropdown-item-title">
                                            <?php echo e(Auth::user()->name); ?>

                                        </h3>
                                        <small><?php echo e(Auth::user()->email); ?></small>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="row ">
                                <div class="col-md-6 dropdown-footer">
                                   <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changeModal">Change Password</a>

                                </div>
                                <div class="col-md-6 dropdown-footer">
                                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('logout')); ?>"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <?php echo e(__('Logout')); ?>

            </a>
 
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                         <?php echo csrf_field(); ?>

            </form>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </ul>
    </nav>
<!-- </header> --><?php /**PATH F:\xampp\htdocs\cwrdm\resources\views/layout/header.blade.php ENDPATH**/ ?>