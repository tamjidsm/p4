@extends('_master')

@section('title')
Home page - DonotRepeat
@stop

@section('head')

@stop

@section('content')

	<h1>DonotRepeat</h1>
	<h2>Home page of the blog</h2>
	<ul style="list-style-type:square">
       <li>Log into the system first</li>
  		<li>Blogger are already added into the system, blogger can be added by admin at this point</li>
     	<li>Click all blog to see all of the data -READING DATA</li
     	<li>Click Add blog to create data -Creating DATA</li>
     	   <ul>
      <li>Blog description, posted year, content, and blogger information add</li>
          </ul>
      <li>From the all blog page, go to edit page and perform editing - UPDATING Blog</li>
      <li>From the edit page and perform Delete - DELETING Blog</li>
     <li>Log out at the end</li>


</ul>


@stop