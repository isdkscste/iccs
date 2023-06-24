<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Recruitment Portal|Login</title>

    <link rel="shortcut icon" href="{{ asset('images/fav.jpg') }}">
    <link rel="stylesheet" href=" {{ asset('loginasset/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href=" {{ asset('loginasset/css/fontawsom-all.min.css')}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset('loginasset/css/style.css')}} " />
    <link rel="stylesheet" type="text/css" href=" {{asset('loginasset/css/style1.css')}} " />
    <script type="text/javascript">
    var APP_URL = '{{ URL::to('/') }}';
  </script>
  

</head>

<body>
    <div class="container-fluid ">
       <header>
           <div class="container">
               <div class="row">

                   <div class="col-md-12">
                       <img src="{{ asset('images/ICCSn.png') }}" style="width: 120px;height:120px; " ><strong class="strong1" > KSCSTE-INSTITUTE FOR CLIMATE CHANGE STUDIES (ICCS)</strong>
                       <img src="{{ asset('images/k3.jpg') }}" style=" " alt="">
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
                           KSCSTE-ICCS  invites application for the post of  Scientists, Applicants are requested to read the Notification, Terms and Conditions, Guideline documents from the links below.
                               
                                <ul>
                                 <li><a style="color:blue" target="_blank" href="{{ asset('downloads/ICCS_Notification_8nov22.pdf') }}"><i class="fas fa-check"></i> Notification</a>
                                 <img src="{{ asset('downloads/pdf.gif') }}"  style="color:blue;height:2
                                40px;width:40px"></li>
                                 <li><a style="color:blue" target="_blank" href="{{ asset('downloads/ICCS_TC_8nov22.pdf') }}"><i class="fas fa-check"></i> Terms and Condition</a>
                                 <img src="{{ asset('downloads/pdf.gif') }}"  style="color:blue;height:2
                                40px;width:40px"></li> 
                                  <li><a style="color:blue" target="_blank" href="{{ asset('downloads/ICCS_Guidelines_8nov22.pdf') }}"><i class="fas fa-check"></i> Guidelines for Online Application</a>
                                  <img src="{{ asset('downloads/pdf.gif') }}"  style="color:blue;height:2
                                40px;width:40px"></li>
                                   <li style="color:red"><i class="fas fa-check"></i> Closing Date : 08-12-2022, 5 PM</li>
                                   <li><a style="color:blue" ><i class="fas fa-check"></i> If any queries regarding technical issues while filling online application, Email us to iccskerala@gmail.com OR isdkscste@gmail.com</a></li>
                                   <li><a style="color:blue" ><i class="fas fa-check"></i> Use latest version of Mozilla Firefox for better performance</a></li>
                                </ul>
                                
                            </div> 
                       </div>
                       <div class="col-lg-5 col-md-6 ">
                           <div class="register-box">
                           
                          
                          
                             @if(Session::has('message'))
        <div class="alert alert-success">
        {{ Session::get('message') }}
        @php
        Session::forget('message');
        @endphp
        </div>
        @endif
                               <h2>Login</h2>
                               <form method="POST" action="{{ route('login') }}">
                                @csrf
                              
                               <div class="row form-row">
                                   <div class="col-md-4">
                                       <label for="">Email </label>
                                       
                                   </div>
                                   <div class="col-md-8">
                                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                      
                                   </div>
                               </div>
                               
                               <div class="row form-row">
                                   <div class="col-md-4">
                                       <label for="">Password</label>
                                       
                                   </div>
                                   <div class="col-md-8">

                                        <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                      
                                   </div>
                               </div>

                              <div class="input-group mb-3">

                                   <div class="captcha">    
                                    <span>{!! captcha_img() !!}</span>

                                 <button type="button" class="btn btn-success btn-refresh" style=" background-color: #4f6dcd;
  border-color: #4f6dcd;" ><i class="fas fa-sync-alt"></i></button>

                                   </div>
                              </div>
                            <div class="input-group mb-3">
                               <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha" >
                                <div class="input-group-append">
                                   <div class="input-group-text">
      <!-- <span class="fas fa-key"></span> -->
                                 </div>
                                </div>

                            @error('captcha')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                              </span>
                                     @enderror


                              </div>







                              
                               <div class="row form-row">
                                   <div class="col-md-4">
                                      
                                   </div>
                                   <div class="col-md-8">
                                       <button class="btn btn-info" type="submit">Login</button>
                                   </div>
                               </div>
                               </form>
                               <p class="mb-1">
                           <a href="{{ route('forgot-password') }}" style=" text-decoration: underline;
                                color:#325aa8;" onMouseOver="this.style.color='red'">I forgot my password</a>
                            </p>
                            @php
                            $enddate = date('2022-12-08 16:59:00');
                            $now = date('Y-m-d H:i:s'); 
                           @endphp
                            @if($now<$enddate)     
                        <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center" style=" text-decoration: underline;
                                color:#325aa8;" onMouseOver="this.style.color='red'" >New Registration</a>
        <!--  <a href="#" class="text-center"  data-toggle="modal" data-target="#regModal">Register a new membership</a> -->
                            </p>
                         @else
                         <p class="mb-0">
                        <a  class="text-center" style=" 
                                color:red;" onMouseOver="this.style.color='red'" > Registration Closed</a>
        <!--  <a href="#" class="text-center"  data-toggle="modal" data-target="#regModal">Register a new membership</a> -->
                            </p>
                         @endif
                          
                         

                           </div>
                           
                       </div>
                  </div>
               </div>
             <br>
     
            <div class="foter-credit">
             Copyright © 2022 All rights reserved | Powered By Information Systems Division,KSCSTE
                
            </div>
            
    </div>
   
</body>

<script src=" {{asset('loginasset/js/jquery-3.2.1.min.js')}} "></script>
<script src=" {{asset('loginasset/js/popper.min.js')}} "></script>
<script src=" {{asset('loginasset/js/bootstrap.min.js')}} "></script>
<script src=" {{asset('loginasset/js/script.js')}} "></script>
<script type="text/javascript">


  $(".btn-refresh").click(function(){

   $.ajax({

     type:'get',

     url:APP_URL+'/refresh_captcha',
     data: {
      "_token": "{{ csrf_token() }}",

    },
    success:function(data){
      

      $(".captcha span").html(data.captcha);

    }

  });

 });


</script>



</body>
</html>