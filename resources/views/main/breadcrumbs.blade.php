<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">

    @foreach($breadcrumbs as $crumb)
		<a href="{{ $crumb['url'] }}" title="Go to {{ $crumb['title'] }}" class="tip-bottom"><i class="icon-home"></i> {{ $crumb['title'] }}</a>
    @endforeach
     </div>
    <h1>{{$title}}</h1>
  </div>
<!--End-breadcrumbs-->