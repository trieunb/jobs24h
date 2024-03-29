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
					<h2>Thông tin cơ bản</h2> 
				</div>
				<div class="box">
					<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Họ và tên</label>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>Ông</option>
								    	<option>Bà</option>
									</select>
								</div>
								<div class="col-sm-2">
									<input type="text" name="" id="input" class="form-control" value="" placeholder="Họ">
								</div>
								<div class="col-sm-2">
									<input type="text" name="" id="input" class="form-control" value="" placeholder="Tên">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nghề nghiệp</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="" placeholder="Digital Marketing Manager at Minh Phuc (MP Telecom)">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ngày sinh</label>
								<div class="col-sm-1">
									<select class="selectpicker form-control">
								    	<option>DD</option>
								    	<option>01</option>
								    	<option>02</option>
									</select>
								</div>
								<span class="align-left">/</span>
								<div class="col-sm-1">
									<select class="selectpicker form-control">
								    	<option>MM</option>
								    	<option>01</option>
								    	<option>02</option>
									</select>
								</div>
								<span class="align-left">/</span>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>YYYY</option>
								    	<option>01</option>
								    	<option>02</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Quốc tịch</label>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>Việt Nam</option>
								    	<option>Irac</option>
								    	<option>Iran</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>Độc thân</option>
								    	<option>Đã kết hôn</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Sở thích</label>
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