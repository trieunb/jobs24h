<?php include('header.php'); ?>
	<div class="container">
		<div class="col-sm-8">
			<?php include('breadcrumb.php'); ?>	
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				<img src="assets/images/ruibu.jpg" class="avatar">
				<strong><em>Hi, David</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				<?php include('menu_ntv.php'); ?>
			</nav>
		</div>
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hạn chế công ty xem Hồ Sơ</h2>
				</div>
				<div class="box">
					<div id="tags-edit">
						<span class="tag-xs" title="Công ty TNHH Minh Phúc">
	                    	<span class="tag-name text-orange">Công ty TNHH Minh Phúc</span>
	                        	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                            <input class="input-tag-name" type="hidden" name="" data-tag-name="Công ty TNHH Minh Phúc">
                        </span>
					</div>
				</div>
				<div class="ban-company">
					<div class="row">
						<div class="col-sm-10">
							<input type="text" name="" id="hidden-company" class="form-control input-sm" value="" placeholder="Hãy nhập tên Công ty mà bạn muốn hạn chế xem hồ sơ">
						</div>
						<button type="button" class="btn btn-default col-sm-2 btn-sm" id="btn-add-company">Chặn</button>
					</div>
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Việc Làm Gợi Ý</h2>
				</div>
				<div id="searchresult">
				<ul>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>3000$</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-floppy-save"></i></a>
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-search"></i></a>
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-envelope"></i></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>3000$</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-floppy-save"></i></a>
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-search"></i></a>
									<a href="#" title="Lưu việc làm này"><i class="glyphicon glyphicon-envelope"></i></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
					</ul>
				</div>
				<a href="#" class="pull-right"><strong>Xem tất cả việc làm tương tự</strong></a>
			</div>
		</div>
	</section>
<?php include('footer.php'); ?>

