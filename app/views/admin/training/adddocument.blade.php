@extends('layouts.admin')
@section('title')Add new training @stop
@section('page-header')Thêm mới tài liệu @stop
@section('style')

 
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
	 
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề :</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>


		 
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tác giả:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'author', null, array('class'=>'form-control','required') ) }}
			</div>
		</div>

		 
 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới thiệu nội dung:</label>
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
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">

 			   	 {{ Form::file('thumbnail', array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>
			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{URL::to('uploads/training/logo.png')}}" alt="your image" />

			</div>
			 
 		</div>

 		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tải file lên:</label>
			<div class="col-sm-3">

 			   	 {{ Form::file('store', array('class'=>'form-control') ) }}

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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#thumbnail").change(function(){
        readURL(this);
    });
</script>
@stop