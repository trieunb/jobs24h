<?php include('header.php'); ?>
	<div class="container">
		<?php include('breadcrumb.php'); ?>
	</div>
	<section class="main-content container">
			<div class="col-sm-5">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="customer-review carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="assets/images/customer.png" alt="...">
				      <div class="carousel-caption">
				        <span class="caption"><h3>LINH NGUYEN</h3> Founder & CEO at Dale Carnegie Vietnam</span>
				      </div>
				      <span class="opinion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      consequat.</span>
				    </div>
				    <div class="item">
				      <img src="assets/images/customer.png" alt="...">
				      <div class="carousel-caption">
				        <span class="caption"><h3>LINH NGUYEN</h3> Founder & CEO at Dale Carnegie Vietnam</span>
				      </div>
				      <span class="opinion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      consequat.</span>
				    </div>
				    <div class="item">
				      <img src="assets/images/customer.png" alt="...">
				      <div class="carousel-caption">
				        <span class="caption"><h3>LINH NGUYEN</h3> Founder & CEO at Dale Carnegie Vietnam</span>
				      </div>
				      <span class="opinion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      consequat.</span>
				    </div>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <img src="assets/images/pre.png">
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <img src="assets/images/next.png">
				    <span class="sr-only">Next</span>
				  </a>
				</div>	
				<div class="faq clearfix">
				<p><img src="assets/images/faq.png"> Bạn đã có tài khoản? <a href="" class="text-blue decoration">Đăng nhập tại đây</a></p>
				<span>Hoặc đăng nhập bằng: 
						<a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-face"></i>
	                    	<i class="fa fa-facebook fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-google-plus"></i>
	                    	<i class="fa fa-google-plus fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-linkedin"></i>
	                    	<i class="fa fa-linkedin fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-yahoo"></i>
	                    	<i class="fa fa-yahoo fa-stack-1x text-white"></i>
	                    </span></a>
	            </span>
	            </div>
			</div>
			<div class="col-sm-6 pull-right">
				<h2 class="text-orange">Đăng Ký Thành Viên</h2>
				<form action="" method="POST" role="form">
					<div class="form-group row">
						<div class="col-sm-6">
							<label for="">Họ-Tên lót<abbr>(*)</abbr></label>
							<input type="text" class="form-control" id="" required="required">
						</div>
						<div class="col-sm-6 ">
							<label for="">Tên<abbr>(*)</abbr></label>
							<input type="text" class="form-control" id="" required="required">
						</div>
					</div>
					<div class="form-group">
							<label for="">Email<abbr>(*)</abbr></label>
							<input type="email" class="form-control" id="" required="required">
					</div>
					<div class="form-group">
							<label for="">Mật khẩu<abbr>(*)</abbr></label>
							<input type="password" class="form-control" id="" required="required">
					</div>
					<div class="form-group">
							<label for="">Nhập lại mật khẩu<abbr>(*)</abbr></label>
							<input type="password" class="form-control" id="" required="required">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								Nhận email bản tin <a href="#" class="text-blue">vnjobs.vn</a>
							</label>
						</div>
					</div>
					<p><i class="fa fa-arrow-circle-o-right fa-1x"></i> Click Đăng ký, bạn đã đồng ý với <span class="text-red">Quy định bảo mật</span> và <span class="text-red">Thỏa thuận sử dụng</span> của <span class="text-blue">Vnjobs.vn</span></p>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
	</section>
<?php include('footer.php'); ?>