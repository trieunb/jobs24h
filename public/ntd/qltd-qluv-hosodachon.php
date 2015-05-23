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
						<h2 class="text-orange">Hồ sơ đã chọn</h2>
					</div>
					<div class="filter">
						<p>Quý khách đã lưu các hồ sơ sau</p>
						<label>Lưu ý: Hồ sơ sẽ không được hiển thị khi đăng ký Tìm hồ sơ của Quý khách hết hạn.</label>
						<p class="h4 text-orange"><strong>Hồ sơ sắp hết hạn. Nhấn <a href="#" class="decoration text-orange">vào đây</a> để xem.</strong></p>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Tên ứng viên</th>
								<th>Công việc mong muốn</th>
								<th>Ngày lưu</th>
								<th>Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4">Bạn chưa có hồ sơ nào trong thư mục này.</td>
							</tr>
						</tbody>
					</table>
				</div>		
			</section>
		</div>
	</section>
<?php include('includes/footer.php'); ?>