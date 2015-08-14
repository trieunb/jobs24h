@extends('layouts.admin')
@section('title') Chỉnh sửa thông tin @stop
@section('page-header')
	@if($data['training_roll_id']=='3')
	 Chỉnh sửa thông tin học viên cũ
	 @endif
 @stop
@section('style')

 
{{ HTML::script(URL::to('packages/ckeditor/ckeditor/ckeditor.js')) }}
@stop
@section('content')


	


	 {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
		@include('includes.notifications')
		 
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Họ và tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'name', $data['name'], array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('sex',[
					'1'=>'Nam',
					'2'=>'Nữ'
				], $data['sex']
					 ) }}
			</div>
			 
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', $data['address'], array('class'=>'form-control','required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'phone', $data['phone'], array('class'=>'form-control','required') ) }}
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Email :</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email',$data['email'], array('class'=>'form-control','required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">
			@if($data['training_roll_id']=='3')
			Quá trình học tập :
			@else
			Quá trình làm việc :
			@endif
			</label>
			<div class="col-sm-6">
				{{ Form::textarea('worked',$data['worked'], array('class'=>'form-control','placeholder'=>'Quá trình làm việc đối với giảng viên, Khóa học đã trải qua đối với sinh viên cũ') ) }}
			</div>
		</div>

		 <div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới thiệu bản thân:</label>
			<div class="col-sm-6">
				{{ Form::textarea('yourself',$data['yourself'], array('class'=>'form-control','placeholder'=>'Giới thiệu đôi nét về bản thân . Ví dụ : học vấn, kinh nghiệm') ) }}
			</div>
		</div>

		@if($data['training_roll_id']=='3')
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cảm nhận:</label>
			<div class="col-sm-6">
				{{ Form::textarea('feeling', $data['feeling'], array('class'=>'form-control') ) }}
			</div>
		</div>
		@endif
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Facebook:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'facebook',$data['facebook'], array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Twitter:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'twitter', $data['twitter'], array('class'=>'form-control', '') ) }}
			</div>
			 
		</div>
		 
		 

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Skype:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'skype', $data['skype'], array('class'=>'form-control') ) }}
			</div>
		</div>
		 
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Linkedin:</label>
			<div class="col-sm-6">
				 {{ Form::input('text', 'linkedin', $data['linkedin'], array('class'=>'form-control') ) }}

			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ảnh đại diện:</label>
			<div class="col-sm-3">
				{{ Form::file('thumbnail',	 array('class'=>'form-control','id'=>'thumbnail') ) }}

			</div>

			<div class="col-sm-3">
				<img style="width:50%" id="blah" src="{{URL::to('uploads/training/'.$data['thumbnail'].'')}}" alt="avatar" />

			</div>


			 
		</div>

		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Đối tượng:</label>
			<div class="col-sm-2">
				{{ Form::select('training_roll_id',$people, $data['roll_id']) }}
			</div>
			 
		</div>

		 

		 
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