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
						<h2>Trình độ ngoại ngữ</h2> 
					</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th class="col-sm-5">Ngoại ngữ</th>
										<th class="col-sm-4">Trình độ</th>
										<th class="col-sm-3">Hoạt động</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Tiếng Anh</td>
										<td>Trung cấp</td>
										<td>
											<a href=""><i class="fa fa-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="fa fa-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Tiếng Anh</td>
										<td>Trung cấp</td>
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
						<h2>Thêm trình độ ngoại ngữ</h2> 
					</div>
					<div class="box">
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Ngoại ngữ 1</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Tiếng Nhật</option>
										<option>Tiếng Hàn</option>
									</select>
								</div>
								<label for="" class="col-sm-2  control-label">Trình độ</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Sơ cấp</option>
										<option>Trung cấp</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Ngoại ngữ 1</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Tiếng Nhật</option>
										<option>Tiếng Hàn</option>
									</select>
								</div>
								<label for="" class="col-sm-2  control-label">Trình độ</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Sơ cấp</option>
										<option>Trung cấp</option>
									</select>
								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							    	<a href="#" class="text-blue"><i class="fa fa-plus-circle"></i> Thêm mới</a>
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