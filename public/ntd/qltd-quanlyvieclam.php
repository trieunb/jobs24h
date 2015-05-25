<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				<?php include('includes/widget-recruitment.php') ?>
			</aside>
			<section id="content" class="pull-right right">
				<div class="header-image">
					DS <span class="text-blue">VỊ TRÍ CHỜ ĐĂNG TUYỂN</span>
				</div>
				<div class="box bg-white">
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<th>Chức danh</th>
								<th>Mã số</th>
								<th>Ngành</th>
								<th>Nơi làm việc</th>
							</tr>
							<tr>
								<td>
									<input type="checkbox" value="">
									Nhân viên Kinh Doanh
								</td>
								<td>534868</td>
								<td>-Bán hàng<br>-Dịch vụ khách hàng<br>-Marketing</td>
								<td>Hồ Chí Minh<br>Hà Nội</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" value="">
									Nhân viên Kinh Doanh
								</td>
								<td>534868</td>
								<td>-Bán hàng<br>-Dịch vụ khách hàng<br>-Marketing</td>
								<td>Hồ Chí Minh<br>Hà Nội</td>
							</tr>
						</tbody>
					</table>
					<ul class="list-actions">
						<li class="active"><i class="fa fa-share-alt"></i>&nbsp;Đăng tuyển</li>
						<li><i class="fa fa-minus-circle"></i>&nbsp;Ngừng đăng</li>
						<li><i class="fa fa-play-circle-o"></i>&nbsp;Đăng lại</li>
						<li><i class="fa fa-play-edit"></i>&nbsp;Chỉnh sửa</li>
						<li><i class="fa fa-copy"></i>&nbsp;Sao chép</li>
						<li><i class="fa fa-trash-o"></i>&nbsp;Xóa</li>
					</ul>
					<ul class="pagination pull-right pagination-sm pagination-blue push-top">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>
				<div class="box find-my-recruitment">
					<div class="heading-image">
						<h2 class="text-blue"><img src="assets/images/search-lg.png">Tìm tuyển dụng của tôi</h2>
					</div>
					<form action="" method="POST" role="form" class="form-horizontal">
						<div class="form-group">
							<label for="input" class="col-sm-4 control-label">Từ khóa</label>
							<div class="col-sm-6">
								<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-4 control-label">Ngành nghề</label>
							<div class="col-sm-6">
								<div class="multi-checkbox push-padding-20-full">
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
									<p><input type="checkbox" value="">Checkbox</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-4 control-label">Nơi làm việc</label>
							<div class="col-sm-6">
								<select name="" class="form-control">
									<option value="">Tất cả</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-4 control-label"><input type="checkbox" value="">&nbsp;&nbsp;Ngày đăng</label>
							<div class="col-sm-3">
								<p>Từ</p>
								<div class="input-group date" id="">
					                <input class="form-control" data-date-format="YYYY-MM-DD"  type="text">
					                <span class="input-group-addon have-img">
					                   	<img src="assets/images/calendar.png">
					            	</span>
					            </div>
							</div>
							<div class="col-sm-3">
								<p>Đến</p>
								<div class="input-group date" id="">
					                <input class="form-control" data-date-format="YYYY-MM-DD"  type="text">
					                <span class="input-group-addon have-img">
					                   	<img src="assets/images/calendar.png">
					            	</span>
					            </div>
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-4 control-label"><input type="checkbox" value="">&nbsp;&nbsp;Ngày kết thúc</label>
							<div class="col-sm-3">
								<p>Từ</p>
								<div class="input-group date" id="">
					                <input class="form-control" data-date-format="YYYY-MM-DD"  type="text">
					                <span class="input-group-addon have-img">
					                   	<img src="assets/images/calendar.png">
					            	</span>
					            </div>
							</div>
							<div class="col-sm-3">
								<p>Đến</p>
								<div class="input-group date" id="">
					                <input class="form-control" data-date-format="YYYY-MM-DD"  type="text">
					                <span class="input-group-addon have-img">
					                   	<img src="assets/images/calendar.png">
					            	</span>
					            </div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-7">
								<button type="submit" class="btn btn-lg bg-orange">Tìm</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</section>
<?php include('includes/footer.php') ?>