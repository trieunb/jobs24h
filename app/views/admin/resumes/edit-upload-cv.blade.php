@extends('layouts.admin')
@section('title')Edit Resume @stop
@section('page-header')Chỉnh sửa hồ sơ @stop
@section('content')
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.resumes.edit.uploadcv', $resume->id), 'class'=>'form form-horizontal', 'files'=>'true' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('is_publish', 1, $resume->is_public, array('class'=>'ace')) }}
							<span class="lbl">Cho phép nhà tuyển dụng tìm kiếm hồ sơ này</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Ẩn nhà tuyển dụng:</label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('is_visible', 1, $resume->is_visible, array('class'=>'ace')) }}
							<span class="lbl">Ẩn thông tin với danh sách nhà tuyển dụng bị chặn</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
				<div class="col-sm-3">
					{{ Form::select('trangthai', array(1=>'KÍCH HOẠT', 2=>'CHƯA KÍCH HOẠT'), $resume->trangthai, array('class'=>'form-control') ) }}
				</div>
			</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tiêu đề hồ sơ <abbr>*</abbr></label>
			<div class="col-sm-6">
				{{ Form::text('tieude', $resume->tieude_cv, array('class'=>'form-control', 'placeholder'=>'Ví dụ: CV Lập trình viên') ) }}
				<span class="error-message">{{$errors->first('tieude')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Tên tập tin:</label>
			<div class="col-sm-6 control-label decoration" style="text-align:left">
				<span id="file_name">{{$resume->file_name}}</span>  [ <a href='{{ URL::route("admin.resumes.uploadcv", array("download",$resume->id)) }}'>Tải về</a> | <a id="upload_link">Thay thế</a> | <a id="del_cv">Xóa</a> ]
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Đã tải:</label>
			<div class="col-sm-6 control-label" style="text-align:left">{{date('d-m-Y',strtotime($resume->updated_at))}}</div>
			{{ Form::file('cv_update',array('class'=>'upload hidden', 'id' =>'uploadCV')) }}
			<div class="modal fade" id="delete_modal">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($resume)>0) @if($resume->tieude_cv != '') {{$resume->tieude_cv}} @else{{$user->created_at}} {{$user->first_name}} {{$user->last_name}}@endif @endif"?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
							<button type="button" class="del-modal btn bg-orange">Xóa</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Hồ sơ phụ:</label>
			<div class="col-sm-6 control-label decoration" style="text-align:left">
				@if($resume->second_file_name != '')
				<span id="second_file_name">{{$resume->second_file_name}}</span>  [ <a href='{{ URL::route("admin.resumes.uploadcv", array("download_second",$resume->id)) }}'>Tải về</a> | <a id="upload_second_cv">Thay thế</a> | <a id="del_second_cv">Xóa</a> ]
				@else
				<span id="second_file_name">Chưa có hồ sơ phụ</span> [ <a id="upload_second_cv">Tải lên</a> ]
				@endif
				{{ Form::file('cv_second',array('class'=>'upload hidden', 'id' =>'uploadSecondCV')) }}
			<div class="modal fade" id="delete_second_modal">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Khi bị xóa, hồ sơ không thể phục hồi lại được. Bạn có thực sự muốn xóa hồ sơ "@if(count($resume)>0) @if($resume->tieude_cv != '') {{$resume->tieude_cv}} @else{{$user->created_at}} {{$user->first_name}} {{$user->last_name}}@endif @endif"?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
							<button type="button" class="del_second_modal btn bg-orange">Xóa</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Bằng cấp cao nhất <abbr>*</abbr></label>
			<div class="col-sm-3">
				{{ Form::select('info_highest_degree', Education::lists('name', 'id'), $resume->bangcapcaonhat, array('class'=>'form-control') ) }}
				<span class="error-message">{{$errors->first('info_highest_degree')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc mong muốn <abbr>*</abbr></label>
			<div class="col-sm-3">
				{{ Form::select('info_wish_level', Level::lists('name', 'id'), $resume->capbacmongmuon, array('class'=>'form-control') ) }}
				<span class="error-message">{{$errors->first('info_wish_level')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Số năm kinh nghiệm</label>
			<div class="col-sm-1">
				{{ Form::text('info_years_of_exp', $resume->namkinhnghiem, array('class'=>'form-control', 'placeholder'=>'Ví dụ: 1', 'id'=>'info_years_of_exp') ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('info_years_of_exp', $resume->namkinhnghiem, ($resume->namkinhnghiem>0)?0:1, array('class'=>'ace', 'id'=>'info_years_of_exp') ) }}
						<span class="lbl"> Chưa có kinh nghiệm</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương mong muốn</label>
			<div class="col-sm-2">
				{{ Form::text('specific_salary', $resume->mucluong ) }}
			</div>
			<div class="col-xs-1">
				<label>
				{{ Form::select('loaitien', array(1=>'VND'), $resume->loaitien, array('class'=>'form-control','id'=>'loaitien' ) ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('specific_salary_radio', 1, ($resume->mucluong>0)?0:1, array('class'=>'ace', 'id'=>'is_mucluong') ) }}
						<span class="lbl"> Thương lượng</span>
					</label>
				</div>
			</div>
		</div>


		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngành nghề <abbr>*</abbr></label>
			<div class="col-sm-6">
				{{ Form::select('info_category[]', Category::getList(), $resume->arrayCategory(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn ngành nghề, tối đa 3 ngành') ) }}
				<span class="error-message">{{$errors->first('info_category')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc <abbr>*</abbr></label>
			<div class="col-sm-6">
				{{ Form::select('info_wish_place_work[]', Province::lists('province_name', 'id'), $resume->arrayLocation(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn nơi làm việc, tối đa 3 địa điểm') ) }}
				<span class="error-message">{{$errors->first('info_wish_level')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc hiện tại</label>
			<div class="col-sm-3">
				{{ Form::select('info_current_level', Level::lists('name', 'id'), $resume->capbachientai, array('class'=>'form-control') ) }}
				<span class="error-message">{{$errors->first('info_current_level')}}</span>
			</div>
		</div>

		<div class="form-group" style="border-top: 5px solid #D9EDF7; margin-top:20px; padding-top:35px;">
			<div class="col-sm-offset-5">
				<button type="submit" class="btn btn-primary">Lưu tất cả thay đổi</button>
			</div>
		</div>
	{{Form::close()}}
@stop


@section('style')
	<!-- page specific plugin styles -->
	{{ HTML::style('assets/css/jquery-ui.custom.min.css') }}
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-timepicker.min.css') }}
	{{ HTML::style('assets/css/daterangepicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('assets/css/colorpicker.min.css') }}
	{{ HTML::style('assets/css/bootstrap-switch.css') }}
	<style type="text/css">
	.chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
		background: 0 0;
	}
	.tags {
		width: 100%;
	}
	</style>

@stop

@section('script')

	{{ HTML::script('assets/js/bootstrap-tag.min.js') }}
	{{ HTML::script('assets/js/jquery.ui.touch-punch.min.js') }}
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/fuelux.spinner.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-timepicker.min.js') }}
	{{ HTML::script('assets/js/moment.min.js') }}
	{{ HTML::script('assets/js/daterangepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datetimepicker.min.js') }}
	{{ HTML::script('assets/js/bootstrap-colorpicker.min.js') }}
	{{ HTML::script('assets/js/jquery.knob.min.js') }}
	{{ HTML::script('assets/js/jquery.autosize.min.js') }}
	{{ HTML::script('assets/js/jquery.inputlimiter.1.3.1.min.js') }}
	{{ HTML::script('assets/js/jquery.maskedinput.min.js') }}
	{{ HTML::script('assets/js/bootstrap-tag.min.js') }}
	{{ HTML::script('assets/js/bootstrap-switch.min.js') }}
	{{ HTML::script('assets/js/typeahead.jquery.min.js') }}
	{{ HTML::script('assets/js/jquery.cookie.js') }}
	{{ HTML::script('ace/assets/js/main.js') }}
@stop

@section('custom-script')
	<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
					//resize the chosen on window resize
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-1').addClass('tag-input-style');
						 else $('#form-field-select-1').removeClass('tag-input-style');
					});
				}
				$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				$('#spinner1').ace_spinner({value:{{ $resume->mucluong }},min:0,max:10000,step:50, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110',btn_up_class:'btn-info' , btn_down_class:'btn-info'});


				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder')
					  }
					)
					var $tag_obj = $('#form-field-tags').data('tag');
					
				}
				catch(e) {
				
				}
				$("#switch-status").bootstrapSwitch({
					onText: 'Activated',
					offText: 'Unactivated',
					offColor: 'danger'
				});
				
				$('#email').keyup(function() {
					var query = $('#email').val();
					if(query != '')
					{
						$('#email').trigger('focus');
						$.ajax({
							url: '{{ URL::route('resumes.search') }}',
							data: {query: query},
							type: 'POST',
							dataType: 'json',
							success:function(json)
							{
								$('.email-result').html('');
								if(json.length > 0) {
									$.each(json, function(index, val) {
										newVal = val.replace(query, '<b>'+query+'</b>');
										$('.email-result').append('<li><a href="#" class="set_email" onclick="return false;">'+newVal+'</a></li>');
									});
								} else {
									$('.email-result').append('<li><a href="#" class="">Không có kết quả !</a></li>');
								}
								
								
							}
						});
					}
					
				});
				$(document).on('click', 'a.set_email', function(event) {
					var email = $(this).text();
					$('#email').val(email);
					
						$('#email').trigger('blur');
					
				});
				function setEmail(email)
				{
					alert('a');
					$('#email').val(email);
					
				}
				$('#email').blur(function() {
					setTimeout(function function_name (argument) {
						$('.email-result').css({'display': 'none'});
					}, 200);
				});
				
				$('#email').focus(function() {
					if($('#email').val() == '') return;
					$('.email-result').css({'display': 'block'});
				});
				
				var is_mucluong = {{ ($resume->mucluong)?0:1 }};
				if(is_mucluong)
				{
					$('#spinner1').prop({disabled: 'disabled'});
					$('#loaitien').prop({disabled: 'disabled'});
					$('.spinbox-up').addClass('disabled');
					$('.spinbox-down').addClass('disabled');
				}

				$('#is_mucluong').click(function(event) {
					if($(this).is(':checked'))
					{
						$('#spinner1').prop({disabled: 'disabled'});
						$('#loaitien').prop({disabled: 'disabled'});
						$('.spinbox-up').addClass('disabled');
						$('.spinbox-down').addClass('disabled');
					} else {
						$('#spinner1').prop({disabled: ''});
						$('#loaitien').prop({disabled: ''});
						$('.spinbox-up').removeClass('disabled');
						$('.spinbox-down').removeClass('disabled');
					}
				});

				var is_namkn = {{ ($resume->namkinhnghiem)?0:1 }};
				if(is_namkn)
				{
					$('#namkinhnghiem').prop({disabled: 'disabled'});
				}
				$('#is_namkn').click(function(event) {
					if($(this).is(':checked'))
					{
						$('#namkinhnghiem').prop({disabled: 'disabled'});
						$('#namkinhnghiem').val('0');
					} else {
						$('#namkinhnghiem').prop({disabled: ''});
					}
				});
			});
		</script>
		@if($resume !=null)
		<script type="text/javascript">
			$("#uploadCV").change(function() {
		        var defaull_cv = $('#file_name').html();
		        $('#file_name').html($(this).val());
		        if($(this).val() == ''){
		             $('#file_name').html(defaull_cv);
		        }
		    });
		    $("#upload_link").on('click', function(e){
		        e.preventDefault();
		        $("#uploadCV").trigger('click');
		    });
		    $(document).on('click','#del_cv',function(){
		        url = '{{ URL::route("admin.resumes.uploadcv", array("delete",$resume->id)) }}';
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


		     $("#upload_second_cv").on('click', function(e){
		        e.preventDefault();
		        $("#uploadSecondCV").trigger('click');
		    });
		     $("#uploadSecondCV").change(function() {
		        var defaull_cv = $('#second_file_name').html();
		        $('#second_file_name').html($(this).val());
		        if($(this).val() == ''){
		             $('#second_file_name').html(defaull_cv);
		        }
		    });


		    $(document).on('click','#del_second_cv',function(){
		        url = '{{ URL::route("admin.resumes.uploadcv", array("delete_second_cv",$resume->id)) }}';
		        $('#delete_second_modal').modal('show');
		        $('.del_second_modal').click(function(e){
		            e.preventDefault();
		            $.ajax({
		                type: "GET",
		                url: url, 
		                success : function(data){
		                   location.reload();
		                   console.log(data);
		                   $('#delete_second_modal').modal('hide');
		                }
		            });    
		        });
		    });
		</script>
		@endif
		<script type="text/javascript">
		$('#btn_UploadNewCV').change(function(event) {
			$('.file_name_new_upload').val($(this).val());
		});

		
		</script>
@stop