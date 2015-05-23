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
						<p>Chú ý: quý khách chỉ xóa được các thư mục không chứa hồ sơ</p>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Ngày tạo</th>
								<th>Tên thư mục</th>
								<th>Tổng số bài đăng</th>
								<th>Chỉnh sửa</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>23-05-2015</td>
								<td>Thư mục 1</td>
								<td>30</td>
								<td><a><i class="fa fa-edit"></i></a></td>
							</tr>
							<tr>
								<td>23-05-2015</td>
								<td>Thư mục 1</td>
								<td>30</td>
								<td><a><i class="fa fa-edit"></i></a></td>
							</tr>
						</tbody>
					</table>
					<button type="button" class="btn btn-lg bg-orange">Tạo hồ sơ mới</button>
				</div>		
			</section>
		</div>
	</section>
<?php include('includes/footer.php'); ?>