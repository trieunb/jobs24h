@extends('layouts.admin')
@section('title')Edit Resume @stop
@section('page-header')Chỉnh sửa hồ sơ @stop
@section('content')
	{{ Form::open(array('method'=>'PUT', 'action'=> array('admin.resumes.update', $resume->id), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-8">
				{{ Form::email('email', $resume->ntv->email, array('autocomplete'=>'off', 'id'=>'email', 'required', 'class'=>'form-control', 'required', 'placeholder'=>'Nhập email người tìm việc') ) }}
				<div class="col-xs-6">
					<ul class="dropdown-menu email-result">
						
					</ul>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Số năm kinh nghiệm:</label>
			<div class="col-sm-1">
				{{ Form::text('namkinhnghiem', $resume->namkinhnghiem, array('required', 'class'=>'form-control', 'placeholder'=>'Ví dụ: 1', 'id'=>'namkinhnghiem') ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_namkn', $resume->namkinhnghiem, ($resume->namkinhnghiem>0)?0:1, array('class'=>'ace', 'id'=>'is_namkn') ) }}
						<span class="lbl"> Chưa có kinh nghiệm</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Bằng cấp cao nhất:</label>
			<div class="col-sm-8">
				{{ Form::select('bangcapcaonhat', Education::lists('name', 'id'), $resume->bangcapcaonhat, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tiêu đề Hồ sơ:</label>
			<div class="col-sm-8">
				{{ Form::text('tieude_cv', $resume->tieude_cv, array('required', 'class'=>'form-control', 'placeholder'=>'Ví dụ: CV Lập trình viên') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mục tiêu NN:</label>
			<div class="col-sm-8">
				{{ Form::textarea('dinhhuongnn', $resume->dinhhuongnn, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Định hướng nghề nghiệp trong tương lai') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công ty gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'ctyganday', $resume->ctyganday, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Minh Phúc Telecom') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công việc gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'cvganday', $resume->cvganday, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Lập trình viên') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc hiện tại:</label>
			<div class="col-sm-8">
				{{ Form::select('capbachientai', Level::lists('name', 'id'), $resume->capbachientai, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'vitrimongmuon', $resume->vitrimongmuon, array('required', 'class'=>'form-control', 'placeholder'=>'Ví dụ: Giám đốc') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::select('capbacmongmuon', Level::lists('name', 'id'), $resume->capbacmongmuon, array('class'=>'form-control') ) }}
				
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_noilamviec[]', Province::lists('province_name', 'id'), $resume->arrayLocation(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn nơi làm việc, tối đa 3 địa điểm') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngành nghề:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_nganhnghe[]', Category::getList(), $resume->arrayCategory(), array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn ngành nghề, tối đa 3 ngành') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương mong muốn:</label>
			<div class="col-sm-2">
				{{ Form::text('mucluong', $resume->mucluong, array('id'=>'spinner1') ) }}
			</div>
			<div class="col-xs-1">
				<label>
				{{ Form::select('loaitien', array(1=>'USD', 2=>'VND'), $resume->loaitien, array('class'=>'form-control','id'=>'loaitien' ) ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_mucluong', 1, ($resume->mucluong>0)?0:1, array('class'=>'ace', 'id'=>'is_mucluong') ) }}
						<span class="lbl"> Thương lượng</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Kỹ năng:</label>
			<div class="col-sm-8">
				{{ Form::textarea('kynang', $resume->kynang, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Ví dụ: Biết HTML, CSS, PHP') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Đánh giá bản thân:</label>
			<div class="col-sm-8">
				{{ Form::textarea('danhgiabanthan', $resume->danhgiabanthan, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Ví dụ: Là con người ham học hỏi, tư duy tốt') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Sở thích:</label>
			<div class="col-sm-8">
				{{ Form::text('sothich', $resume->sothich, array('class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Mỗi sở thích cách nhau bằng dấu phẩy. Ví dụ: chơi games, internet, bóng đá', 'id'=>'form-field-tags') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Hình thức làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('hinhthuclamviec', WorkType::lists('name', 'id'), $resume->hinhthuclamviec, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
			<div class="col-sm-8">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_public', 1, $resume->is_public, array('class'=>'ace')) }}
						<span class="lbl">Cho phép nhà tuyển dụng tìm kiếm hồ sơ này</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ẩn nhà tuyển dụng:</label>
			<div class="col-sm-6">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_visible', 1, $resume->is_visible, array('class'=>'ace')) }}
						<span class="lbl">Ẩn thông tin với danh sách nhà tuyển dụng bị chặn</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Hồ sơ mặc định:</label>
			<div class="col-sm-6">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_default', 1, $resume->is_default, array('class'=>'ace')) }}
						<span class="lbl">Chọn làm hồ sơ mặc định</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::checkbox('trangthai', 1, $resume->trangthai, array('id'=>'switch-status') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
			</div>
		</div>
	{{ Form::close() }}
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

@stop