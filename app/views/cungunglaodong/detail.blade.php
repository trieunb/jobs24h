@extends('layouts.cungunglaodong')
@section('title') 
 
{{$services['name']}} - Cung ứng lao động - VnJobs @stop
 
@section('content')


<div class="container">
<div class="banner">	
		<div class="header-page">

			<h2>{{$services['name']}}</h2>
		</div>

	 
		{{HTML::image('uploads/cungunglaodong/'.$services['banner'].'')}}
		 
		 
		
		



</div>
<section id="content" class="training-service">

	 
	<!--dịch vụ đào tạo nhân sự-->
	 @foreach($data as $key=>$value)
	@if($key==0)
	<article>
		<h3 class="header-post"><span class="bg-pink">1</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	 
	@elseif($key==1)
	<article>
		<h3 class="header-post"><span class="bg-purple">2</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	@elseif($key==2)
	<article>
		<h3 class="header-post"><span class="bg-orange">3</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	@elseif($key==3)
	<article>
		<h3 class="header-post"><span class="bg-little-blue">4</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	@elseif($key==4)
	<article>
		<h3 class="header-post"><span class="bg-yellow">5</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	@else
	<article>
		<h3 class="header-post"><span class="bg-little-green">6</span>{{$value['title']}}</h3>
		<p>{{$value['content']}}</p>
	</article>
	@endif
	 @endforeach
</section>
<aside id ="sidebar">
	@include('includes.cungunglaodong.menu-right')
	 @include('includes.cungunglaodong.widget-support')
	 
</aside>
</div>
@stop