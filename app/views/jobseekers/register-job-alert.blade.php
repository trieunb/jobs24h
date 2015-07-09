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
				{{Form::open(array('class'=>'form form-horizontal', 'id'=>'RegisterJobAlertForm'))}}
					<div class="alert alert-success hidden-xs"></div>
					<div class="form-group">
						<div class="col-sm-9">
							{{Form::input('hidden','error',null, array('class'=>'form-control error'))}}
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">Chức danh/vị trí công việc</label>
						<div class="col-sm-5">
							{{Form::input('text','keyword',null, array('class'=>'form-control keyword'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Ngành nghề</label>
						<div class="col-sm-5">
							{{Form::select('categories[]', Category::getList(),null, array('class'=>'form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nơi làm việc</label>
						<div class="col-sm-5">
							{{Form::select('province[]', Province::lists('province_name', 'id'),null, array('class'=>'form-control chosen-select province', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Cấp bậc</label>
						<div class="col-sm-5">
							{{Form::select('level', array('0'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),null, array('class'=>'form-control chosen-select level', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Lịch nhận Email</label>
						<div class="col-sm-2">
							{{Form::select('time',array('0'=>'Mỗi Ngày', '1'=>'Mỗi Tuần'), null, array('class'=>'time form-control'))}}
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-5">
							@if($user == null)
								{{Form::input('text','email',null, array('class'=>'form-control email','placeholder'=>'Nhập Email của bạn'))}}
							@else
								{{Form::input('text','email',$user->email, array('class'=>'form-control email','disabled'=>'disabled'))}}
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8"><button type="submit" class="btn btn-lg bg-orange">Nhận Email</button></div>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script type="text/javascript">
		$('#RegisterJobAlertForm').submit(function(e){
			e.preventDefault();
			var url = '{{URL::route("jobseekers.post-notification-jobs")}}';
			$.ajax({
				url: url,
				type: 'POST',
				dataType : 'json',
				data: {
					keyword: $('.keyword').val(),
					categories: $('.categories').val(),
					level: $('.level').val(),
					province: $('.province').val(),
					salary: '',
					time: $('.time').val(),
					email: $('.email').val(),
				},
				success : function(json){
					if(! json.has)
		            {	
		            	$('#RegisterJobAlertForm').find(".has-error").removeClass('has-error');
			            $('#RegisterJobAlertForm').find(".error-message").remove();
		            	var j = $.parseJSON(json.message);
		            	$.each(j, function(index, val) {
			            	$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
			            	if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
			           			$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
			            	}        		
		           		});
		            }else{
		           		$('#RegisterJobAlertForm').find(".has-error").removeClass('has-error');
		           		$('#RegisterJobAlertForm').find(".error-message").remove();
		           		$('.alert').removeClass('hidden-xs').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+json.message);
		           	}
				}
			})
		});
	</script>
@stop

