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
						<h2>Tải hình ảnh hồ sơ cá nhân</h2> 
					</div>
					<div class="box">
						<div class="col-sm-3 text-align-center">
							<div class="avatar">
								<img src="assets/images/ruibu.jpg">
							</div>
							<a href="#"><i class="fa fa-trash-o"></i> Xóa ảnh</a>
						</div>
						<div class="col-sm-8 pull-right">
							<p>Bạn có thể tải lên một ảnh GIF, JPEG hoặc PNG. Kích thước tập tin được giới hạn 500KB</p>
							<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group col-sm-12">
								<div class="fileUpload btn btn-default col-sm-2">
								    <span>Chọn tệp tin</span>
								    <input id="uploadBtn" type="file" class="upload"  />
								</div>
								<div class="col-sm-6">
									<input id="uploadFile" placeholder="Choose File" disabled="disabled" class="form-control col-sm-6" />
								</div>
							</div>
							<p>Bằng cách nhấn vào "Upload hình ảnh", bạn xác nhận rằng bạn có quyền phân phối hình ảnh này và nó không vi phạm Điều khoản sử dụng thỏa thuận</p>
							<div class="form-group">
							    <div class="col-sm-12">
								    <button type="submit" class="btn btn-lg bg-orange">Lưu</button>
								    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							    </div>
							</div>
						</form>
						</div>
					</div><!-- Box -->
				</div>
			</div>
	</section>
<?php include('footer.php'); ?>