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
					<h2>Thông tin liên hệ</h2> 
				</div>
				<div class="box">
					<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Quốc gia <abbr title="Đây là trường bắt buộc">(*)</abbr></label>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>Việt Nam</option>
								    	<option>Irac</option>
								    	<option>Iran</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Thành phố <abbr title="Đây là trường bắt buộc">(*)</abbr></label>
								<div class="col-sm-2">
									<select class="selectpicker form-control">
								    	<option>Hồ Chí Minh</option>
								    	<option>Hà Nội</option>
								    	<option>Đà Nẵng</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Địa chỉ</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Điện thoại liên lạc <abbr title="Đây là trường bắt buộc">(*)</abbr></label>
								<div class="col-sm-6">
									<input type="number" class="form-control" id="" placeholder="" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Điện thoại thay thế</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" id="" placeholder="">
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