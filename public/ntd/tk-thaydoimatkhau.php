<?php include('includes/header.php') ?>
	<?php include('includes/menu-tab.php') ?>
	<section class="main-content">
		<div class="panel panel-default panel-sm">
			<div class="panel-heading">
			<div class="heading-form">
				<h2>Thay đổi mật khẩu</h2>
				<span class="pull-right">(<span class="text-red">*</span>) Thông tin bắt buộc</span>
			</div>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">Email truy cập hiện tại:</label>
						<div class="col-sm-7">
							<label class="control-label">vndesign09@gmail.com</label>
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập mật khẩu hiện tại:</label>
						<div class="col-sm-7">
							<input type="password" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập mật khẩu mới:</label>
						<div class="col-sm-7">
							<input type="password" name="" id="input" class="form-control">
						</div>
						<div class="col-sm-1">
							<abbr class="question" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-question "></i></abbr>
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập lại khẩu mới:</label>
						<div class="col-sm-7">
							<input type="password" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<img src="assets/images/capcha.jpg">
						</div>
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Mã bảo vệ:</label>
						<div class="col-sm-7">
							<input type="password" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<button type="submit" class="btn btn-lg bg-blue">LƯU</button>
							<button type="button" class="btn btn-lg bg-blue">HỦY</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
<?php include('includes/footer.php') ?>