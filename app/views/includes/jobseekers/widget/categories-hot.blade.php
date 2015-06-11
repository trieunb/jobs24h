<div class="widget row">
	<h3>Ngành nghề hấp dẫn</h3>
	<ul class="arrow-plus">
		@foreach($widget_categories_hot as $key => $cate)
		@if($key < 6)
		<li><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></li>
		@endif
		@endforeach
	</ul>
	<a href="{{URL::route('jobseekers.get-category')}}" class="text-blue decoration"><i class="fa fa-arrow-circle-o-right"></i> Tất cả ngành nghề việc làm</a>
</div>