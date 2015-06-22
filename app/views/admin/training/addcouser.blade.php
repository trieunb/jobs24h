@extends('layouts.admin')
@section('title')Add new Jobseeker @stop
@section('page-header')Thêm mới người tìm việc @stop
@section('style')

 
{{ HTML::script('http://localhost/vnjobs/vendor/ckeditor/ckeditor/ckeditor.js') }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal']) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Thời lượng:</label>
			<div class="col-sm-1">
				{{ Form::input('text', 'time_day', null, array('class'=>'form-control', 'required') ) }}
			</div>
			<label for="inputTitle" class="control-label">Buổi</label>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Học phí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'fee', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngày khai giảng:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'date_open', date('Y-m-d'), array('class'=>'form-control datepicker') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ca:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'shift',null, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngày học:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'date_study', date('Y-m-d'), array('class'=>'form-control datepicker') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Giờ học:</label>
			<div class="col-sm-1">
				{{ Form::input('text', 'time_hour', null, array('class'=>'form-control', 'required') ) }}
			</div>
			<label for="inputTitle" class="control-label">Giờ</label>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nội dung:</label>
			<div class="col-sm-6">
				<textarea name="editor1" id="editor1" rows="10" cols="80">
                Nhập nội dung tại đây
            	</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                 
                CKEDITOR.replace( 'editor1', {
                filebrowserUploadUrl: '{{URL::to("admin/training/upload")}}',
                });
            </script>


			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giảm giá:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'discount', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tên giáo viên:</label>
			<div class="col-sm-2">
				{{ Form::select('teacher_id',$teacher)}}
			</div>
		</div>
		 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker3.css') }}
@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.vi.js') }}
	<script type="text/javascript">
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			language: "vi",
			autoclose: true,
			todayHighlight: true,
			endDate: new Date(),
		});
	</script>
@stop