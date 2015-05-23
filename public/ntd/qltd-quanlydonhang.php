<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				<?php include('includes/widget-details-order.php') ?>
				<?php include('includes/widget-support.php') ?>
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ĐƠN HÀNG</span>
				</div>
				<div class="box">
					<div class="heading-image">
						<h2 class="text-blue"><img src="assets/images/folder-lg-2.png">Chi tiết đơn hàng</h2>
					</div>
					<table class="table table-blue-bordered table-bordered">
						<thead>
							<tr>
								<th class="col-sm-1">Số đơn hàng</th>
								<th class="col-sm-3">Gói dịch vụ</th>
								<th class="col-sm-1">Số lượng</th>
								<th class="col-sm-1">Còn lại</th>
								<th class="col-sm-2">Ngày bắt đầu kích hoạt</th>
								<th class="col-sm-2">Ngày kết thúc kích hoạt</th>
								<th class="col-sm-2">Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span class="text-blue">15031229</span></td>
								<td>Tìm hồ sơ ứng viên RD 50CV
								<p><a class="text-blue"><i class="fa fa-plus-square-o"></i>&nbsp; Xem chi tiết</a></p>
								</td>
								<td>50</td>
								<td>30</td>
								<td>25-03-2015</td>
								<td>19-03-2016</td>
								<td>Đã kích hoạt</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</section>
<?php include('includes/footer.php') ?>