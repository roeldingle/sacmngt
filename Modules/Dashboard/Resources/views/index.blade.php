@extends('base::layouts.master')


@section('content')

    @include('base::layouts.navigation')
    <div class="clearfix"></div>
    @include('base::layouts.subnavigation')
    <!--main-->
    <div class="container-fluid" id="main">

       <div class="row">

          @include('base::layouts.left-profile')

          <!--center-->
        	<div class="col-sm-6 col-md-6">

              @include('base::layouts.alert')
            	 
               <div class="well"> 
                   <form class="form-horizontal" role="form">
                    <h4>What's New</h4>
                     <div class="form-group" style="padding:14px;">
                      <textarea class="form-control" placeholder="Update your status"></textarea>
                    </div>
                    
                     <button class="btn btn-success pull-right" type="button">Post</button>
                     	<ul class="list-inline">
                     		<li><a href="#"><i class="fa fa-align-left" aria-hidden="true"></i></a></li>
                     		<li><a href="#"><i class="fa fa-align-center" aria-hidden="true"></i></a></li>
                     		<li><a href="#"><i class="fa fa-align-right" aria-hidden="true"></i></a></li>
                     	</ul>
                  </form>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
                  <div class="panel-body">
                      <p><img src="assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
                      <div class="clearfix"></div>
                      <hr>
                              sdsdsdsdsdsd
                  </div>
                </div>
          </div>
          <!--/center-->

          @include('base::layouts.right')

      </div><!--/row-->
      
      @include('base::layouts.footer')
      
    </div><!--/main-->
@stop


