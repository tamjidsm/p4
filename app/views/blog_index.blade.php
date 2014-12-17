@extends('_master') 


@section('title') 
	Blogs 
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
 

 				<h2>{{ $blog['title'] }}</h2> 
 

 				<p> 
 					<a href='/book/edit/{{$blog['id']}}'>Edit</a> 
 				</p> 
 				<p> 
 					<a href='/book/edit/{{$blog['id']}}'>Delete</a> 
 				</p> 
 
 

 				<p> 
 					{{ $blog['category'] }} ({{$blog['published']}}) 
 				</p> 
 

 			
 			</section> 
 		@endforeach 
 

 	@endif 
 

 

 @stop 
 

