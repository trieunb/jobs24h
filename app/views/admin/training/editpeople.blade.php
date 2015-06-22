@extends('layouts.admin')
@section('title') Chỉnh sửa thông tin @stop
@section('page-header') Chỉnh sửa thông tin học viên và giáo viên @stop
@section('style')

 
{{ HTML::script('http://localhost/vnjobs/vendor/ckeditor/ckeditor/ckeditor.js') }}
@stop
@section('content')


	


	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
		@include('includes.notifications')
		@foreach($data as $value)
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Họ và tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'name', $value['name'], array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('sex',[
					'1'=>'Nam',
					'2'=>'Nữ'
				], $value['sex']
					 ) }}
			</div>
			 
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', $value['address'], array('class'=>'form-control','required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'phone', $value['phone'], array('class'=>'form-control','required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Email :</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email',$value['email'], array('class'=>'form-control','required') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Facebook:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'facebook',$value['facebook'], array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Twitter:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'twitter', $value['twitter'], array('class'=>'form-control', '') ) }}
			</div>
			 
		</div>
		 
		 

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Skype:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'skype', $value['skype'], array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Linkedin:</label>
			<div class="col-sm-6">
				 {{ Form::input('text', 'linkedin', $value['linkedin'], array('class'=>'form-control') ) }}

			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">
				{{ Form::file('thumbnail',	 array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>

			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{$value['thumbnail']}}" alt="avatar" />

			</div>


			 
		</div>

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Đối tượng:</label>
			<div class="col-sm-2">
				{{ Form::select('training_roll_id',$people, $value['roll_id']
					 ) }}
			</div>
			 
		</div>

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Đối tượng:</label>
			<div class="col-sm-6">
				{{ Form::select('training_id',$training, $value['id_daotao']
					 ) }}
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