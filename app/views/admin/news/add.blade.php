@extends('layouts.admin')
@section('title')Thêm tin tức @stop
@section('page-header')Thêm bài viết @stop
@section('style')

 
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')



	 {{ Form::open( array('route'=>array('news.post-add'), 'class'=>'form-horizontal', 'method'=>'POST', 'files'=>'true') ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Tiêu đề:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'title', null, array('class'=>'form-control') ) }}
			</div>
		</div>
 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nội dung:</label>
			<div class="col-sm-10">
				{{Form::textarea( 'editor1', null, array('id'=>'editor1'))}}
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
			<div class="col-sm-6">
 			   	 {{ Form::file('thumbnail', array('class'=>'form-control','id'=>'thumbnail') ) }}
				<div class="clearfix"></div>
				<img style="max-width:100%; margin-top:20px;" id="blah"/>
			</div>
			 
 		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Chuyên mục:</label>
			<div class="col-sm-2">
				{{ Form::select('cate', TrainingCat::lists('name', 'id'))}}
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