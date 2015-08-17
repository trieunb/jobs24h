@extends('layouts.employer')
@section('title')Tìm kiếm nhanh @stop
@section('content')
	<section class="boxed-content-wrapper clearfix search-page">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.search_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Tìm nhanh</h2>
					</div>
					@if(!isset($input)) <?php $input = ['category'=>'all', 'level'=>'all', 'location'=>'all', 'keyword'=>'']  ?> @endif
					<form action="{{ URL::route('employers.search.basic') }}" method="GET" class="form" role="form" id="search-fo">
						<div class="form-group">
							<label for="inputS" class="col-sm-12 control-label">Từ khóa:</label>
							<div class="col-sm-7">
								{{ Form::text('keyword', $input['keyword'], ['id'=>'keyword']) }}
							</div>
							<div class="col-sm-5">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="full_keyword" value="1">
										Tìm chính xác từ khóa
									</label>
								</div>
							</div>
						</div>
							
							<div class="col-sm-4 form-group">
								<label for="input" class="control-label">Ngành nghề:</label>
								<div class="">
									<?php $cats = Category::where('parent_id', '<>', 0)->lists('cat_name', 'id'); ?>
									{{ Form::select('category', ['all'=>'Bất kỳ'] + $cats, $input['category'],['id'=>'category'] ) }}
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<label for="input" class="control-label">Cấp bậc:</label>
								<div class="">
									<?php $levs = Level::lists('name', 'id'); ?>
									{{ Form::select('level', ['all'=>'Bất kỳ'] + $levs, $input['level'],['id'=>'level'] ) }}
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<label for="input" class="control-label">Địa điểm:</label>
								<div class="">
									<?php $locas = Province::lists('province_name', 'id'); ?>
									{{ Form::select('location', ['all'=>'Bất kỳ'] + $locas, $input['location'],['id'=>'location'] ) }}
								</div>
							</div>
							<div class="col-sm-2 form-group">
								<label for="input" class="control-label">&nbsp;</label>
								<div class="">
									<button type="submit" name="submit" class="btn btn btn-lg bg-orange btn-search">Tìm Kiếm</button>
								</div>	
							</div>
					</form>
					<div class="col-sm-7 col-sm-offset-5 advance-search">
							<!-- <a href="#">Tạo thông báo hồ sơ</a> -->
							<a href="{{ URL::route('employers.search.advance') }}">Mở rộng tiêu chí tìm kiếm</a>
						</div>
					@include('employers.search.all_result')
					
				</div>
					
				<div class="box" id="order-detail" style="display: none;">
					
				</div>
			</section>
		</div>
	</section>

	<div class="modal fade" id="modal-history">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="float-left">
				@include('includes.employers.search_navbar1')
			</div>
			<section id="modal-content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<div class="thoat"><a href="#" data-dismiss="modal">Thoát <i class="fa fa-close"></i></a></div>
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-history.png') }} Lịch sử tìm kiếm</h2>
						
					</div>
					<p>
						Mục "Lịch sử tìm kiếm" sẽ tự động lưu trữ 100 kết quả tìm kiếm mới nhất của bạn trong 7 ngày. Để xem lại các kết quả trước đây, nhấn vào tên kết quả tìm kiếm trong lịch sử tìm kiếm của bạn
					</p>
					<div id="table-search-info">
						
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@stop
