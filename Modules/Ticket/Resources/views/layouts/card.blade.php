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

                                        <h4 class="text-primary">
                                            {{ $ticket->subject }}  <br />
                                            <small class="text-info" style="font-size:12px">Ticket Code: {{ $ticket->code }}</small> <br />
                                            <small class="text-danger" style="font-size:12px">Priority: {{ $ticket->priority->name }}</small>
                                        </h4>
                                        <div class="ticket-content" style="padding:10px">
                                            <p>{!! $ticket->message !!}</p>

                                        </div>
                                        
                                    </div>

                                    <div class="media-footer">
                                        <div class="attachment-container">
                                            <p>({{ count($ticket->attachments)}}) Attachments</p>
                                            @foreach($ticket->attachments as $attachment)
                                                <div class="attachment-item pull-left">
                                                    <a href="{{ asset($attachment->path) }}" target="_blank" class="attachment-link" alt="{{ $attachment->name }}" title="{{ $attachment->name }}" >{!! $attachment->displayAttachmentPreview() !!}</a>
                                                </div>
                                            @endforeach
                                        </div>

                                        <span class="btn btn-sm btn-success pull-right">
                                            {{$ticket->status->name}}
                                        </span>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="reply-container col-sm-12 col-md-12">
                        <ul class="media-list">


                            @foreach($ticket->replies as $reply)
                                <li class="media" style="border-top:1px solid #cacaca;padding:10px">
                                    <a href="#" class="pull-left">
                                        <img src="{{$reply->user->setMeta()->avatar}}" alt="" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">{{ Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</small>
                                        </span>
                                        <strong class="text-success">{{$reply->user->setMeta()->fname}} {{$reply->user->setMeta()->lname}}</strong>
                                        <p>
                                            {!! $reply->message !!}
                                        </p>
                                    </div>
                                </li>

                            @endforeach
                            
                            
                        </ul>
                    </div>

                    <div class="reply-form-container col-sm-12 col-md-12">
                        <form role="form" action="{{ route('reply.store') }}" method="POST">
                            
                            <!--put this code for token-->
                            {{ csrf_field() }}
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="row status-form">
                                <textarea placeholder="Reply to this status" name="reply_message" rows="4" class="col-md-12"></textarea>
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

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
      selector: 'textarea',
      height: 200,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: '//www.tinymce.com/css/codepen.min.css'
    });


</script>