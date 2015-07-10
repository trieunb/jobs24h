@extends('layouts.jobseeker')
@section('title') Ứng tuyển công việc @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container sm">
		<div class="boxed">
			<div class="rows">
			<div class="title-page">
				<h2>Công việc ứng tuyển</h2>
			</div>
			<div class="box">
				<div class="tag">Nộp đơn</div>
				{{ Form::open( array('route'=>array('jobseekers.applying-job', 'not-login', $job->id), 'class'=>'form form-horizontal', 'method'=>'POST', 'files'=>true) ) }}
					@if ($loi = Session::get('loi'))
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{ $loi }}
						</div>
					@endif

					@if ($success = Session::get('success'))
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{ $success }}
						</div>
					@endif
					<div class="form-group">
						<label class="control-label col-sm-2">Họ và tên</label>
						<div class="col-sm-2">
							{{Form::select('prefix_title',array('Ông'=>'Ông', 'Bà' => 'Bà'),null, array('class'=>'form-control', 'id'=>'Gender'))}}
						</div>
						<div class="col-sm-3">
							{{Form::input('text','first_name', null, array('class'=>'form-control', 'placeholder'=>'Họ'))}}
							<span class="error-message">{{$errors->first('first_name')}}</span>
						</div>
						<div class="col-sm-3">
							{{Form::input('text','last_name', null, array('class'=>'form-control', 'placeholder'=>'Tên'))}}
							<span class="error-message">{{$errors->first('last_name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Tiêu đề</label>
						<div class="col-sm-5">
							{{Form::input('text','headline', null, array('class'=>'form-control'))}}
							<span class="error-message">{{$errors->first('headline')}}</span>
							<small class="legend">Giám đốc cấp cao tại một tập đoàn đa quốc gia</small>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email</label>
						<div class="col-sm-5">
							{{Form::input('text','email', null, array('class'=>'form-control'))}}
							<span class="error-message">{{$errors->first('email')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Điện thoại</label>
						<div class="col-sm-5">
							{{Form::input('text','contact_phone', null, array('class'=>'form-control'))}}
							<span class="error-message">{{$errors->first('contact_phone')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Nơi sống</label>
						<div class="col-sm-3">
							{{Form::input('text','address', null, array('class'=>'form-control'))}}
							<span class="error-message">{{$errors->first('address')}}</span>
						</div>
						<div class="col-sm-2">
							{{Form::select('province_id',Province::lists('province_name', 'id'),null, array('class'=>'form-control', 'id'=>'Cities'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Thư xin việc</label>
						<div class="col-sm-5">
							{{Form::textarea('cover_letter', null, array('class'=>'form-control headline', 'rows'=> '5'))}}
							<span class="error-message">{{$errors->first('cover_letter')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Chọn CV</label>
						<div class="col-sm-10">
							<div class="fileUpload btn bg-orange col-sm-2">
								Chọn tệp tin
								{{ Form::file('cv_upload',array('class'=>'upload', 'id' =>'uploadBtn')) }}
							</div>
							<div class="col-sm-7">
								{{Form::input('text', 'file_name', null, array('class'=>'form-control', 'id'=>'uploadFile', 'disable', 'placeholder'=>'không có tệp nào được chọn'))}}
							</div>
							<div class="clearfix"></div>
							<span class="small">Định dạng: MS Word, PDF (Tối đa 2MB)</span>
							<span class="error-message">{{$errors->first('file_name')}}</span>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10">
						{{Form::button('Hủy bỏ', array('class'=>'btn btn-lg bg-dark'))}}
						{{Form::submit('Nộp đơn', array('class'=>'btn btn-lg bg-dark'))}}
					</div>
					{{Form::input('hidden','is_file', 'is_file',array('class'=>'is_file'))}}
					{{Form::input('hidden','login', false)}}
				{{Form::close()}}
			</div>
			</div>
		</div>
	</section>
@stop
