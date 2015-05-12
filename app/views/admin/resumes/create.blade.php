@extends('layouts.admin')
@section('title')Add new Resume @stop
@section('content')
	<h3>Thêm mới Hồ Sơ: </h3>
	<hr>
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.resumes.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-8">
				{{ Form::email('email', null, array('required', 'class'=>'form-control', 'required', 'placeholder'=>'Nhập email người tìm việc') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tiêu đề Hồ sơ:</label>
			<div class="col-sm-8">
				{{ Form::text('tieude_cv', null, array('required', 'class'=>'form-control', 'placeholder'=>'Ví dụ: CV Lập trình viên') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mục tiêu NN:</label>
			<div class="col-sm-8">
				{{ Form::textarea('dinhhuongnn', null, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Định hướng nghề nghiệp trong tương lai') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công ty gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'ctyganday', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Minh Phúc Telecom') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công việc gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'cvganday', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Lập trình viên') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc hiện tại:</label>
			<div class="col-sm-8">
				{{ Form::select('capbachientai', Level::lists('name', 'id'), null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'capbacmongmuon', null, array('required', 'class'=>'form-control', 'placeholder'=>'Ví dụ: Giám đốc') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::select('capbachientai', Level::lists('name', 'id'), null, array('class'=>'form-control') ) }}
				
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_noilamviec', Province::lists('province_name', 'id'), null, array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn nơi làm việc, tối đa 3 địa điểm') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngành nghề:</label>
			<div class="col-sm-8">
				
				{{ Form::select('nganhnghe', Category::lists('cat_name', 'id'), null, array('multiple'=>'multiple', 'class'=>'chosen-select form-control tag-input-style', 'data-placeholder'=>'Chọn ngành nghề, tối đa 3 ngành') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương mong muốn:</label>
			<div class="col-sm-2">
				{{ Form::text('mucluongmongmuon', 500, array('id'=>'spinner1') ) }}
			</div>
			<div class="col-xs-1">
				<label>
				{{ Form::select('loaitien', array(1=>'USD', 2=>'VND'), 1, array('class'=>'form-control') ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1">
						Thương lượng
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Kỹ năng:</label>
			<div class="col-sm-8">
				{{ Form::textarea('kynang', null, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Ví dụ: Biết HTML, CSS, PHP') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Đánh giá bản thân:</label>
			<div class="col-sm-8">
				{{ Form::textarea('danhgiabanthan', null, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Ví dụ: Là con người ham học hỏi, tư duy tốt') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Sở thích:</label>
			<div class="col-sm-8">
				{{ Form::text('sothich', null, array('class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Mỗi sở thích cách nhau bằng dấu phẩy. Ví dụ: chơi games, internet, bóng đá', 'id'=>'form-field-tags') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Hình thức làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('work_types', WorkType::lists('name', 'id'), null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
			<div class="col-sm-8">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('is_public', 1, 1, array('class'=>'ace')) }}
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
						{{ Form::checkbox('is_visible', 1, 0, array('class'=>'ace')) }}
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
						{{ Form::checkbox('is_default', 1, 1, array('class'=>'ace')) }}
						<span class="lbl">Chọn làm hồ sơ mặc định</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::checkbox('trangthai', 1, 1, array('id'=>'switch-status') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm</button>
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
				$('#spinner1').ace_spinner({value:100,min:0,max:10000,step:50, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110',btn_up_class:'btn-info' , btn_down_class:'btn-info'});


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

			});
		</script>

@stop