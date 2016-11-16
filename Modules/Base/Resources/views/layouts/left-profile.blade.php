 <!--left-->
 <div class="col-sm-6 col-md-3">

      <div class="panel panel-default">
         <div class="panel-heading">
         		
            <div class="media-heading" >
            	<img class="img-thumbnail pull-left" style="width:60px;margin-right:5px" src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-1/p240x240/11825953_1047734388583992_1727016485304329009_n.jpg?oh=ed7ab6e96b1c6207630c1ea5103c5756&oe=58C0C07E">
            	<div class="info-container" style="padding:15px">
            		<strong>
	            		{{ Auth::user()->getUserMeta()->fname }} {{ Auth::user()->getUserMeta()->lname }}
	            	</strong>
	            	<br />
	            	<small>{{ Auth::user()->getUserMeta()->email }}</small>
            	</div>
            	
            </div>
            
      	</div>
   			<div class="panel-body">
              
              <!-- <div class="well well-sm"> -->
                
               <!-- </div> -->
         </div>
      </div> 
 </div>
 <!--/left-->