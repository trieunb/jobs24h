@extends('layouts.admin')
@section('title')Add new Employer @stop
@section('page-header')Thêm mới nhà tuyển dụng @stop
@section('content')
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.employers.store'), 'class'=>'form form-horizontal' ,'files'=>true) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
				<label for="inputFullname" class="col-sm-2 control-label">Họ tên:</label>
				<div class="col-sm-6">
					{{ Form::input('text', 'full_name', null, array('class'=>'form-control') ) }}
				</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'position', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quốc gia:</label>
			<div class="col-sm-2">
				{{ Form::select('country_id', [1=>'Việt Nam'] , null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh thành:</label>
			<div class="col-sm-2">
				{{ Form::select('province_id', Province::lists('province_name', 'id') , null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'phone_number', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('is_active', [0=>'Không kích hoạt', 1=>'Kích hoạt'] , 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10">
				<h2>Phần thông tin công ty</h2>
			</div>
		</div>

		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tên công ty:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'company_name', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quy mô công ty <span class="nomal-text">(số nhân viên)</span>:</label>
			<div class="col-sm-6">
				<?php  $quymo = [1=>'Ít hơn 10',
							2=>'10-24',
							3=>'25-99',
							4=>'100-499',
							5=>'500-999',
							6=>'1.000-4.999',
							7=>'5.000-9.999',
							8=>'10.000-19.999',
							9=>'20.000-49.999',
							10=>'Hơn 50.000']; ?>
			{{ Form::select('quymocty', $quymo, 1, array('class'=>'form-control')) }}
				
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Sơ lược về công ty:</label>
			<div class="col-sm-6">
				{{ Form::textarea('full_description', null, array('class'=>'form-control', 'rows'=>'5')) }}
				<span class="pull-right">Số kí tự đã gõ: 0 (Tối đa 10,000 kí tự)</span>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ công ty:</label>
			<div class="col-sm-6">
				{{ Form::text('company_address', null, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ tên người liên hệ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'full_name', null, array('class'=>'form-control') ) }}
			</div>
		</div>


			 
						 
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Loại hình công ty:</label>
				<div class="col-sm-10">
					<?php $loaihinh = [
						'Trách nhiệm hữu hạn' => 'Trách nhiệm hữu hạn',
						'Nhà nước' => 'Nhà nước',
						'Liên doanh' => 'Liên doanh',
						'Cổ phần' => 'Cổ phần',
						'Công ty đa quốc gia' => 'Công ty đa quốc gia',
						'Cá nhân' => 'Cá nhân',
						'100% vốn nước ngoài' => '100% vốn nước ngoài',
					]; ?>
					{{ Form::select('work_type', $loaihinh, null ) }}
				</div>
			</div>
			 
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Logo:</label>
				<div class="col-sm-6">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('display_logo', 1, null) }}
							Hiển thị Logo
						</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="col-sm-5 btn fileUpload">
					     <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
					    {{ Form::file('filelogo', ['class'=>'upload uploadBtn', 'id'=>'b1']) }}
					</div>
					<div class="col-sm-7">
						<input placeholder="không có tệp nào được chọn" id="b1_u" disabled="disabled" class="form-control col-sm-12 uploadFile">
					</div>
					<div class="clearfix"></div>
					<small class="legend">Định dạng *.gif, *.jpg. Dung lượng tối đa 20Kb, kích thước (95x50)px</small>
				</div>
			</div>
			 
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Lĩnh vực hoạt động:</label>
				<div class="col-sm-10">
					{{ Form::textarea('work_field', null, ['rows'=>5]) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Giờ làm việc:</label>
				<div class="col-sm-10">
					{{ Form::text('giolamviec',null) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Lợi ích:</label>
				<div class="col-sm-10">
					{{ Form::textarea('chonchungtoi', null, ['rows'=>3]) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Năm thành lập:</label>
				<div class="col-sm-10">
					{{ Form::text('started_year', null) }}
				</div>
			</div>
						 
			 
			<p class="clearfix">Nhập thêm video và hình ảnh giới thiệu về công ty sẽ thu hút ứng viên nộp đơn tuyển.<br>Video và hình ảnh này sẽ được sử dụng chung cho tất cả thông tin tuyển dụng và trang giới thiệu về công ty.</p>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Link video Youtube:</label>
				<div class="col-sm-7">
					{{ Form::text('video_link', null, ['id'=>'video_link']) }}
				</div>
				 
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Hình ảnh<br><small>(Tối đa 5 ảnh)</small></label>
				<div class="col-sm-9">
					<div class="col-sm-12">
						<div class="col-sm-3 btn fileUpload">
						    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
						    {{ Form::file('image1', ['id'=>'b2', 'class'=>'upload uploadBtn']) }}
						</div>
						<div class="col-sm-7">
							<input id="b2_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-3 btn fileUpload">
						    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
						    {{ Form::file('image2', ['id'=>'b3', 'class'=>'upload uploadBtn']) }}
						</div>
						<div class="col-sm-7">
							<input id="b3_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-3 btn fileUpload">
						    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
						    {{ Form::file('image3', ['id'=>'b4', 'class'=>'upload uploadBtn']) }}
						</div>
						<div class="col-sm-7">
							<input id="b4_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-3 btn fileUpload">
						    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
						    {{ Form::file('image4', ['id'=>'b5', 'class'=>'upload uploadBtn']) }}
						</div>
						<div class="col-sm-7">
							<input id="b5_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-3 btn fileUpload">
						    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
						    {{ Form::file('image5', ['id'=>'b6', 'class'=>'upload uploadBtn']) }}
						</div>
						<div class="col-sm-7">
							<input id="b6_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
						</div>
					</div>
					<div class="col-sm-9 col-sm-offset-3">
						<small class="legend">- Hỗ trợ định dạng *.jpg,.gif,.png, dung lượng mỗi ảnh không vượt quá 1MB<br>- Chiều cao mỗi ảnh phải >135px và < 1.500px</small>
					</div>
				</div>
				
				

				 

			</div>

			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Map từ Google:</label>
				<div class="col-sm-10">
					{{ Form::text('google_map', null) }}
					
				</div>
			</div>


		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	<style type="text/css">
	.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
</style>
	 

@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script type="text/javascript">
	 
	$('.uploadBtn').change(function(event) {
		var thisId = this.id;
		$('#'+thisId+'_u').attr('placeholder',  $(this).val());
	});
	</script>
@stop