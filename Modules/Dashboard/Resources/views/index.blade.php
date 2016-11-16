@extends('base::layouts.master')


@section('content')
    <!-- <h1>{{ Auth::user()->meta() }}</h1> -->
    @extends('base::layouts.navigation')
    @extends('base::layouts.sub-navigation')
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

          <!--right-->
        	<div class="col-sm-6 col-md-3">
               
              
              <div class="panel panel-default">
                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
         			<div class="panel-body">
                    <img src="assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                    <div class="clearfix"></div>
                    <hr>
                    
                    <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
                    
                    <hr>
                    <form>
                    <div class="input-group">
                      <div class="input-group-btn">
                      <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                      </div>
                      <input class="form-control" placeholder="Add a comment.." type="text">
                    </div>
                	  </form>
                    
                  </div>
               </div>
          </div>
          <!--/right-->

      </div><!--/row-->
      
      
        
        <div class="clearfix"></div>
          
        <hr>
        <div class="col-md-12 text-center"><p><a href="http://usebootstrap.com/theme/google-plus" target="_ext">Download Google Plus Style Template</a><br><a href="http://usebootstrap.com/theme/google-plus" target="_ext">More Bootstrap Templates by @Bootply</a></p></div>
        <hr>
        
    </div><!--/main-->
@stop
