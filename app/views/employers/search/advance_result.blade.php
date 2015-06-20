@extends('layouts.employer')
@section('title')Kết quả tìm kiếm @stop
@section('content')
	<section class="boxed-content-wrapper clearfix search-page">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.search_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Kết quả tìm kiếm</h2>
					</div>
					<a href="{{ URL::route(Route::currentRouteName()) }}" class="btn btn-lg bg-blue" style="margin-bottom: 5px;"><i class="fa fa-arrow-left"></i> Quay lại tìm kiếm</a>
					<?php $levs = Level::lists('name', 'id'); ?>					
					@include('employers.search.all_result')
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
