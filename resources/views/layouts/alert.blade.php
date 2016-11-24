 @if(Session::has('info'))
    <div class="alert {{ Session::get('alert') }} text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        {{ Session::get('info') }}
    </div>
@endif

 @if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissable">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

