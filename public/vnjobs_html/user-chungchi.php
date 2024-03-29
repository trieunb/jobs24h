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
						<h2>Chứng chỉ</h2> 
					</div>

						<form action="" method="POST" role="form" class="form-horizontal">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th>Chứng chỉ</th>
										<th class="col-sm-2">Năm hoàn thành</th>
										<th class="col-sm-3">Hoạt động</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Chứng nhận Kế toán tổng hợp</td>
										<td>2014</td>
										<td>
											<a href=""><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="glyphicon glyphicon-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Chứng nhận Kế toán tổng hợp</td>
										<td>2014</td>
										<td>
											<a href=""><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="glyphicon glyphicon-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
									<tr>
										<td>Chứng nhận Kế toán tổng hợp</td>
										<td>2014</td>
										<td>
											<a href=""><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a> 
											<a href=""><i class="glyphicon glyphicon-trash"></i> Xóa bỏ</a>
										</td>
									</tr>
								</tbody>
							</table>		
						</form>

				</div>
				<div class="rows">
					<div class="title-page">
						<h2>Thêm chứng chỉ</h2> 
					</div>
					<div class="box">
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Tên khóa học</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Năm hoàn thành</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Mô tả khóa học</label>
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