<?php include('header.php'); ?>
	<div class="container">
	<?php include('breadcrumb.php'); ?>
	</div>
	<section class="main-content container">
		<div class="boxed">

			<div class="rows">
			<div class="title-page">
				<h2>Công việc ứng tuyển</h2>
			</div>
			<div class="box">
				<div class="tag">Apply Job</div>
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-2">Fullname</label>
						<div class="col-sm-2">
							<select name="" id="input" class="form-control">
								<option value="">-- Select --</option>
							</select>
						</div>
						<div class="col-sm-3">
							<input type="text" name="" id="input" class="form-control" value="" placeholder="First Name">
						</div>
						<div class="col-sm-3">
							<input type="text" name="" id="input" class="form-control" value="" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Headline</label>
						<div class="col-sm-5">
							<input type="text" name="" id="input" class="form-control">
							<small class="legend">Senior manager at a multinational corporation</small>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email</label>
						<div class="col-sm-5">
							<input type="email" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Contact phone</label>
						<div class="col-sm-5">
							<input type="number" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Live in</label>
						<div class="col-sm-3">
							<input type="text" name="" id="input" class="form-control">
						</div>
						<div class="col-sm-2">
							<input type="text" name="" id="input" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Cover letter</label>
						<div class="col-sm-5">
							<textarea rows="5" name="" id="input" class="form-control"></textarea> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Resume</label>
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
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-lg bg-dark">Hủy bỏ</button>
						<button type="submit" class="btn btn-lg bg-dark">Nộp đơn</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</section>
<?php include('footer.php'); ?>
