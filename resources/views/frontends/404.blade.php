@extends('layouts.layout')

@section('content')

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Page not found</h1>
		<em></em>
		<h2><a href="{{url('index')}}">Home</a><label>/</label>404</h2>
	</div>
</div>
<!--login-->
	<div class="container">
		<div class="four">
		<h3>404</h3>
		<p>Sorry! Evidently the document you were looking for has either been moved or no longer exist.</p>
		<a href="{{url('index')}}" class="hvr-skew-backward">Back To Home</a>
		</div>
	</div>
<!--//login-->
@endsection