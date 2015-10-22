@extends('layouts.admin')
@section('title')Chỉnh sửa tài liệu @stop
@section('page-header')Chỉnh sửa tài liệu @stop
@section('style')

 {{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
	 
		@include('includes.notifications')
		

		 
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề :</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', $data['title'], array('class'=>'form-control', 'required') ) }}
			</div>
		</div>


		 
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tác giả:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'author', $data['author'], array('class'=>'form-control','required') ) }}
			</div>
		</div>

		 
 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới thiệu nội dung:</label>
			<div class="col-sm-6">
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
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">

 			   	 {{ Form::file('thumbnail', array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>
			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{$data['thumbnail']}}" alt="{{$data['title']}}" />

			</div>
			 
 		</div>
 		 
 		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tải file lên:</label>
			

			<div class="col-sm-6">
				 File cũ: {{$data['store']}}
 			   	 {{ Form::file('store', array('class'=>'form-control') ) }}
 			   	 
			</div>
			 
			 
 		</div>
		 
		<div class="tags-box bg-little-blue push-padding-30-full border-blue col-xs-10" style="margin-bottom: 10px;">
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO TITLE:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]->title))
					{{ Form::text('seo[title]',  $data["seo"]->title, array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@else
					{{ Form::text('seo[title]',  null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: tiêu đề') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">SEO DESCRIPTION:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]->description))
					{{ Form::text('seo[description]', $data["seo"]->description, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@else
					{{ Form::text('seo[description]', null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: Mô tả') ) }}
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="keyword_tags" class="col-sm-2 control-label">META KEYWORDS:</label>
				<div class="col-sm-6">
				@if(isset($data["seo"]->keyword))
					{{ Form::text('seo[keyword]',  $data["seo"]->keyword, array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@else
					{{ Form::text('seo[keyword]',null, array('class'=>'form-control', 'placeholder'=>'Ví dụ: keyword') ) }}
				@endif
				</div>
			</div>
			
		</div>


		 

		 
		 
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
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