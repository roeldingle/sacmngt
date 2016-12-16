 <!--left-->
<div class="panel panel-default">
   <div class="panel-heading">
   		
      <div class="media-heading" >
      	<img class="img-thumbnail pull-left" style="width:60px;margin-right:5px" src="{{ Auth::user()->setMeta()->avatar }}">
      	<div class="info-container" style="padding:10px">
            <small style="font-size:10px">{{ Auth::user()->role->name }}</small><br />
      		<strong>
         		{{ Auth::user()->setMeta()->fname }} {{ Auth::user()->setMeta()->lname }}
         	</strong>
         	<br />
         	<span style="font-size:10px">{{ Auth::user()->setMeta()->email }}</span>
      	</div>
      	
      </div>
      
	</div>
</div> 
 <!--/left-->