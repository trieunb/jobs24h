@extends('layouts.jobseeker')
@section('title') Quản lý hồ sơ đã tải - VnJobs @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hồ Sơ Tải Từ Máy Tính</h2>
				</div>
				<div class="upload-profile-from-com">
					@include('includes.notifications')
					<?php 
						if($my_resume != null){
							$lastest_up = $my_resume->updated_at;
							$current_date = date('Y-m-d', time());
							$days = ceil((strtotime($current_date) - strtotime($lastest_up)) / (60 * 60 * 24));
						}
					?>
					@if(count($my_resume) == 0)
					<div class="bg-blue row">
						<span class="col-sm-1">{{HTML::image('assets/images/alert.png')}}</span>
						<div class="col-sm-11">
						{{ Form::open( array('route'=>array('jobseekers.post-my-resume-by-upload'), 'class'=>'form-horizontal','id'=>'UploadNewCV', 'method'=>'POST', 'files'=>'true') ) }}
							<h1>Bạn chưa có hồ sơ nào tải lên từ máy tính.</h1>
								Vui lòng tải lên một hồ sơ
								<div class="fileUpload btn btn-info btn-lg">
									Tải lên
									{{ Form::file('cv_upload',array('class'=>'upload', 'id' =>'btn_UploadNewCV')) }}
								</div>
								<div class="col-sm-7">
									{{Form::input('hidden', 'file_name', null, array('class'=>'form-control file_name_new_upload', 'id'=>'uploadFile', 'disable', 'placeholder'=>'không có tệp nào được chọn'))}}
								</div>
						{{Form::close()}}
						</div>
					</div>
					@elseif($days >= 160)
					<div class="bg-blue row">
						<span class="col-sm-1">{{HTML::image('assets/images/alert.png')}}</span>
						<div class="col-sm-11">
							<h1>Hồ sơ tải lên từ máy tính của bạn chưa được cập nhật trong tháng 4.</h1>
							Vui lòng tải lại hồ sơ đã được cập nhật bằng cách chọn <button type="button" class="btn btn-info btn-lg">THAY THẾ</button>
						</div>
					</div>
					@else
					<?php
						$name = explode('.', $my_resume->file_name);
						$name = $user->first_name.$user->last_name.'_'.date('m-d-Y',strtotime($my_resume->updated_at)).'.'.$name[1];
					?>
					<label class="col-sm-2 control-label">Tên tập tin</label>
					<div class="col-sm-10 decoration"><span id="file_name">{{$name}}</span>  [<a href='{{ URL::route("jobseekers.action-cv", array("download",$my_resume->id)) }}'>Xem</a> | <a id="upload_link">Thay thế</a> | <a id="del_cv">Xóa</a>]</div>

					<div class="clearfix"></div>
					<label class="col-sm-2 control-label">Đã tải</label>
					<div class="col-sm-10">{{date('d-m-Y H:i:s',strtotime($my_resume->updated_at))}}</div>
					<div class="clearfix"></div>
					<p>Lưu ý: Với các công việc bạn đã ứng tuyển, nhà tuyển dụng có thể xem được phiên bản hồ sơ đã tải mới nhất của bạn <a href="#" class="decoration text-blue">Tìm hiểu thêm</a></p>
					{{ Form::open( array('route'=>array('jobseekers.update-upload-cv', $my_resume->id), 'class'=>'form-horizontal','id'=>'UpdateNewCV', 'method'=>'POST', 'files'=>'true') ) }}
						{{ Form::file('cv_update',array('class'=>'upload hidden', 'id' =>'uploadCV')) }}
					{{Form::close()}}
					<div class="modal fade" id="delete_modal">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-body">
									<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($my_resume)>0){{$user->created_at}} {{$user->first_name}} {{$user->last_name}}@endif"?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
									<button type="button" class="del-modal btn bg-orange">Xóa</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					@endif
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop
@section('scripts')
	@if($my_resume !=null)
	<script type="text/javascript">
		$("#uploadCV").change(function() {
	        var defaull_cv = $('#file_name').html();
	        $('#file_name').html($(this).val());
	        if($(this).val() == ''){
	             $('#file_name').html(defaull_cv);
	        }else{
	        	
		        $('.loading-icon').html('<span class="h2">Đang tải ...</span>').show();
				setTimeout(function(){
				  $('#UpdateNewCV').submit();
				}, 2000);
	        }    
	    });
	    $("#upload_link").on('click', function(e){
	        e.preventDefault();
	        $("#uploadCV").trigger('click');
	    });
	    $(document).on('click','#del_cv',function(){
	        url = '{{ URL::route("jobseekers.action-cv", array("delete",$my_resume->id)) }}';
	        $('#delete_modal').modal('show');
	        $('.del-modal').click(function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "GET",
	                url: url, 
	                success : function(data){
	                   location.reload();
	                   console.log(data);
	                   $('#delete_modal').modal('hide');
	                }
	            });    
	        });
	    });
	</script>
	@endif
	<script type="text/javascript">
	$('#btn_UploadNewCV').change(function(event) {
		$('.file_name_new_upload').val($(this).val());
		$('.loading-icon').html('<span class="h2">Đang tải ...</span>').show();
		setTimeout(function(){
		  $('#UploadNewCV').submit();
		}, 2000);
		
	});
	</script>
@stop
