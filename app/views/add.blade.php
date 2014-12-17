@extends('_master')
@section('content')

	<h1>Add</h1>
	<h2>Add The Blog</h2>

	{{---- add -----}}
	{{ Form::open(array('url' => '/adding')) }}
			{{ Form::label('title','Blog Title') }}	
			{{ Form::text('title'); }}
			{{ Form::label('blogger_id', 'Blogger Name') }}
			{{ Form::select('blogger_id', $bloggers); }}	

			{{ Form::label('text','Post Content') }}	
			{{ Form::text('text'); }}

			{{ Form::label('published','Year of Post') }}	
			{{ Form::text('published'); }}
		{{ Form::submit('Save'); }}

	{{ Form::close() }}
@stop