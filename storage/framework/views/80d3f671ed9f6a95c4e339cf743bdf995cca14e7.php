<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Application For Scientist Post|Home</title>

    <link rel="shortcut icon" href="<?php echo e(asset('images/fav.jpg')); ?>">
    <link rel="stylesheet" href=" <?php echo e(asset('loginasset/css/bootstrap.min.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('loginasset/css/fontawsom-all.min.css')); ?> ">
    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('loginasset/css/style.css')); ?> " />
    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('loginasset/css/style1.css')); ?> " />
    <script type="text/javascript">
    var APP_URL = '<?php echo e(URL::to('/')); ?>';
  </script>
  
</head>

<body>
    <div class="container-fluid ">
       <header>
           <div class="container">
               <div class="row">

                   <div class="col-md-12">
                       <img src="<?php echo e(asset('images/k3.jpg')); ?>" style=" " ><strong class="strong1" > KSCSTE-CENTRE FOR WATER RESOURCES DEVELOPMENT AND MANAGEMENT</strong><!-- <img src="<?php echo e(asset('images/k3.jpg')); ?>" style=" " alt=""> -->
                        <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-lock"></i></a>
                   </div>
                   <!-- <div id="menu" class="col-md-2 d-none d-md-block">
                       
                   </div> -->
               </div>
           </div>
       </header>
           <div class="register">
               <div class="container">
                  <div class="row">
                      <div class="col-lg-7 col-md-6">
                           <div class="ditk-inf sup-oi">
                                  KSCSTE-CWRDM invites application for the post of Junior Scientist
                               
                               
                                <ul>
                                 <li><a style="color:blue" target="_blank" href="<?php echo e(asset('downloads/CWRDM_Notif2021.pdf')); ?>"><i class="fas fa-check"></i> Notification</a></li>
                                  <li><a style="color:blue" target="_blank" href="<?php echo e(asset('downloads/Guidelines_CWRDM21.pdf')); ?>"><i class="fas fa-check"></i> Guidelines for Online Application</a></li>
                                   <li style="color:red"><i class="fas fa-check"></i> Closing Date : <s>13-02-2021, 5 PM</s> Extended to 28-02-2021, 5 PM</li>
                                   <li><a style="color:blue" ><i class="fas fa-check"></i> If any queries regarding technical issues while filling online application, Email us to help_recruit@cwrdm.org</a></li>
                                    <li><a style="color:blue" ><i class="fas fa-check"></i> Use latest version of Mozilla Firefox for better performance</a></li>
                                </ul>
                                
                            </div> 
                       </div>
                       <div class="col-lg-5 col-md-6 ">
                           <div class="register-box">
                            
        
                               <h2>New Registeration</h2>
                               <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                               <div class="row form-row">
                                   <div class="col-md-4">
                                       <label for="">Full Name</label>
                                       
                                   </div>
                                   <div class="col-md-8">
                                    
                                       <input id="name" type="text" placeholder="Enter Full Name" class="form-control form-control-sm <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" >
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                   </div>
                               </div>
                               <div class="row form-row">
                                   <div class="col-md-4">
                                       <label for="">Email Address</label>
                                       
                                   </div>
                                   <div class="col-md-8">
                                    <input id="email" type="email" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Enter Email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      
                                   </div>
                               </div>
                               <div class="row form-row">
                                   <div class="col-md-4">
                                       <label for="">Mobile Number</label>
                                       
                                   </div>
                                   <div class="col-md-8">

                                          <input id="mobile" type="text" class="form-control form-control-s <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mobile" required  placeholder="Enter Mobile" value="<?php echo e(old('mobile')); ?>" >
                                       
                                      <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                      </span>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                   </div>
                               </div>


                              <div class="input-group mb-3">

                                   <div class="captcha">    
                                    <span><?php echo captcha_img(); ?></span>

                                  <button type="button" class="btn btn-success btn-refresh"  ><i class="fas fa-sync-alt"></i></button>

                                   </div>
                              </div>
                            <div class="input-group mb-3">
                               <input id="captcha" type="text" class="form-control <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Captcha" name="captcha">
                                <div class="input-group-append">
                                   <div class="input-group-text">
      <!-- <span class="fas fa-key"></span> -->
                                 </div>
                                </div>

                            <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                              </span>
                                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                              </div>







                              
                               <div class="row form-row">
                                   <div class="col-md-4">
                                      
                                   </div>

                                   <div class="col-md-8">
                                    <?php
                            $enddate = date('2021-02-08 16:59:00');
                            $now = date('Y-m-d H:i:s'); 
                           ?>
                            <?php if($now<$enddate): ?>
                                       <button class="btn btn-info" type="submit">Sign Up</button>
                                       <?php else: ?>
                                       <p class="mb-0">
                        <a  class="text-center" style=" 
                                color:red;" onMouseOver="this.style.color='red'" > Registration Closed</a>
        <!--  <a href="#" class="text-center"  data-toggle="modal" data-target="#regModal">Register a new membership</a> -->
                            </p>
                         <?php endif; ?>
                                   </div>
                               </div>
                               </form>
                                <a href="<?php echo e(route('login')); ?>" style=" text-decoration: underline;
                                color:#325aa8;" onMouseOver="this.style.color='red'">I already have a membership</a>
                           </div>
                           
                       </div>
                  </div>
               </div>
           </div>
            <div class="foter-credit">
             Copyright ©2021 All rights reserved|Powered By Information Systems Division
                
            </div>
            
    </div>
   
</body>

<script src=" <?php echo e(asset('loginasset/js/jquery-3.2.1.min.js')); ?> "></script>
<script src=" <?php echo e(asset('loginasset/js/popper.min.js')); ?> "></script>
<script src=" <?php echo e(asset('loginasset/js/bootstrap.min.js')); ?> "></script>
<script src=" <?php echo e(asset('loginasset/js/script.js')); ?> "></script>
<script type="text/javascript">
$(function () {

   $(".btn-refresh").click(function(){

     $.ajax({

       type:'get',

       url:APP_URL+'/refresh_captcha',
       data: {
        "_token": "<?php echo e(csrf_token()); ?>",

      },
      success:function(data){

        $(".captcha span").html(data.captcha);

      }

    });

   });
   });


  
</script>
</html>
<?php /**PATH F:\xampp\htdocs\cwrdm\resources\views/auth/register.blade.php ENDPATH**/ ?>