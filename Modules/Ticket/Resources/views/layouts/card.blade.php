<!--panel body-->
<div class="panel-body" style="padding-top:0">

  <!--main-->
	<div class="">
		<div class="row">
			<!--row_count_container-->
			<div class="col-sm-10">


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="well well-sm">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-12">

                                <div class="media">
                                    <a href="#" class="pull-left">
                                        
                                        <img src="{{ $ticket->user->setMeta()->avatar }}" alt="" class="img-thumbnail" style="width: 60px;">
                                    </a>
                                    <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">{{ Carbon\Carbon::parse($ticket->created_at)->toDayDateTimeString() }}</small>
                                        </span>
                                        <h4 class="text-success">
                                            {{ $ticket->subject }} <br />
                                            <small class="text-warning">Priority: {{ $ticket->priority->name }}</small>
                                            
                                        </h4>
                                        <p>
                                            {{ $ticket->message }}
                                        </p>
                                        <p>
                                            <span class="btn btn-sm btn-success pull-right">
                                                {{$ticket->status->name}}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="reply-container col-sm-12 col-md-12">
                        <ul class="media-list">
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <span class="text-muted pull-right">
                                        <small class="text-muted">30 min ago</small>
                                    </span>
                                    <strong class="text-success">@ Rexona Kumi</strong>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor sit amet, <a href="#"># consectetur adipiscing </a>.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <span class="text-muted pull-right">
                                        <small class="text-muted">30 min ago</small>
                                    </span>
                                    <strong class="text-success">@ John Doe</strong>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor <a href="#"># ipsum dolor </a>adipiscing elit.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="reply-form-container col-sm-12 col-md-12">
                        <form role="form" action="http://laravel.dev/tut-chatty/public/status/5/reply" method="POST">
                            <input type="hidden" name="_token" value="Hj01IYzyBVvSPDIwyMQcWHZytcy5TT4RAM5wjGsR">

                            <div class="row status-form">
                                <textarea placeholder="Reply to this status" name="reply-5" rows="2" class="col-md-12"></textarea>
                            </div>
                            <div class="row">
                                <input type="submit" value="Reply" class="reply-btn btn btn-default btn-sm">
                            </div>
                        </form>
                    </div>
                </div>

			</div>

		</div>
	</div>
	<!--//main-->

</div>

<!--/panel body-->