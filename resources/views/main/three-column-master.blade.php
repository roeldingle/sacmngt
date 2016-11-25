<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>SAC System</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/google-plus.css') }}">
  </head>
  <body>

    <!--hidden value-->
    <input type="hidden" nam="current_url" id="current_url" value="{{ Request::url() }}" />

    <div class="container-full">

        <div class="container-fluid" id="main">
            <div class="col-sm-3 col-md-3"> 
                @yield('content-left')
            </div>
            <div class="col-sm-6 col-md-6"> 
                @yield('content-center')
            </div> 
            <div class="col-sm-3 col-md-3"> 
                @yield('content-right')
            </div>
        </div>
        
    </div> 
    <!-- /container -->

    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/common.js') }}"></script>

    
  </body>
</html>