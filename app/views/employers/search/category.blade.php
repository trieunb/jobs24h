@extends('layouts.employer')
@section('title')Tìm theo ngành nghề @stop
@section('content')
	<section class="boxed-content-wrapper clearfix search-page">
		<div class="container">
			<section id="" class="right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Tìm theo ngành nghề</h2>
					</div>
					<div class="row">
						<?php 
						
						$group1 = [0,1,2,3,4];
						$group2 = [5,6,7,12,13];
						$group3 = [8,9,10,11,14];
						
						?>
						<div class="col-xs-4">
							<?php $stt = 0; ?>
							@foreach(@$allCategory as $k=>$cat)
								<?php if(!in_array($stt, $group1)) { $stt += 1; continue; } ?>
									<span class="cat-parent">{{ $k }}</span><br>
									@if(count($cat))
										<ul class="sub-cat">
										@foreach($cat as $id=>$subcat)
											<li><a href="{{ URL::route('employers.search.category', $id) }}">{{ $subcat }}</a> <span class="cl-orange">({{ Category::subcatCount($id, $category) }})</span></li>
										@endforeach
										</ul>
									@endif
								<?php $stt += 1; ?>
							@endforeach
						</div>	
						<div class="col-xs-4">
							<?php $stt = 0; ?>
							@foreach(@$allCategory as $k=>$cat)
								<?php if(!in_array($stt, $group2)) { $stt += 1; continue; } ?>
									<span class="cat-parent">{{ $k }}</span><br>
									@if(count($cat))
										<ul class="sub-cat">
										@foreach($cat as $id=>$subcat)
											<li><a href="{{ URL::route('employers.search.category', $id) }}">{{ $subcat }}</a> <span class="cl-orange">({{ Category::subcatCount($id, $category) }})</span></li>
										@endforeach
										</ul>
									@endif
								<?php $stt += 1; ?>
							@endforeach
						</div>	
						<div class="col-xs-4">
							<?php $stt = 0; ?>
							@foreach(@$allCategory as $k=>$cat)
								<?php if(!in_array($stt, $group3)) { $stt += 1; continue; } ?>
									<span class="cat-parent">{{ $k }}</span><br>
									@if(count($cat))
										<ul class="sub-cat">
										@foreach($cat as $id=>$subcat)
											<li><a href="{{ URL::route('employers.search.category', $id) }}">{{ $subcat }}</a> <span class="cl-orange">({{ Category::subcatCount($id, $category) }})</span></li>
										@endforeach
										</ul>
									@endif
								<?php $stt += 1; ?>
							@endforeach
						</div>	
						
					</div>
					
				</div>
			</section>
		</div>
	</section>

	
</div>
@stop
@section('style')
	<style type="text/css">
	.col-4	{
		width: 33.333334%;
		float: left;
	}
	</style>
@stop
