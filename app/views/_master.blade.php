<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','DonotRepeat')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='/css/donotrepeat.css' type='text/css'>

	@yield('head')


</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<a href='/'><img class='logo' src='/images/donotrepeat.jpg' alt='donotrepeat logo'></a>

	<nav>
		<ul>
		@if(Auth::check())
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
			<li><a href='/allBlogs'>All Blogs</a></li>
			<li><a href='/blog/search'>Search Blog (w/ Ajax)</a></li>
			<li><a href='/category'>All category</a></li>
			<li><a href='/adding'>+ Add Blog</a></li>
			<li><a href='/debug/routes'>Routes</a></li>
		@else
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>

	<a href='https://github.com/tamjidsm/p4'>View on Github</a>

	@yield('content')

	@yield('/body')

</body>
</html>