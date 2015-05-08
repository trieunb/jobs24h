<?php include('header.php'); ?>
	<div class="container">
	<?php include('breadcrumb.php'); ?>
	</div>
	<section class="main-content container">
		<div class="boxed">
			<nav class="ntv-menu">
				<?php include('menu_ntv.php'); ?>
				<ul class="pull-right relative">
						<li><a href="#">Mục tiêu</a></li>
						<li><a href="#">Kinh nghiệm</a></li>
						<li><a href="#">Kỹ Năng</a></li>
						<li><a href="#">Học vấn</a></li>
						<li><a href="#">Ngoại ngữ</a></li>
						<li><a href="#">Chứng chỉ</a></li>
						<li><a href="#">Liên hệ</a></li>
						<li><a href="#">Hình ảnh</a></li>
						<li><a href="#">Học vấn</a></li>
						<li><a href="#">Đánh giá bản thân</a></li>
					</ul>
			</nav>
				<div class="rows">
					<div class="title-page">
						<h2>Chứng chỉ</h2> 
						<a href="#" class=" pull-right"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
					</div>

						<form action="" method="POST" role="form" class="form-horizontal">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th>Trường học</th>
										<th>Chuyên ngành</th>
										<th>Trình độ</th>
										<th>Thời gian</th>
										<th>Hoạt động</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
										<td>Bằng cử nhân</td>
										<td>2009-2013</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
										<td>Bằng cử nhân</td>
										<td>2009-2013</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
										<td>Bằng cử nhân</td>
										<td>2009-2013</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
								</tbody>
							</table>		
						</form>

				</div>
				<div class="rows">
					<div class="title-page">
						<h2>Thêm học vấn</h2> 
					</div>
					<div class="box">
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Quốc gia</label>
								<div class="col-sm-6">
									<select class="form-control">
										<option>Việt Nam</option>
										<option>Lào</option>
										<option>Campuchia</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Tên trường</label>
								<div class="col-sm-6">
									<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Bằng cấp</label>
								<div class="col-sm-6">
									<select class="form-control">
										<option>- Lựa chọn -</option>
										<option>Đại học</option>
										<option>Cử nhân</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Thời gian</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Từ</option>
										<option>2001</option>
										<option>2002</option>
									</select>
								</div>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Đến</option>
										<option>2001</option>
										<option>2002</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Ghi chú thêm</label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="5" id="comment"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Các hoạt động xã hội</label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="5" id="comment"></textarea>
								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
								    <button type="submit" class="btn btn-lg bg-orange">Lưu</button>
								    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							    </div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</section>
<?php include('footer.php'); ?>