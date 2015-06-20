@extends('layouts.admin')
@section('title')Add new Jobseeker @stop
@section('page-header')Thêm mới người tìm việc @stop
@section('style')

 
{{ HTML::script('http://localhost/vnjobs/vendor/ckeditor/ckeditor/ckeditor.js') }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal']) }}
		@include('includes.notifications')
		@foreach($data as $value)
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', $value['title'], array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Giới thiệu nội dung</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'subtitle', $value['subtitle'], array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nội dung:</label>
			<div class="col-sm-6">
				<textarea name="editor1" id="editor1" rows="10" cols="80">
                {{$value['content']}}
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
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'thumbnail', $value['thumbnail'], array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Chuyên mục:</label>
			<div class="col-sm-2">
				{{ Form::select('cat_id',$cat)}}
			</div>
		</div>
		@endforeach
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
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