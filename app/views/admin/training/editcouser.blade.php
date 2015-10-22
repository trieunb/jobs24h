@extends('layouts.admin')
@section('title')Chỉnh sửa khóa học @stop
@section('page-header')Chỉnh sửa khóa học @stop
@section('style')

 
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal']) }}
		@include('includes.notifications')
		 
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', $data['title'], array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Thời lượng:</label>
			<div class="col-sm-1">
				{{ Form::input('text', 'time_day', $data['time_day'], array('class'=>'form-control', 'required') ) }}
			</div>
			<label for="inputTitle" class="control-label">Buổi</label>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Học phí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'fee', $data['fee'], array('class'=>'form-control') ) }}
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
				{{ Form::input('text', 'shift',$data['shift'], array('class'=>'form-control') ) }}
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
				{{ Form::input('text', 'time_hour', $data['time_hour'], array('class'=>'form-control', 'required') ) }}
			</div>
			<label for="inputTitle" class="control-label">Giờ</label>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nội dung:</label>
			<div class="col-sm-10">
				<textarea name="editor1" id="editor1" rows="10" cols="80">
                {{$data['content']}}
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
				{{ Form::input('text', 'discount', $data['discount'], array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Chọn giảng viên:</label>
			
			<div class="col-sm-6">

				 
			 {{ Form::select('teacher[]', $teacher, $data['tch'], ['id' => 'teacher', 'multiple' => 'multiple']) }}
			
			</div>
			
		</div>

  		<div class="tags-box bg-little-blue push-padding-30-full border-blue col-xs-10" style="margin-bottom: 10px;">
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO TITLE:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]["title"]))
					{{ Form::text('seo[title]',  $data["seo"]["title"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@else
					{{ Form::text('seo[title]',  null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO DESCRIPTION:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]["description"]))
					{{ Form::text('seo[description]', $data["seo"]["description"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@else
					{{ Form::text('seo[description]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">META KEYWORDS:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]["keyword"]))
					{{ Form::text('seo[keyword]',  $data["seo"]["keyword"], array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@else
					{{ Form::text('seo[keyword]',null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@endif
				</div>
			</div>
			
		</div>


		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	<style type="text/css">
		.no-padding {
			padding: 0;
		}
		.middle-align {
			vertical-align: middle;
			padding-top: 6px;
		}
		.bg-little-blue {background: #e4f5ff;}
		.push-padding-30-full {padding: 30px;}
		.border-blue {border: 1px solid #00b9f2;}
	</style>
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