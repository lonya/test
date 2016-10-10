@extends('layout.master')

@section('menu')
	@parent
@endsection

@section('content')
	<div class="row">
		<div class="label label-info">{{$page}}</div>
		@if(count(session('errors'))>0)
			<div class="alert alert-danger">
				<div class="label label-warning">Ошибка</div>
				@foreach(session('errors')->all() as $er)
					{{$er}}<br>
				@endforeach
			</div>
		@endif
		@if(session('message'))
			<div class="alert alert-success">
				{{session('message')}}
			</div>
		@endif
	</div>

	<div class="row">
	{!! Form::model($block,['action'=>'BlockController@store', 'files'=>true, 'class'=>'form']) !!}
	<div class="form-group">
		{!! Form::label('topicid','Select Topic') !!}
		{!! Form::select('topicid',$topics,['class'=>'form-control']) !!}
		<a href="{{url('topic/create')}}" class="btn btn-info">Add new Topic</a>
	</div>
	<div class="form-group">
		{!! Form::label('title','Block Title') !!}
		{!! Form::text('title','',['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('content','Add Content') !!}
		{!! Form::textarea('content','',['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('imagepath','Add Image') !!}
		{!! Form::file('imagepath','',['class'=>'form-control']) !!}
	</div>
	<button class="btn btn-success" type='submit'>Add Block</button>
	{!! Form::close() !!}
	</div>
@endsection