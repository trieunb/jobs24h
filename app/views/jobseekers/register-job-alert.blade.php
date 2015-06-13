@extends('layouts.jobseeker')
@section('title') Nhận việc làm mới - VnJobs @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Nhận Email Thông Báo Việc Làm Mới Nhất</h2>
				</div>
				<h4 class="text-gray-light italic">Mỗi ngày/tuần bạn sẽ nhận được email những việc làm mới nhất từ nhà tuyển dụng theo tiêu chí bên dưới.</h4>
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
					<label class="col-sm-3 control-label">Chức danh/vị trí công việc</label>
						<div class="col-sm-5">
							{{Form::input('text','keyword',null, array('class'=>'form-control up_keyword'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Ngành nghề</label>
						<div class="col-sm-9">
							{{Form::select('categories[]', Category::getList(),null, array('class'=>'form-control chosen-select up_categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nơi làm việc</label>
						<div class="col-sm-9">
							{{Form::select('province[]', Province::lists('province_name', 'id'),null, array('class'=>'form-control chosen-select up_province', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Cấp bậc</label>
						<div class="col-sm-9">
							{{Form::select('level', array('0'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),null, array('class'=>'form-control chosen-select up_level', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Lịch nhận Email</label>
						<div class="col-sm-2">
							{{Form::select('time',array('0'=>'Ngày', '1'=>'Tuần'), null, array('class'=>'up_time form-control'))}}
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">Chức danh/vị trí công việc</label>
						<div class="col-sm-5">
							{{Form::input('text','keyword',null, array('class'=>'form-control up_keyword'))}}
						</div>
					</div>
					<label class="text-red error"></label>
				</form>
			</div>
		</div>
	</section>
@stop
@section('scripts')
	
@stop