<?php include "includes/header.php"; ?>
						<div class="col-xs-12 main-content register-form">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="heading-title">
										<span>Đăng ký</span>
										<span class="pull-right content-required"><span class="text-required">*</span> Thông tin bắt buộc</span>
									</div>

								</div>
								<div class="panel-body">
								   <div class="col-xs-12 form-input">
								   		<form action="" method="POST" role="form" class="form-horizontal">
								   			<h3 class="form-legend">Thông tin đăng nhập</h3>
								   			<div class="form-group">
								   				<label for="inputEmail" class="col-sm-4 control-label">Email đăng nhập:</label>
								   				<div class="col-sm-8">
								   					<input type="email" name="email" id="inputEmail" class="form-control" value="">
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="inputEmail" class="col-sm-4 control-label">Xác nhận Email:</label>
								   				<div class="col-sm-8">
								   					<input type="email" name="confirm_email" id="inputEmail" class="form-control" value="">
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Mật khẩu:</label>
								   				<div class="col-sm-8">
								   					<input type="password" name="password" id="input" class="form-control" value="">
								   					<span class="pull-right">4-12 kí tự</span>
								   				</div>
								   			</div>
								   			
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Xác nhận mật khẩu:</label>
								   				<div class="col-sm-8">
								   					<input type="password" name="confirm_password" id="input" class="form-control" value="">
								   				</div>
								   			</div>
											
											<h3 class="form-legend">Thông tin đăng ký</h3>

								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Tên công ty:</label>
								   				<div class="col-sm-8">
								   					<input type="text" name="company" id="input" class="form-control" value="">
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Quy mô công ty <span class="nomal-text">(số nhân viên)</span>:</label>
								   				<div class="col-sm-8">
								   					<select name="quymo" id="inputQuymo" class="form-control" required="required">
								   						<option value=""></option>
								   						<option value="">1</option>
								   					</select>
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Sơ lược về công ty:</label>
								   				<div class="col-sm-8">
								   					<textarea name="" id="" class="form-control" rows="5"></textarea>
								   					<span class="pull-right">Số kí tự đã gõ: 0 (Tối đa 10,000 kí tự)</span>
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Địa chỉ công ty:</label>
								   				<div class="col-sm-8">
								   					<input type="text" name="address" id="input" class="form-control" value="">
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Tên người liên hệ:</label>
								   				<div class="col-sm-8">
								   					<input type="text" name="contact" id="input" class="form-control" value="">
								   				</div>
								   			</div>
											<div class="form-group">
								   				<div class="checkbox">
								   					<input type="checkbox" class="vnjob-checkbox" id="checkbox1" value="">
								   					<label for="checkbox1">
								   						<span></span>
								   						<i class="text-required">*</i> Tôi đã đọc và đồng ý với các <a href="#">Quy định bảo mật</a> và <a href="#">Quy định sử dụng</a>
								   					</label>
								   				</div>
								   			</div>

								   			<div class="clearfix"></div>
								   			<div class="">
								   				<button type="submit" class="btn btn-register btn-block btn-primary">ĐĂNG KÝ NGAY</button>
								   			</div>
								   		
								   			
								   		</form>
								   </div>
								</div>
							</div>
						</div>
					<?php include "includes/footer.php" ?>