<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				<?php include('includes/menu-management-resume.php') ?>
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ỨNG VIÊN</span>
				</div>
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-orange">Cập nhật thư mục - hồ sơ ứng tuyển</h2>
					</div>
					<div class="filter">
						<p>Quý khách đã xem các hồ sơ này</p>
						<p class="h3"><strong>Chưa đăng ký xem hồ sơ</strong></p>
						<p class="h4 text-orange"><strong>Hồ sơ sắp hết hạn. Nhấn <a href="#" class="decoration text-orange">vào đây</a> để xem.</strong></p>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Tên ứng viên</th>
								<th>Tiêu đề hồ sơ</th>
								<th>Xem hồ sơ</th>
								<th>Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Hồ sơ 100CRM</td>
								<td><button type="button" class="btn btn-sm bg-orange">Thêm</button></td>
								<td>Hết hạn</td>
							</tr>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Hồ sơ 100CRM</td>
								<td><button type="button" class="btn btn-sm bg-orange">Thêm</button></td>
								<td>Hết hạn</td>
							</tr>
							<tr>
								<td><a href="#" class="text-blue decoration"><strong>Trần Anh Điệp</strong></a></td>
								<td>Hồ sơ 100CRM</td>
								<td><button type="button" class="btn btn-sm bg-orange">Thêm</button></td>
								<td>Hết hạn</td>
							</tr>
						</tbody>
					</table>
				</div>		
			</section>
		</div>
	</section>
<?php include('includes/footer.php'); ?>