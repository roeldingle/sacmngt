<!DOCTYPE html>
<html lang="en">
<head>
<title>SAC System</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/theme/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/theme/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/theme/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/theme/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/theme/matrix-media.css') }}" />
<link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/theme/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

  <!--hidden value-->
  <input type="hidden" nam="current_url" id="current_url" value="{{ Request::url() }}" />
  {{ csrf_field() }} <!--include for ajax requests-->

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">Matrix Admin</a></h1>
  </div>
  <!--close-Header-part--> 

  @yield('top-headermenu')

  @yield('sidemenu')

  @yield('breadcrumbs')

  @include('main.alert')

  <!--main body div-->
  <div class="container-fluid">
     @yield('content')
  </div>
  <!--end main body div-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2016 &copy; SAC Central System. Powered by <a href="http://themedesigner.in">CT Team ASSET</a> </div>
</div>

<!--end-Footer-part-->

<script src="{{ asset('js/theme/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.min.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/theme/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/theme/fullcalendar.min.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.interface.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.chat.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.wizard.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/theme/select2.min.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.popover.js') }}"></script> 
<script src="{{ asset('js/theme/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/theme/matrix.tables.js') }}"></script> 

<script src="{{ asset('js/common.js') }}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
