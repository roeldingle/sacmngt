@extends('base::layouts.master')

<!-- <h1>{{ Auth::user()->meta() }}</h1> -->
@extends('base::layouts.navigation')
@extends('base::layouts.sub-navigation')
<!--main-->
<div class="container-fluid" id="main">

	@yield('content')
    
  <div class="clearfix"></div>
      
    <hr>
    <div class="col-md-12 text-center"><p><a href="http://usebootstrap.com/theme/google-plus" target="_ext">Download Google Plus Style Template</a><br><a href="http://usebootstrap.com/theme/google-plus" target="_ext">More Bootstrap Templates by @Bootply</a></p></div>
    <hr>
    
</div><!--/main-->






