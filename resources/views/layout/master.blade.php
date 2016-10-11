<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
	@section('menu')
	<div class='container'>
	<div class="row">
		<ul class='nav nav-pills' style="padding:10px">
			<li ><a href="{{url('topic')}}">Home</a></li>			
			<li {{$page == 'Add Topic' ? 'class=active':''}}><a href="{{url('topic/create')}}">Add topic</a></li>
			<li {{$page == 'Add Block'? 'class=active':''}}><a href="{{url('block/create')}}">Add block</a></li>

		</ul>
		<hr style="margin:-5px;">
		<br>
	</div>	
		<div class="row">
			<div class="container col-md-12 col-lg-12 col-sm-12">
			@yield('content') 
			</div>
		</div>	
	</div>

</body>
</html>
