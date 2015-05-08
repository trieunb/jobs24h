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
						<h2>Đánh giả bản thân</h2> 
					</div>
					<div class="box">
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-2  control-label">Tóm lược</label>
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