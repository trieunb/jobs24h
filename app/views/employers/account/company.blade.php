@extends('layouts.employer')
@section('title') Cập nhật thông tin công ty @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.company_navbar')
			</aside>
			<section id="content" class="col-sm-9 pull-right right">
				<div class="box">
				<div id="company-info">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/book.png') }} Thông tin công ty</h2>
					</div>
					{{ Form::open(['method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) }}
						@include('includes.notifications')
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tên công ty:</label>
							<div class="col-sm-9">
								{{ Form::text('company_name', $com->company_name, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tên thương mại công ty:</label>
							<div class="col-sm-9">
								{{ Form::text('') }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Loại hình hoạt động:</label>
							<div class="col-sm-9">
								<?php $loaihinh = [
									'Trách nhiệm hữu hạn' => 'Trách nhiệm hữu hạn',
									'Nhà nước' => 'Nhà nước',
									'Liên doanh' => 'Liên doanh',
									'Cổ phần' => 'Cổ phần',
									'Công ty đa quốc gia' => 'Công ty đa quốc gia',
									'Cá nhân' => 'Cá nhân',
									'100% vốn nước ngoài' => '100% vốn nước ngoài',
								]; ?>
								{{ Form::select('work_type', $loaihinh, $com->work_type ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Địa chỉ công ty:</label>
							<div class="col-sm-9">
								{{ Form::text('company_address', $com->company_address) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Logo:</label>
							<div class="col-sm-3">
								<div class="checkbox">
									<label>
										{{ Form::checkbox('display_logo', 1, $com->display_logo) }}
										Hiển thị Logo
									</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="fileUpload btn col-sm-3">
								    <span class="decoration"><a class=" text-blue ">Chọn Logo</a></span>
								    {{ Form::file('filelogo', ['class'=>'upload uploadBtn', 'id'=>'b1']) }}
								</div>
								<div class="col-sm-9">
									<input placeholder="không có tệp nào được chọn" id="b1_u" disabled="disabled" class="form-control col-sm-12 uploadFile">
								</div>
								<div class="clearfix"></div>
								<small class="legend">Định dạng *.gif, *.jpg. Dung lượng tối đa 20Kb, kích thước (95x50)px</small>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Sơ lược về công ty:</label>
							<div class="col-sm-9">
								{{ Form::textarea('full_description', $com->full_description) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Lĩnh vực hoạt động:</label>
							<div class="col-sm-9">
								{{ Form::textarea('work_field', $com->work_field, ['rows'=>5]) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Giờ làm việc:</label>
							<div class="col-sm-9">
								{{ Form::text('giolamviec', $com->giolamviec) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Lợi ích:</label>
							<div class="col-sm-9">
								{{ Form::textarea('chonchungtoi', $com->chonchungtoi, ['rows'=>3]) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Năm thành lập:</label>
							<div class="col-sm-9">
								{{ Form::text('started_year', $com->started_year) }}
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tổng số nhân viên:</label>
							<div class="col-sm-9">
								{{ Form::text('total_staff', $com->total_staff) }}
							</div>
						</div> -->
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Quy mô công ty:</label>
							<div class="col-sm-4">
								{{ Form::select('quymocty', Config::get('custom_quymo.quymo'), $com->quymocty ) }}
							</div>
						</div>
						<p class="clearfix">Nhập thêm video và hình ảnh giới thiệu về công ty sẽ thu hút ứng viên nộp đơn tuyển.<br>Video và hình ảnh này sẽ được sử dụng chung cho tất cả thông tin tuyển dụng và trang giới thiệu về công ty.</p>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Link video Youtube:</label>
							<div class="col-sm-7">
								{{ Form::text('video_link', $com->video_link, ['id'=>'video_link']) }}
							</div>
							<div class="pull-right">
								<button type="button" data-toggle="modal" href='#videoView' class="btn btn-sm bg-gray-light">Xem trước</button>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Hình ảnh<br><small>(Tối đa 5 ảnh)</small></label>
							<div class="col-sm-9">
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-5">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    {{ Form::file('image1', ['id'=>'b2', 'class'=>'upload uploadBtn']) }}
									</div>
									<div class="col-sm-7">
										<input id="b2_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-5">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    {{ Form::file('image2', ['id'=>'b3', 'class'=>'upload uploadBtn']) }}
									</div>
									<div class="col-sm-7">
										<input id="b3_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-5">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    {{ Form::file('image3', ['id'=>'b4', 'class'=>'upload uploadBtn']) }}
									</div>
									<div class="col-sm-7">
										<input id="b4_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-5">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    {{ Form::file('image4', ['id'=>'b5', 'class'=>'upload uploadBtn']) }}
									</div>
									<div class="col-sm-7">
										<input id="b5_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-5">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    {{ Form::file('image5', ['id'=>'b6', 'class'=>'upload uploadBtn']) }}
									</div>
									<div class="col-sm-7">
										<input id="b6_u" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
							</div>
							<div class="col-sm-9 col-sm-offset-3">
								<small class="legend">- Hỗ trợ định dạng *.jpg,.gif,.png, dung lượng mỗi ảnh không vượt quá 1MB<br>- Chiều cao mỗi ảnh phải >135px và < 1.500px</small>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Map từ Google:</label>
							<div class="col-sm-9">
								{{ Form::text('google_map', $com->google_map) }}
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" class="btn btn-lg bg-orange">Cập nhật</button>
								
							</div>
						</div>
					</form>
				</div>
				</div>
			</section>
		</div>
	</section>

	<div class="modal fade" id="videoView">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
					<iframe width="560" height="315" id="frame" src="{{ $com->video_link }}" frameborder="0" allowfullscreen></iframe>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
	.checkbox input[type=checkbox] {
		margin-left: -20px;
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