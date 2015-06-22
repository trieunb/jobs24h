@extends('layouts.admin')
@section('title')Add new training @stop
@section('page-header')Thêm mới học viên hoặc giảng viên @stop
@section('style')

 
{{ HTML::script('http://localhost/vnjobs/vendor/ckeditor/ckeditor/ckeditor.js') }}
@stop
@section('content')



	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
	 
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Họ và tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'name', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('sex', array('1'=>'Nam','2'=>'Nữ')) }}
			</div>
		</div>

		 
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', null, array('class'=>'form-control','required') ) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-6">
				{{ Form::input('number', 'phone', null, array('class'=>'form-control','maxlength'=>11,'min'=>0,'required') ) }}
			</div>
		</div>
 
		 <div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', null, array('class'=>'form-control','required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Facebook:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'facebook', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Twitter:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'twitter', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Skype:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'skype', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Linkedin:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'linkedin', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">

 			   	 {{ Form::file('thumbnail', array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>
			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{URL::to('uploads/training/avatar.jpg')}}" alt="your image" />

			</div>
			 
 		</div>
		 
		


		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Là:</label>
			<div class="col-sm-2">
				{{ Form::select('roll_id',$roll_id)}}
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Khóa:</label>
			<div class="col-sm-6">
				{{ Form::select('training_id',$training_id)}}
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