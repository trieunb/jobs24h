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
						<div class="col-xs-12">
							@foreach($category as $cat)
							<div class="col-xs-4">
								<a href="{{ URL::route('employers.search.category', $cat->id) }}">{{ $cat->cat_name }}</a> <span class="cl-orange">({{ $cat->mtcategory->count() }})</span>
							</div>

						@endforeach
						</div>
					</div>
					
				</div>
			</section>
		</div>
	</section>

	
</div>
@stop
