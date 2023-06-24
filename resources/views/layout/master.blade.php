<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $page_title ?? "Recruitment Portal" }}</title>
    <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
    <meta name="description"
    content="Online Portal" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        var APP_URL = '{{ URL::to('/') }}';
    </script>
    @include('layout.style')
    @stack('commonstyle')
</head>

<body class="sidebar-mini hold-transition">
    <div class="wrapper" style="">
        @include('layout.header')
        @include('layout.sidebar')

        <div class="content-wrapper" style="background-color: #f4f6f9;">
             @if(Session::has('message'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('message') }}
        @php
        Session::forget('message');
        @endphp
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('error') }}
        @php
        Session::forget('error');
        @endphp
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
        </div>
        @endif
            <!-- <section class="content-header">
            </section>
            <section class="content"> -->
                @yield('content')
                <!-- </section> -->
            </div>

            @include('layout.footer')
        </div>

        <!-- change password -->
        <div class="modal fade" id="changeModal">
            <div class="modal-dialog">
              <div class="modal-content">
 
                <form method="POST" action="{{ route('update-password') }}">
                    @csrf
                    <div class="modal-header">
                      <h4 class="modal-title">Change Password</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <p><div class="form-group row">
                    <label for="old_password" class="col-md-6 col-form-label">{{ __('Current password') }}</label>
                    <div class="col-md-6">
                        <input id="old_password" name="old_password" type="password" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new_password" class="col-md-6 col-form-label">{{ __('New password') }}</label>
                    <div class="col-md-6">
                        <input id="new_password" name="new_password" type="password" class="form-control" required autofocus>
                         
                    </div>
                </div>
               </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
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
@include('layout.script')
@stack('commonjs')
@stack('pagescripts')

</body>

</html>