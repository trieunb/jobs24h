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
					<form action="" method="POST" role="form" class="form-horizontal">
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tên công ty:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tên thương mại công ty:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Loại hình hoạt động:</label>
							<div class="col-sm-9">
								<select name="" id="LoaiHinhHoatDong" class="form-control">
									<option value=""></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Địa chỉ công ty:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Logo:</label>
							<div class="col-sm-3">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="">
										Hiển thị Logo
									</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="fileUpload btn col-sm-3">
								    <span class="decoration"><a class=" text-blue ">Chọn Logo</a></span>
								    <input id="" type="file" class="upload uploadBtn">
								</div>
								<div class="col-sm-5">
									<input placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
								</div>
								<div class="clearfix"></div>
								<small class="legend">Định dạng *.gif, *.jpg. Dung lượng tối đa 20Kb, kích thước (95x50)px</small>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Sơ lượt về công ty:</label>
							<div class="col-sm-9">
								<textarea name="" id="input" class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Lĩnh vực hoạt động:</label>
							<div class="col-sm-9">
								<textarea name="" id="input" class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Giờ làm việc:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Lợi ích:</label>
							<div class="col-sm-9">
								<textarea name="" id="input" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Năm thành lập:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Tổng số nhân viên:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<p class="clearfix">Nhập thêm video và hình ảnh giới thiệu về công ty sẽ thu hút ứng viên nộp đơn tuyển.<br>Video và hình ảnh này sẽ được sử dụng chung cho tất cả thông tin tuyển dụng và trang giới thiệu về công ty.</p>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Link video Youtube:</label>
							<div class="col-sm-7">
								<input type="text" name="" id="input" class="form-control">
							</div>
							<div class="pull-right">
								<button type="button" class="btn btn-sm bg-gray-light">Xem trước</button>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Hình ảnh<br><small>(Tối đa 5 ảnh)</small></label>
							<div class="col-sm-4">
								<div class="col-sm-12">
									<div class="fileUpload btn bg-gray-light col-sm-12">
									    <span>{{ HTML::image('assets/ntd/images/folder.png') }} Tải ảnh từ máy tính</span>
									    <input id="" type="file" class="upload uploadBtn">
									</div>
									<div class="col-sm-12">
										<input placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-12 uploadFile">
									</div>
								</div>
							</div>
							<div class="col-sm-5">
								<small class="legend">- Hỗ trợ định dạng *.jpg,.gif,.png, dung lượng mỗi ảnh không vượt quá 1MB<br>- Chiều cao mỗi ảnh phải >135px và < 1.500px</small>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-3 control-label">Map từ Google:</label>
							<div class="col-sm-9">
								<input type="text" name="" id="input" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" class="btn btn-lg bg-orange">Cập nhật</button>
								<button type="button" class="btn btn-lg bg-orange">Xem lại</button>
							</div>
						</div>
					</form>
				</div>
				</div>
			</section>
		</div>
	</section>
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker.min.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	
@stop