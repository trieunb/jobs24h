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
				<h2>Bạn đang nộp đơn cho {{$job->vitri}}</h2>
			</div>
			<p>Nhà tuyển dụng này muốn nhận được hồ sơ của bạn bằng ngôn ngữ tiếng Anh</p>
			<div class="box">
				<div class="tag">Nộp đơn</div>
				{{ Form::open( array('route'=>array('jobseekers.applying-job', 'login', $job->id), 'class'=>'form form-horizontal', 'method'=>'POST', 'files'=>true) ) }}
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
						<div class="col-sm-3">
							<div class="avatar">
								@if($user->avatar != null)
									{{HTML::image('uploads/jobseekers/avatar/'.$user->avatar.'')}}
								@else
									{{HTML::image('assets/images/logo.png')}}
								@endif
							</div>
						</div>
						<div class="col-sm-5">
							<div class="profile">
							<h2>{{$user->first_name}} {{$user->last_name}}</h2>
							<p>{{$user->nghenghiep}}</p>
							<p>@if(isset($user->province->province_name)){{$user->province->province_name}}@endif @if(isset($user->country->country_name)){{$user->country->country_name}}@endif</p>
							<p>Điện thoại: <span class="text-blue">{{$user->phone_number}}</span></p>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Chọn CV<abbr title="Trường này là bắt buộc">*</abbr></label>
						<div class="col-sm-5">
							<?php 
						
								if($resumes != null){
									$list_cv = array();
									foreach ($resumes as $key=> $value) {
										$key = $value->id;
										$val = date('d-m-Y H:i',strtotime($value->updated_at))."_".$user->first_name."_".$user->last_name;
										$list_cv[$key] = $val;
									}	
								}
								else{
									$list_cv = null;
								}
							?>
							{{Form::select('cv_id',$list_cv, null, array('class'=>'form-control cv_id', 'id'=>'choose_cv'))}}
							<span class="error-message">{{$errors->first('cv_id')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Cover letter<abbr title="Trường này là bắt buộc">*</abbr></label>
						<div class="col-sm-5">
							{{Form::textarea('headline', null, array('class'=>'form-control headline', 'rows'=> '5'))}}
							<span class="error-message">{{$errors->first('headline')}}</span>
							<div class="checkbox col-sm-9 text-gray-light">
								<label>
									{{Form::checkbox('save_cover', null)}}
									Save this cover letter for my later application
								</label>
							</div>
							<a href="#" class="text-blue small pull-right">Xem ví dụ</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Chọn CV</label>
						<div class="col-sm-9">
								<div class="checkbox">
									<label class="col-sm-12">
										@if($resumes != null)
											{{Form::checkbox('is_file', 1, null, array('class'=>'is_file'))}}	
										@else
											{{Form::checkbox('is_file', 'is_file', 'checked',array('class'=>'is_file'))}}
										@endif
										<div class="fileUpload btn bg-orange col-sm-2">
											Chọn tệp tin
											{{ Form::file('cv_upload',array('class'=>'upload', 'id' =>'uploadBtn')) }}
										</div>
										<div class="col-sm-4">
											<input class="form-control" id="uploadFile" disable="disable" placeholder="không có tệp nào được chọn" name="file_name" type="text">
										</div>
									</label>
								</div>
								<div class="clearfix"></div>
								<span class="small">Formats: MS Word, PDF, Image (2MB maximum)</span>
								<span class="error-message">{{$errors->first('file_name')}}</span>
						</div>
					</div>
					<div class="col-sm-offset-3 col-sm-8">
						{{Form::button('Hủy bỏ', array('class'=>'btn btn-lg bg-dark'))}}
						{{Form::submit('Nộp đơn', array('class'=>'btn btn-lg bg-dark'))}}
						<p><h3><abbr>*</abbr> Required field</h3></p>
					</div>
					<?php 
						if($user->gender == 0){
							$prefix_title = 'Ông';
						}else{
							$prefix_title = 'Bà';
						}
					?>
					{{Form::input('hidden','prefix_title', $prefix_title)}}
					{{Form::input('hidden','first_name', $user->first_name)}}
					{{Form::input('hidden','last_name', $user->last_name)}}
					{{Form::input('hidden','province_id', $user->province_id)}}
					{{Form::input('hidden','email', $user->email)}}
					{{Form::input('hidden','address', $user->address)}}
					{{Form::input('hidden','contact_phone', $user->phone_number)}}
					{{Form::input('hidden','login', true)}}
				{{Form::close()}}
			</div>
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script type="text/javascript">
	$(function(){
		$('.error-message').each(function(index, el) {
			if($(this).html() != ''){
				$(this).parent().closest('div[class^="col-sm"]').addClass('has-error');
			}
		});
	});
	</script>
@stop