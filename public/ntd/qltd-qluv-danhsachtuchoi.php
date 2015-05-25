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
						<h2 class="text-orange">Danh sách từ chối nhận hồ sơ</h2>
					</div>
					<div class="filter">
						<label>Quý khách có thể xóa ứng viên khỏi danh sách từ chôi</label>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Tên ứng viên</th>
								<th>Email đăng nhập</th>
								<th>Ngày cập nhật</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="3">Bạn chưa có hồ sơ nào trong thư mục này.</td>
							</tr>
						</tbody>
					</table>
				</div>		
			</section>
		</div>
	</section>
<?php include('includes/footer.php'); ?>