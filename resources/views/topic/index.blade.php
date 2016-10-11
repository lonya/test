@extends('layout.master')

@section('menu')
	@parent
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-3 dleft">
			{!!Form::open(['action'=>'TopicController@search'])!!}
			<div class="input-group">
			{!! Form::text('search','',['class'=>'form-control']) !!}
		<span class="input-group-btn"><button class="btn btn-success" type="submit">Search</button></span>
			</div>
			{!!Form::close()!!}
	
		<br>
			<ul class="list-group">
				@foreach($topics as $t)
				<li class="list-group-item" style="list-style-type: none;">
				 
			<a style="color:white;" href="{{url('topic/'.$t->id)}}">	 
			<button type="button" style="text-align:center" class="btn btn-primary form-control">
			{{$t->topicname}}
			</button>
			</a>

				</li>
				@endforeach
			</ul>
				</div>
		<div class="col-lg-9 dright">
			@if($id!=0)
				@foreach($blocks as $b)
					<div>
					<h2>{{$b->title}}</h2>	
					@if($b->imagePath !="")
						<a style="float:left; padding:10px" href="{{url($b->imagePath)}}" target="_blank" class="wrap-image">
						<img src="{{asset($b->imagePath)}}" height="150px" alt="Kartinka:)">
						</a>
					@endif					
					<p class="pre_text">{{$b->content}}</p>			
					<hr style="clear:left">
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection