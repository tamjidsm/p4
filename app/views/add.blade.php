@extends('_master')
@section('content')

	<h1>Edit</h1>
	<h2>eIDT THE BOOK</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/adding')) }}
			{{ Form::text('title') }}
			{{ Form::text('blogger') }}
			{{ Form::text('published') }}
		{{ Form::submit('Save'); }}

	{{ Form::close() }}
@stop