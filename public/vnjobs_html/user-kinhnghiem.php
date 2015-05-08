<?php include('header.php'); ?>
	<div class="container">
	<?php include('breadcrumb.php'); ?>
	</div>
	<section class="main-content container">
		<div class="boxed">
			<nav class="ntv-menu">
				<?php include('menu_ntv.php'); ?>
				<?php include('menu_right.php'); ?>
			</nav>
			
				<div class="rows">
					<div class="title-page">
						<h2>Kinh nghiệm việc làm</h2> 
					</div>

						<form action="" method="POST" role="form" class="form-horizontal">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th>Công ty</th>
										<th>Tiêu đề</th>
										<th>Thời gian</th>
										<th>Hoạt động</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
										<td>2009-2013</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
										<td>2009-2013</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Trường Đại học Quy Nhơn</td>
										<td>Công nghệ thông tin</td>
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
						<h2>Thêm kinh nghiệm việc làm</h2> 
					</div>
					<div class="box">
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Công ty</label>
								<div class="col-sm-6">
									<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Địa chỉ</label>
								<div class="col-sm-6">
									<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-12">
									<div class="checkbox">
								    <label>
								      <input type="checkbox">Tôi hiện đang làm việc tại đây
								    </label>
								 </div>
								</div>
								<label for="" class="col-sm-2  control-label">Thời gian</label>
								
								<div class="col-sm-2">
									<select class="form-control">
										<option>Tháng</option>
										<option>01</option>
										<option>02</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select class="form-control">
										<option>Năm</option>
										<option>2001</option>
										<option>2002</option>
									</select>
								</div>
							
								<div class="col-sm-2">
									<select class="form-control">
										<option>Tháng</option>
										<option>01</option>
										<option>02</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select class="form-control">
										<option>Năm</option>
										<option>2001</option>
										<option>2002</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Cấp bậc</label>
								<div class="col-sm-6">
									<select class="form-control">
										<option>Giám đốc</option>
										<option>Nhân viên</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Mô tả công việc</label>
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