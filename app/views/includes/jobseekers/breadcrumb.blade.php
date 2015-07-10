<div class="breadcrumb col-sm-12">
	<ul>
		<li><i class="glyphicon glyphicon-home"></i><a href="{{URL::route('jobseekers.home')}}">Trang chủ</a></li>
		<li><i class="glyphicon glyphicon-chevron-right"></i><a href="#">@yield('title', isset($title) ?: Lang::get('jobseekers.home.title') ) </a></li>
	</ul>
</div>