<?php include('header.php'); ?>
	<div class="container">
	<?php include('breadcrumb.php'); ?>
	</div>
	<section class="main-content container">
		<div class="boxed">

			<div class="rows">
			<div class="title-page">
				<h2>You are applying for Senior Data Analyst</h2>
			</div>
			<p>Employers prefer to receive your resume in English language</p>
			<div class="box">
				<div class="tag">Apply Job</div>
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-3">
							<div class="avatar">
								<img src="assets/images/ruibu.jpg">
							</div>
						</div>
						<div class="col-sm-5">
							<div class="profile">
							<h2>Trần Anh Điệp</h2>
							<p>Digital Marketing Manager tại Minh Phúc (MP Telecom)</p>
							<p>Hồ Chí Minh - Việt Nam</p>
							<p>Điện thoại: <span class="text-blue">091323333</span></p>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Chọn CV<abbr title="Trường này là bắt buộc">*</abbr></label>
						<div class="col-sm-5">
							<select name="" id="input" class="form-control selecpicker" required="required">
								<option value="">Select</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Cover letter<abbr title="Trường này là bắt buộc">*</abbr></label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="5"></textarea>
							<div class="checkbox col-sm-9 text-gray-light">
								<label>
									<input type="checkbox" value="" checked="checked">Save this cover letter for my later application
								</label>
							</div>
							<a href="#" class="text-blue small pull-right">Xem ví dụ</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Chọn CV</label>
						<div class="col-sm-8">
								<div class="fileUpload btn btn-warning col-sm-2">
								    <span>Chọn tệp tin</span>
								    <input id="uploadBtn" type="file" class="upload">
								</div>
								<div class="col-sm-5">
									<input id="uploadFile" placeholder="không có tệp nào được chọn" disabled="disabled" class="form-control col-sm-8">
								</div>
								<div class="clearfix"></div>
								<span class="small">Formats: MS Word, DPF, Image, Rar, Zip (2MB maximum)</span>
						</div>
					</div>
					<div class="col-sm-offset-3 col-sm-8">
						<button type="submit" class="btn btn-lg bg-dark">Hủy bỏ</button>
						<button type="submit" class="btn btn-lg bg-dark">Nộp đơn</button>
						<p><h3><abbr>*</abbr> Required field</h3></p>
					</div>
				</form>
			</div>
			</div>
		</div>
	</section>
<?php include('footer.php'); ?>
