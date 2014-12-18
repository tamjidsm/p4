@extends('_master') 


@section('title') 
	All Blogs 
@stop 


@section('content') 


	<h1>Blogs</h1> 
 

 	@if($query) 
 		<h2>You searched for {{{ $query }}}</h2> 
 	@endif 
 


 	@if(sizeof($blogs) == 0) 
 		No results 
 	@else 
 

 		@foreach($blogs as $blog) 
 			<section class='blog'> 
 

{{ Form::label('title','Blog header') }}	

 				<h2>{{ $blog['title'] }}</h2> 
 

 				<p> 
 					<a href='/edit/{{$blog['id']}}'>Edit</a> 
 				</p>  
 							{{ Form::label('title','name of blogger') }}	

 				<p>
 					{{$bloggers[$blog['blogger_id'] ]}}

 				</p>
{{ Form::label('title','Blog content') }}	

				<p> 
 					{{ $blog['text'] }} 
 				</p> 
{{ Form::label('title','Blog Posted year') }}	

 				<p> 
 					{{ $blog['category'] }} ({{$blog['published']}}) 
 				</p> 
 

 			
 			</section> 
 		@endforeach 
 

 	@endif 
 

 

 @stop 
 

