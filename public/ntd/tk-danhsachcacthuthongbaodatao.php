<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				<?php include('includes/widget-account-info.php') ?>
				<?php include('includes/widget-sample-email.php') ?>
			</aside>
			<section id="content" class="pull-right right">
					<div class="heading-image">
						<h2 class="text-blue"><img src="assets/images/email.png">Danh sách các thư thông báo đã tạo</h2>
					</div>
					<label>Quý khách tạo và sử dụng email mẫu để tiết kiệm thời gian với ứng viên!</label>
					<div class="filter">
						<span class="pull-right">
							<span>Người tạo</span>
							<select name="" id="input" class="form-control" required="required">
								<option value="">Trịnh Ngọc Minh</option>
							</select>
						</span>
					</div>
					<table class="table table-blue-bordered table-bordered">
						<thead>
							<tr>
								<th><input type="checkbox" value=""></th>
								<th>Ngày tạo</th>
								<th>Tiêu đề thư</th>
								<th>Loại</th>
								<th>Trạng thái</th>
								<th>Người tạo</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" value=""></td>
								<td>15/11/2010</td>
								<td>Thư xin việc</td>
								<td>Cá nhân</td>
								<td><img src="assets/images/user-status.png"></td>
								<td>Trịnh Ngọc Minh</td>
								<td><a class="view"><img src="assets/images/view.png"></a>
								<a class="edit"><img src="assets/images/edit.png"></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" value=""></td>
								<td>15/11/2010</td>
								<td>Thư xin việc</td>
								<td>Cá nhân</td>
								<td><img src="assets/images/user-status.png"></td>
								<td>Trịnh Ngọc Minh</td>
								<td><a class="view"><img src="assets/images/view.png"></a>
								<a class="edit"><img src="assets/images/edit.png"></a>
								</td>
							</tr>
						</tbody>
					</table>
					<button type="button" class="btn btn-lg bg-orange">Tạo Thư Mới</button>
					<button type="button" class="btn btn-lg bg-blue">Xóa Thư</button>
			</section>
		</div>
	</section>
<?php include('includes/footer.php') ?>