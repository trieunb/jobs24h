@extends('layouts.jobseeker')
@section('title') Quản lý hồ sơ đã tải @stop
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
			
					{{Form::open(array('route'=>array('jobseekers.post-my-resume-by-upload') ,'class'=>'form-horizontal', 'id'=>'CreatedNewCVFromPC','method'=>'POST', 'files'=>'true'))}}
						<div class="form-group">
							<label class="control-label col-sm-3">Tiêu đề hồ sơ<abbr>*</abbr></label>
							<div class="col-sm-6">
								{{Form::input('text', 'tieude', null, array('class'=>'tieude form-control'))}}
							</div>
						</div>
						<h3>Hồ sơ đính kèm</h3>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="fileUpload btn bg-orange col-sm-offset-3 col-sm-3 ">
									<i class="fa fa-folder-open"></i>&nbsp;&nbsp;&nbsp;
									Chọn tệp tin từ máy tính
									{{ Form::file('upload',array('class'=>'upload', 'id' =>'uploadBtn')) }}
								</div>
								<p id='progress'></p>
								<div class="col-sm-3">{{Form::input('text', 'file_name', null, array('class'=>'file_name form-control', 'id'=>'uploadFile', 'disabled', 'placeholder'=>'không có tệp nào được chọn'))}}</div>
							</div>
							<small class="legend col-sm-offset-3">Chỉ hỗ trợ định dạng <strong>*.doc, *.docx, *.pdf</strong> và dung lượng <strong><512 Kb</strong></small>
						</div>
						<h3>Thông tin cá nhân</h3>
						<div class="form-group">
							<label class="control-label col-sm-3">Họ và Tên<abbr>*</abbr></label>
							<div class="col-sm-2">
								{{Form::input('text', 'first_name', $user->first_name, array('class'=>'first_name form-control'))}}
							</div>
							<div class="col-sm-2">
								{{Form::input('text', 'last_name', $user->last_name, array('class'=>'last_name form-control'))}}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Email<abbr>*</abbr></label>
							<div class="col-sm-2">
								{{Form::input('text', 'email', $user->email, array('class'=>'email form-control','disabled'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Giới tính<abbr>*</abbr></label>
							<div class="col-sm-3">
								<div class="radio">
									<label>
										{{Form::radio('gender',0, $user->gender, array('checked'=>'checked', 'class'=>'gender'))}}
											Nam
									</label>
									<label>
										{{Form::radio('gender',1, $user->gender, array('class'=>'gender'))}}
										Nữ
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
							<div class="col-sm-3">
								<div class="input-group date" id="DOB">
					                {{Form::input('text','date_of_birth', date('m-d-Y',strtotime($user->date_of_birth)), array('class'=>'date_of_birth form-control','placeholder'=>'DD-MM-YYYY','data-date-format'=>'DD-MM-YYYY'))}}
					                <span class="input-group-addon have-img">
					               	{{HTML::image('assets/images/calendar.png')}}
					                </span>
					            </div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Điện thoại<abbr>*</abbr></label>
							<div class="col-sm-2">
								{{Form::input('text', 'phone_number', $user->phone_number, array('class'=>'phone_number form-control'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quốc tịch</label>
							<div class="col-sm-2">
								{{ Form::select('nationality_id', Country::lists('country_name', 'id'),$user->nationality_id, array('class'=>'nationality_id form-control', 'id' => 'Nationality') ) }}
							</div>	
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân</label>
							<div class="col-sm-2">
								{{ Form::select('marital_status', array('0'=>'Độc thân', '1'=>'Đã kết hôn'),$user->marital_status, array('class'=>'marital_status form-control', 'id' => 'Nationality') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Địa chỉ</label>
							<div class="col-sm-5">
								{{Form::input('text', 'address', $user->address, array('class'=>'address form-control'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quốc gia</label>
							<div class="col-sm-2">
								{{ Form::select('country_id', Country::lists('country_name', 'id'),$user->country_id, array('class'=>'country_id form-control', 'id' => 'Country') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tỉnh/Thành phố</label>
							<div class="col-sm-2">
									{{ Form::select('province_id', Province::lists('province_name', 'id'),$user->province_id, array('class'=>'province_id form-control', 'id' => 'Cities') ) }}
							</div>
						</div>
					<h3>Thông tin chung</h3>
						<div class="form-group">
			                <label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_highest_degree',array(''=>'- Vui lòng chọn -')+Education::lists('name', 'id'),null, array('class'=>'info_highest_degree form-control', 'id' => 'HighestDegree') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_wish_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_wish_level form-control', 'id' => 'WishLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-3">
				                <div for="specific-salary">
				                    	{{Form::radio('specific_salary_radio', null, null, array('id'=>'specific-salary'))}}
				                        {{Form::input('text','specific_salary', null, array('class'=>'specific_salary form-control edit-control text-blue','id'=>'specific-salary-input', 'placeholder'=>'Ví dụ: 8.000.000', 'disabled'))}}
				                    	<span>VND / tháng</span>
				                    </div>
								</div>
				                <div class="radio col-sm-2">
				                    {{Form::radio('specific_salary_radio',0, null, array('id'=>'specific-salary-0'))}}
				                    <span>Thương lượng </span>
				                </div>
						</div>
						<div class="form-group">
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		{{Form::select('info_category', Category::getList(),null, array('class'=>'info_category form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'VD: Kế toán','multiple'))}}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            <div class="col-sm-3">
			            		{{Form::select('info_wish_place_work', Province::lists('province_name', 'id'), null, array('class'=>'info_wish_place_work form-control chosen-select', 'id' => 'WishPlaceWork', 'multiple'=>'true','data-placeholder'=>'VD: Hồ Chí Minh') )}}
				            	<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại</label>
			            	<div class="col-sm-3">
			            		{{ Form::select('info_current_level', array(""=>"- Vui lòng chọn -")+Level::lists('name', 'id'),null, array('class'=>'info_current_level form-control', 'id' => 'CurrentLevel') ) }}
			            	</div>
			            </div>
			            <div class="form-group">
			            	<div class="col-sm-offset-3 col-sm-7">
								{{Form::submit('Lưu Và Hoàn Tất Hồ Sơ', array('class'=>'btn btn-lg bg-orange'))}}
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
			            </div>
					{{Form::close()}}
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
	/*
	$('#CreatedNewCVFromPC').submit(function(e) {
		e.preventDefault();
        $('.loading-icon').show();
        url = '{{ URL::route("jobseekers.post-my-resume-by-upload") }}';
        var salary = $('.specific_salary').val();
        salary = salary.replace(/[,]/g, "");
        var fd = new FormData($(this)[0]);
        alert($('#CreatedNewCVFromPC .upload').val());
        $.ajax({
        	url: url,
        	type: 'POST',
        	dataType: 'json',
        	data: {
        		tieude: $('#CreatedNewCVFromPC .tieude').val(),
        		upload: $('#CreatedNewCVFromPC .upload').val(),
        		email : $('#CreatedNewCVFromPC .email').val(),
        		first_name: $('#CreatedNewCVFromPC .first_name').val(),
        		last_name: $('#CreatedNewCVFromPC .last_name').val(),
        		date_of_birth: $('#CreatedNewCVFromPC .date_of_birth').val(),
		        gender:$('#CreatedNewCVFromPC .gender:checked').val(),
		        marital_status: $('#CreatedNewCVFromPC .marital_status').val(),
		        phone_number: $('#CreatedNewCVFromPC .phone_number').val(),
		        nationality_id: $('#CreatedNewCVFromPC .nationality_id').val(),
		        address: $('#CreatedNewCVFromPC .address').val(),
		        country_id: $('#CreatedNewCVFromPC .country_id').val(),
		        province_id: $('#CreatedNewCVFromPC .province_id').val(),
		        info_highest_degree : $('#CreatedNewCVFromPC .info_highest_degree').val(),
		        info_wish_level: $('#CreatedNewCVFromPC .info_wish_level').val(),
		        salary: salary,
		        file_name: $('#CreatedNewCVFromPC #uploadFile').val(),
		        info_category: $('#CreatedNewCVFromPC .info_category').val(),
				info_wish_place_work:$('#CreatedNewCVFromPC .info_wish_place_work').val(),
				info_current_level: $('#CreatedNewCVFromPC .info_current_level').val()
        	},
        	success : function(json){
        		$('#CreatedNewCVFromPC').find(".alert-message").remove();
        		if(! json.has)
	            {	
	            	var j = $.parseJSON(json.message);
	            	$.each(j, function(index, val) {
	            		$('#CreatedNewCVFromPC .'+index).closest('div[class^="col-sm"]').find(".alert-message").remove();
		            	if($('#CreatedNewCVFromPC .'+index).closest('div[class^="col-sm"]').find(".alert-message").length < 1){
		           			$('#CreatedNewCVFromPC .'+index).closest('div[class^="col-sm"]').append('<abbr class="alert-message" title="'+val+'"><i class="fa fa-exclamation"></i></abbr>')
		            	}
		           		$('.loading-icon').hide();           		
	           		});
	            }else{
	            	$('#CreatedNewCVFromPC').find(".alert-message").remove();
	            	alert('OK');
	            	$('.loading-icon').hide();
	            }
	            $('.loading-icon').hide();
        	}
        })
	});*/
	</script>
@stop
