@extends('_master')

@section('title')
	Edit blog
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $blog['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/updating')) }}

		{{ Form::hidden('id',$blog['id']); }}

		<div class='form-group'>
			{{ Form::label('title','Title') }}
			{{ Form::text('title',$blog['title']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('blogger_id', 'Blogger') }}
			{{ Form::select('blogger_id', $bloggers, $blog->blogger_id); }}
		</div>
			{{ Form::label('text','Post Content') }}	
			{{ Form::text('text',$blog['text']); }}
			
			{{ Form::label('published','Published Year (YYYY)') }}
			{{ Form::text('published',$blog['published']); }}
		</div>


		
		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/blog/delete')) }}
			{{ Form::hidden('id',$blog['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop