@extends('layouts.admin')
@section('title')Edit Employer #{{ $com->id }} @stop
@section('page-header')Sửa thông tin nhà tuyển dụng @stop
@section('content')

	
		{{ Form::open(['method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) }}
			@include('includes.notifications')


			<div class="form-group">
				<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-6">
					{{ Form::input('email', 'email', $com->email, array('class'=>'form-control', 'required') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
				<div class="col-sm-6">
					{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
				</div>
				<div class="col-sm-4">
					<i>Để trống là không sửa</i>
				</div>
			</div>
			 
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
				<div class="col-sm-6">
					{{ Form::input('text', 'address', $com->address, array('class'=>'form-control') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Vị trí:</label>
				<div class="col-sm-6">
					{{ Form::input('text', 'position', $com->position, array('class'=>'form-control') ) }}
				</div>
			</div>
			
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Quốc gia:</label>
				<div class="col-sm-2">
					{{ Form::select('country_id', [1=>'Việt Nam'] , $com->country_id, array('class'=>'form-control') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Tỉnh thành:</label>
				<div class="col-sm-2">
					{{ Form::select('province_id', Province::lists('province_name', 'id') , $com->province_id, array('class'=>'form-control') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
				<div class="col-sm-2">
					{{ Form::input('text', 'phone_number', $com->phone_number, array('class'=>'form-control') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
				<div class="col-sm-2">
					{{ Form::select('is_active', [0=>'Không kích hoạt', 1=>'Kích hoạt'] , $com->is_active, array('class'=>'form-control') ) }}
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-10">
				<h2>Phần thông tin công ty</h2>
			</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Tên công ty:</label>
				<div class="col-sm-10">
					{{ Form::text('company_name', $com->company->company_name, ['required']) }}
				</div>
			</div>
						<!-- <div class="form-group">
							<label for="input" class="col-sm-2 control-label">Tên thương mại công ty:</label>
							<div class="col-sm-10">
								{{ Form::text('') }}
							</div>
						</div> -->
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
					{{ Form::select('work_type', $loaihinh, $com->company->work_type ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Địa chỉ công ty:</label>
				<div class="col-sm-10">
					{{ Form::text('company_address', $com->company->company_address) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Logo:</label>
				<div class="col-sm-6">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('display_logo', 1, $com->company->display_logo) }}
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
					@if(file_exists(Config::get('app.upload_path') . 'companies/logos/'.$com->company->logo) && $com->company->logo != NULL)
					{{ HTML::image('uploads/companies/logos/'.$com->company->logo) }}
					@endif
						<input placeholder="không có tệp nào được chọn" id="b1_u" disabled="disabled" class="form-control col-sm-12 uploadFile">
					</div>
					<div class="clearfix"></div>
					<small class="legend">Định dạng *.gif, *.jpg. Dung lượng tối đa 20Kb, kích thước (95x50)px</small>
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Sơ lược về công ty:</label>
				<div class="col-sm-10">
					{{ Form::textarea('full_description', $com->company->full_description) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Lĩnh vực hoạt động:</label>
				<div class="col-sm-10">
					{{ Form::textarea('work_field', $com->company->work_field, ['rows'=>5]) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Giờ làm việc:</label>
				<div class="col-sm-10">
					{{ Form::text('giolamviec', $com->company->giolamviec) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Lợi ích:</label>
				<div class="col-sm-10">
					{{ Form::textarea('chonchungtoi', $com->company->chonchungtoi, ['rows'=>3]) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Năm thành lập:</label>
				<div class="col-sm-10">
					{{ Form::text('started_year', $com->company->started_year) }}
				</div>
			</div>
						<!-- <div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tổng số nhân viên:</label>
							<div class="col-sm-9">
								{{ Form::text('total_staff', $com->total_staff) }}
							</div>
						</div> -->
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Quy mô công ty:</label>
				<div class="col-sm-4">
					{{ Form::select('quymocty', Config::get('custom_quymo.quymo'), $com->company->quymocty ) }}
				</div>
			</div>
			<p class="clearfix">Nhập thêm video và hình ảnh giới thiệu về công ty sẽ thu hút ứng viên nộp đơn tuyển.<br>Video và hình ảnh này sẽ được sử dụng chung cho tất cả thông tin tuyển dụng và trang giới thiệu về công ty.</p>
			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Link video Youtube:</label>
				<div class="col-sm-7">
					{{ Form::text('video_link', $com->company->video_link, ['id'=>'video_link']) }}
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
				
				

				<div class="col-sm-12">
					@if(json_decode($com->company->company_images))
					 
						@foreach(json_decode($com->company->company_images) as $image)
							@if($image)
							
								<div class="col-sm-4">{{ HTML::image('uploads/companies/images/'.$image) }}</div>
								
							@endif
						@endforeach
					 <div class="clearfix"></div>	
					@endif
				</div>

			</div>

			<div class="form-group">
				<label for="input" class="col-sm-2 control-label">Map từ Google:</label>
				<div class="col-sm-10">
					{{ Form::text('google_map', $com->company->google_map) }}
					
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-7">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
					<a href="{{URL::action('admin.order.packageemployer',$com->id)}}" class="btn btn-warning">Đăng ký xác thực nhà tuyển dụng</a>

					

					<a href="{{URL::route('admin.jobs.index', ['id'=>$com->id])}}" class="btn btn-default">Danh sách tin tuyển dụng</a> 
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
	$('#video_link').change(function(event) {
		var url = $(this).val().replace("watch?v=", "v/");
		$('#frame').attr('src', url+'?rel=0&amp;controls=0&amp;showinfo=0&output=embed');
	});
	$('.uploadBtn').change(function(event) {
		var thisId = this.id;
		$('#'+thisId+'_u').attr('placeholder',  $(this).val());
	});
	</script>
@stop