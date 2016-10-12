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
					<div >
				<div style="margin: 0 0 0 10px"><h2>{{$b->title}}</h2>
				{!!Form::model($b,array('route'=>array('block.update',$b->id),'method'=>'PUT'))!!}
					<a style ="float:left" class="btn btn-xs btn-info" href="{{url('block/'.$b->id.'/edit')}}">&#10000;Edit</a>
				{!!Form::close()!!}

				{!!Form::open(array('route'=>array('block.destroy',$b->id)))!!}
					{!!Form::hidden('_method','DELETE')!!}
					&nbsp;&nbsp;&nbsp;
					{{ Form::submit('&#10006;Delete', ['class' => 'btn btn-xs btn-danger']) }}
				{!!Form::close()!!}
				
				</div style ="clear:left">	
					@if($b->imagePath !="")
						<a style="float:left; padding:10px" href="{{url($b->imagePath)}}" target="_blank" class="wrap-image">
						<img src="{{asset($b->imagePath)}}" height="150px" alt="Kartinka:)">
						</a>
					@endif					
					<pre class="pre_text">{{$b->content}}</pre>			
					<hr style="clear:left">
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection