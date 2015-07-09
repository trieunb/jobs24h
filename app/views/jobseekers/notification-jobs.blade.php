@extends('layouts.jobseeker')
@section('title') Thông báo việc làm - VnJobs @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Thông báo việc làm</h2>
				</div>
				<p>Đăng ký Thông Báo Việc Làm để nhận việc làm qua email phù hợp với tiêu chí tìm kiếm của bạn.</p>
				<p class="clearfix">
					<button type="button" class="btn bg-orange btn-lg create-job-alert">Tạo mới</button>
				</p>
					<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th class="col-sm-5">Từ khóa</th>
										<th class="col-sm-2">Ngày cập nhật</th>
										<th class="col-sm-2">Số lần nhận</th>
										<th class="col-sm-3">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									@if(count($jobs_alert) > 0)
									
									@foreach($jobs_alert as $ja)
									<?php 
										$location_arr = array();
										$categories = array();
										if(json_decode($ja->provinces) != null){
										    foreach (json_decode($ja->provinces) as $value) {
										        $location_arr[] = $value;
										    }
										}else{
										    $location_arr = null;
										}
										if(json_decode($ja->categories) != null){
										    foreach (json_decode($ja->categories) as $value) {
										       	$categories[] = $value;
										    }
										}else{
										    $categories = null;
										}
									?>
									<tr>
										<td><strong class="text-blue"><em>
											@if($ja->keyword == null)
												N/A
											@else
												{{$ja->keyword}}
											@endif
										</em></strong></td>
										<td>{{$ja->updated_at}}</td>
										<td>
											@if($ja->times == 0)
												Mỗi ngày
											@else
												Mỗi tuần
											@endif
										</td>
										<td>
											<a href="{{URL::route('jobseekers.search-job', array('keyword'=>$ja->keyword,'province'=>$location_arr,'categories'=>$categories,'salary'=>$ja->salary,'level'=>$ja->level))}}"><i class="glyphicon glyphicon-eye-open"></i> Xem</a> 
											<a id="update_job_alert" data-id="{{$ja->id}}"><i class="glyphicon glyphicon-refresh"></i> Cập nhật</a> 
											<a id="del_job_alert" data-id="{{$ja->id}}"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
										</td>
										<div id="UpdateJobAlert" class="form-horizontal">
										<div class="modal fade" id="modal-update-{{$ja->id}}">
											<div class="modal-dialog">
											<div class="modal-content">
											
											
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h2 class="modal-title text-orange">THÔNG BÁO VIỆC LÀM</h2>
											</div>
											<div class="modal-body row">
												<div class="form-group">
													<div class="col-sm-9">
														{{Form::input('hidden','error',null, array('class'=>'form-control error'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Gửi các việc làm</label>
													<div class="col-sm-9">
														{{Form::input('text','keyword',$ja->keyword, array('class'=>'form-control up_keyword'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Trong ngành nghề</label>
													<div class="col-sm-9">
														{{Form::select('categories[]', Category::lists('cat_name', 'id'),$categories, array('class'=>'form-control chosen-select up_categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Vị trí</label>
													<div class="col-sm-9">
														{{Form::select('level', array('0'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),$ja->level, array('class'=>'form-control chosen-select up_level', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Địa điểm</label>
													<div class="col-sm-9">
														{{Form::select('province[]', Province::lists('province_name', 'id'),$location_arr, array('class'=>'form-control chosen-select up_province', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Với mức lương</label>
													<div class="col-sm-9">
														{{Form::input('text','salary',$ja->salary, array('class'=>'form-control up_min_salary','placeholder'=>'Mức lương tối thiểu hàng tháng (USD)'))}}
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">Đến địa chỉ email "{{$user->email}}" mỗi</label>
													<div class="col-sm-2">
														{{Form::select('time',array('0'=>'Ngày', '1'=>'Tuần'), $ja->times, array('class'=>'up_time form-control'))}}
													</div>
												</div>
												<label class="text-red error"></label>
											</div>
											<div class="modal-footer">
												{{Form::button('Trở về', array('class'=>'btn btn-lg bg-gray-light', 'data-dismiss'=>'modal'))}}
												{{Form::submit('Cập nhật', array('class'=>'btn btn-lg bg-orange', 'data-id'=>$ja->id))}}
											</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<div class="modal fade" id="delete_modal-{{$ja->id}}">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<p>Bạn có thực sự muốn xóa thông báo việc làm "{{$ja->keyword}}"?</p>
												</div>
												<div class="modal-footer">
													{{Form::button('Hủy', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))}}
													{{Form::button('Xóa', array('class'=>'del-modal btn bg-orange'))}}
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<div>
									</tr>
									@endforeach
									@else
										<tr><td colspan="4">Bạn chưa có bất kỳ thông báo việc làm nào</td></tr>
									@endif
								</tbody>
							</table>
				<p class="clearfix">
					<a href="#" class="text-blue decoration"><i class="fa fa-chevron-circle-left"></i><em>Trở lại trang Quản Lý Nghề nghiệp</em></a>	
			<div class="boxed">
				<div class="rows">
					@include('includes.jobseekers.widget.suggested-jobs')
				</div>
			</div>
				<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content">
					{{Form::open(array('class'=>'form-horizontal', 'id'=>'JobAlertForm'))}}
					<?php 
						
						if($job != null){
							$location_arr = array();
							$categories = array();
				        	if(count($job->province) > 0){
				        		foreach ($job->province as $value) {
				        			$location_arr[] = $value->province_id;
				        		}
				        	}else{
				            	$location_arr[] = null;
				            }
				            if(count($job->category) > 0){
				        		foreach ($job->category as $value) {
				        			$categories[] = $value->cat_id;
				        		}
				        	}else{
				            	$categories[] = null;
				            }
				            $vitri = $job->vitri;
				        }else{
				        	$vitri = null;
				        	$location_arr = null;
							$categories = null;
				        }
				    ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 class="modal-title text-orange">THÔNG BÁO VIỆC LÀM</h2>
					</div>
					<div class="modal-body row">
						<div class="form-group">
													<div class="col-sm-9">
														{{Form::input('hidden','error',null, array('class'=>'form-control error'))}}
													</div>
												</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Gửi các việc làm</label>
							<div class="col-sm-9">
								{{Form::input('text','keyword',$vitri, array('class'=>'form-control keyword'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Trong ngành nghề</label>
							<div class="col-sm-9">
								{{Form::select('categories[]', Category::lists('cat_name', 'id'),$categories, array('class'=>'form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Vị trí</label>
							<div class="col-sm-9">
								{{Form::select('level', array('all'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),null, array('class'=>'form-control chosen-select level', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Địa điểm</label>
							<div class="col-sm-9">
								{{Form::select('province[]', Province::lists('province_name', 'id'),$location_arr, array('class'=>'form-control chosen-select province', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Với mức lương</label>
							<div class="col-sm-9">
								{{Form::input('text','salary',null, array('class'=>'form-control min_salary','placeholder'=>'Mức lương tối thiểu hàng tháng (USD)'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Đến địa chỉ email "{{$user->email}}" mỗi</label>
							<div class="col-sm-2">
								{{Form::select('time',array('0'=>'Ngày', '1'=>'Tuần'), null, array('class'=>'time form-control'))}}
							</div>
						</div>
						<label class="text-red error"></label>
					</div>
					<div class="modal-footer">
						{{Form::button('Trở về', array('class'=>'btn btn-lg bg-gray-light', 'data-dismiss'=>'modal'))}}
						{{Form::submit('Tạo mới', array('class'=>'btn btn-lg bg-orange'))}}
					</div>
					{{Form::close()}}
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</section>
@stop
@section('scripts')
	<script type="text/javascript">
		$(function(){
			var option = '{{$modal}}';
			$('#modal-id').modal(option);
		});
		$('#JobAlertForm').submit(function(e){
			e.preventDefault();
			var url = '{{URL::route("jobseekers.post-notification-jobs")}}';
			var result= '{{URL::route("jobseekers.notification-jobs")}}';
			var email = "{{$user->email}}";
			$.ajax({
				url: url,
				type: 'POST',
				dataType : 'json',
				data: {
					keyword: $('.keyword').val(),
					categories: $('.categories').val(),
					level: $('.level').val(),
					province: $('.province').val(),
					salary: $('.min_salary').val(),
					time: $('.time').val(),
					email: email,
				},
				success : function(json){
					if(! json.has)
		            {	
		            	console.log(json.message);
		            	$('#JobAlertForm').find(".has-error").removeClass('has-error');
			            $('#JobAlertForm').find(".error-message").remove();
		            	var j = $.parseJSON(json.message);
		            	$.each(j, function(index, val) {
			            	$('.'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
			            	if($('.'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
			           			$('.'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
			            	}
		           		});
		            }else{
		           		$('#JobAlertForm').find(".has-error").removeClass('has-error');
		           		$('#JobAlertForm').find(".error-message").remove();
						$('#modal-id').modal('hide');
		           	}
				}
			})
		});
		$('.create-job-alert').click(function(event) {
			event.preventDefault();
			$('.keyword').val('');
			$('.categories').val('');
			$('.select2-selection__rendered').html('');
			$('.level').val('');
			$('.province').val('');
			$('.min_salary').val('');
			$('#modal-id').modal('show');
		});

		$(document).on('click', '#update_job_alert', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');
			$('#modal-update-'+id).modal('show');
		});

		$(document).on('click', '#UpdateJobAlert input[type="submit"]', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');
			var url = '{{URL::route("jobseekers.post-update-notification-jobs")}}';
			var result= '{{URL::route("jobseekers.notification-jobs")}}';
			$.ajax({
				url: url,
				type: 'POST',
				dataType : 'json',
				data: {
					id: id,
					keyword: $('#modal-update-'+id+' .up_keyword').val(),
					categories: $('#modal-update-'+id+' .up_categories').val(),
					level: $('#modal-update-'+id+' .up_level').val(),
					province: $('#modal-update-'+id+' .up_province').val(),
					salary: $('#modal-update-'+id+' .up_min_salary').val(),
					time: $('#modal-update-'+id+' .up_time').val(),
				},
				success : function(json){
					if(! json.has)
		            {	
		            	$('#UpdateJobAlert').find(".has-error").removeClass('has-error');
			            $('#UpdateJobAlert').find(".error-message").remove();
		            	var j = $.parseJSON(json.message);
		            	$.each(j, function(index, val) {
			            	$('.up_'+index).parent().closest('div[class^="col-sm"]').addClass('has-error');
			            	if($('.up_'+index).parent().closest('div[class^="col-sm"]').find(".error-message").length < 1){
			           			$('.up_'+index).parent().closest('div[class^="col-sm"]').append('<span class="error-message">'+val+'</span>')
			            	}
			           		$('.loading-icon').hide();           		
		           		});
		            }else{
		           		$('#UpdateJobAlert').find(".has-error").removeClass('has-error');
		           		$('#UpdateJobAlert').find(".error-message").remove();
						$('#UpdateJobAlert .modal').modal('hide');
		           	}
				}
			})
		});

		$(document).on('click', '#del_job_alert', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');
			$('#delete_modal').modal('show');
			var url = '{{URL::route("jobseekers.post-del-notification-jobs")}}';
			var result= '{{URL::route("jobseekers.notification-jobs")}}';
			$('#delete_modal-'+id).modal('show');
	        $('.del-modal').click(function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "POST",
	                url: url, //Relative or absolute path to response.php file
	                data: {id: id},
	                success : function(data){
	                   location.reload();
	                    $('#delete_modal-'+id).modal('hide');
	                }
	            });    
	        });
		});
	</script>
@stop

