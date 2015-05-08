
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
					<h2>Mục tiêu nghề nghiệp</h2> 
				</div>
				<div class="box">
					<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Vị trí mong muốn</label>
								<div class="col-sm-6">
									<input type="text" name="" id="input" class="form-control" value="" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Cấp bậc mong muốn</label>
								<div class="col-sm-3">
									<select class="selectpicker form-control">
								    	<option>-- Lựa chọn --</option>
								    	<option>Nhân viên</option>
								    	<option>Giám đốc</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nơi làm việc</label>
								<div class="col-sm-3">
									<select class="selectpicker form-control">
								    	<option>Hồ Chí Minh</option>
								    	<option>Hà Nội</option>
								    	<option>Đà Nẵng</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ngành nghề</label>
								<div class="col-sm-3">
									<select class="selectpicker form-control">
								    	<option>Kế toán</option>
								    	<option>Kế toán</option>
								    	<option>Kế toán</option>
									</select>
								</div>
							</div>
							<div class="form-group">
				                <label class="col-sm-2 control-label">Mức lương mong muốn</label>
								<div class="radio col-sm-2">
				                	<div for="specific-salary">
				                    	<input type="radio" value="1" id="specific-salary" name="specific-salary">
				                        <input type="text" maxlength="5" class="form-control edit-control" placeholder="Ví dụ: 5000" value="" id="specific-salary-input" disabled="">
				                    	<span>USD / tháng</span>
				                    </div>
								</div>
				                <div class="radio col-sm-4">
				                    <input type="radio" checked="checked" value="2" name="specific-salary">
				                        <span>Thương lượng </span>
				                </div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Định hướng nghề nghiệp</label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="5" id="comment"></textarea>
									<small class="legend">(Mong muốn của bạn về công việc tương lai, bao gồm mục tiêu ngắn hạn và mục tiêu dài hạn.)</small>
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