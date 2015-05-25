<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				<?php include('includes/widget-account-info.php') ?>
				<?php include('includes/widget-sample-email.php') ?>
			</aside>
			<section id="content" class="pull-right right">
				<div class="box">
				<div id="management-users">
					<div class="heading-image">
						<h2 class="text-blue"><img src="assets/images/user.png">Danh Sách User</h2>
					</div>
					<label>Quý khách có thể tạo tối đa 2 user(s). Để có thể tạo thêm nhiều user phụ và nhiều thông tin công ty con, vui lòng <a href="#" class="text-blue">liên hệ với chúng tôi.</a></label>
					<span class="pull-right">Hiện có: <span class="text-orange">1</span> user(s)</span>
					<table class="table table-blue-bordered table-bordered">
						<thead>
							<tr>
								<th class="col-sm-1">Ngày</th>
								<th class="col-sm-3">Email đăng nhập</th>
								<th class="col-sm-2">họ và tên</th>
								<th class="col-sm-2">Tác vụ</th>
								<th class="col-sm-2">Trạng thái</th>
								<th class="col-sm-2">Loại User</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>15/11/2010</td>
								<td><span class="text-blue">abc@xyz.com</span></td>
								<td>Trịnh Ngọc Minh</td>
								<td><a href="#" class="text-blue"><img src="assets/images/preview.png"> Xem tác vụ</a></td>
								<td>Kích hoạt</td>
								<td>Chính</td>
							</tr>
							<tr>
								<td>15/11/2010</td>
								<td><span class="text-blue">abc@xyz.com</span></td>
								<td>Trịnh Ngọc Minh</td>
								<td><a href="#" class="text-blue"><img src="assets/images/preview.png"> Xem tác vụ</a></td>
								<td>Kích hoạt</td>
								<td>Chính</td>
							</tr>
						</tbody>
					</table>
					<button type="button" class="btn btn-lg bg-orange">Tạo User Phụ</button>
				</div>
				</div>
			</section>
		</div>
	</section>
<?php include('includes/footer.php') ?>