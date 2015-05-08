<?php include('header.php'); ?>
	<div class="container">
		<div class="col-sm-8">
			<?php include('breadcrumb.php'); ?>	
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				<img src="assets/images/ruibu.jpg" class="avatar">
				<strong><em>Hi, Anh Điệp</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				<?php include('menu_ntv.php'); ?>
			</nav>
		</div>
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
				<div class="box">
					<div class="col-sm-3">
						<div class="avatar">
							<img src="assets/images/ruibu.jpg">
						</div>
					</div>
					<div class="col-sm-9">
						<div class="profile">
							<h2>Trần Anh Điệp</h2>
							<p>Điện thoại: <span class="text-blue">0913658679</span></p>
							<p>Email: <span class="text-blue">dieptrananh@gmail.com</span></p>
							<p>Hồ Sơ: <a href="#" class="text-blue" target="_blank">http://www.vnjobs.com/myjobs/tran.diep.4</a></p>
						</div>
					</div>
					<div class="clearfix"></div>
						<div class="complete-profile col-sm-8">
							<div class="col-sm-5">
								<div class="progress-radial progress-70">
			  						<div class="overlay">25%</div>
								</div>
								<span class="text-orange">Hồ sơ chưa hoàn tất</span>
							</div>
							<div class="col-sm-7 ">
								<a href="#"><i class="glyphicon glyphicon-search"></i>Cho phép tìm kiếm hồ sơ này</a>
							</div>
						</div>
						<div class="print-trash col-sm-4">
							<a href="#"><i class="glyphicon glyphicon-print"></i></a>	
							<a href="#"><i class="glyphicon glyphicon-trash"></i></a>	
							<button class="btn btn-lg bg-orange">Đăng Hồ Sơ</button>
						</div>
				</div><!-- Box -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin cá nhân</h2> 
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="" placeholder="DD/MM/YYYY">
								</div>
								<label for="" class="col-sm-3 control-label">Giới tính<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											<input type="radio" name="sex" id="input" value="" checked="checked">
											Nam
										</label>
										<label>
											<input type="radio" name="sex" id="input" value="" >
											Nữ
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-3">
									<div class="radio">
										<label>
											<input type="radio" name="maried-status" id="input" value="" checked="checked">
											Độc thân
										</label>
										<label>
											<input type="radio" name="maried-status" id="input" value="" >
											Đã kết hôn
										</label>
									</div>
								</div>
								<label for="" class="col-sm-3 control-label">Quốc tịch<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="radio">
										<select class="selectpicker form-control">
											<option>- Vui lòng chọn -</option>
									    	<option>Việt Nam</option>
									    	<option>Irac</option>
									    	<option>Iran</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Địa chỉ</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quốc gia</label>
								<div class="col-sm-3">
									<select class="selectpicker form-control">
										<option>Việt Nam</option>
									    <option>Việt Nam</option>
									</select>
								</div>
								<label for="" class="col-sm-3 control-label">Tỉnh/Thành phô<abbr>*</abbr></label>
								<div class="col-sm-3">
									<div class="radio">
										<select class="selectpicker form-control">
											<option>- Vui lòng chọn -</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quận huyện</label>
								<div class="col-sm-3">
									<div class="radio">
										<select class="selectpicker form-control">
											<option>- Vui lòng chọn -</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
									    	<option>Đà Nẵng</option>
										</select>
									</div>
								</div>
								<label for="" class="col-sm-3 control-label">Điện thoại</label>
								<div class="col-sm-3">
									<input type="text" name="" id="input" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
									<div class="checkbox col-sm-offset-2 col-sm-10">
										<label>
											<input type="checkbox" value="">
											Ẩn thông tin này với nhà tuyển dụng
										</label>
									</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
										<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
										<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						</form>
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin chung</h2> 
						<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
					</div>
					<form action="" method="POST" role="form" class="form-horizontal">
						<div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm<abbr>*</abbr></label>
			                <div class="col-sm-3">
			                    <input type="text" class="form-control" maxlength="2" placeholder="Ví dụ: 7" value="" autofocus="" required="required">
			                </div>
			                <div class="col-sm-6">
			                    <div class="checkbox">
			                    	<label>
			                    		<input type="checkbox" value="">
			                    		  Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
			                    	</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Bằng cấp cao nhất<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option>-- Vui lòng chọn --</option>
			            		</select>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Ngoại ngữ<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option value="">-- Vui lòng chọn --</option>
			            		</select>
			            		<a href="#" class="text-blue"><i class="fa fa-plus-circle"></i> Thêm mới</a>
			            	</div>
			            	<label class="col-sm-3 control-label">Chứng chỉ liên quan<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option value="">-- Vui lòng chọn --</option>
			            		</select>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công ty gần đây nhất</label>
			            	<div class="col-sm-3">
			            		<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
			            	</div>
			            	<label class="col-sm-3 control-label">Trình độ</label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option value="">-- Vui lòng chọn --</option>
			            		</select>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công việc gần đây nhất</label>
			            	<div class="col-sm-3">
			            		<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option value="">-- Vui lòng chọn --</option>
			            		</select>
			            	</div>
			            </div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Vị trí mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<select name="" id="input" class="form-control">
			            			<option value="">-- Vui lòng chọn --</option>
			            		</select>
			            	</div>
			            </div>
			            <div class="form-group">
				            <label class="col-sm-3 control-label">Nơi làm việc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control">
				            			<option>-- Vui lòng chọn --</option>
				            		</select>
				            		<small class="legend">(Tối đa 3 địa điểm mong muốn)</small>
			            		</div>
			            	<label class="col-sm-3 control-label">Ngành nghề<abbr>*</abbr></label>
			            	<div class="col-sm-3">
			            		<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn<abbr>*</abbr></label>
							<div class="radio col-sm-3">
			                	<div for="specific-salary">
			                    	<input type="radio" value="1" id="specific-salary" name="specific-salary">
			                        <input type="text" maxlength="5" class="form-control edit-control" placeholder="Ví dụ: 5000" value="" id="specific-salary-input" disabled="">
			                    	<span>USD / tháng</span>
			                    </div>
							</div>
			                <div class="radio col-sm-4">
			                    <input type="radio" checked="checked" value="2" name="specific-salary">
			                        <span>Thương lượng </span>
			                </div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
								<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>	
					</form>
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Hồ sơ / Mục tiêu nghề nghiệp</h2>
					</div>
					<label><abbr>*</abbr> Giới Thiệu Bản Thân Và Miêu Tả Mục Tiêu Nghề Nghiệp Của Bạn</label>
					<form action="" method="POST" role="form">
						<div class="form-group">
							<textarea class="form-control" id="myTextarea" rows="5" maxlength="5000"></textarea>
							<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
								<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					</form>
				</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>
						</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Chức danh<abbr>*</abbr></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Công ty<abbr>*</abbr></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Từ tháng<abbr>*</abbr></label>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng<abbr>*</abbr></label>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
								<div class="col-sm-3">
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
											Công việc hiện tại
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
				            	<label class="col-sm-3 control-label">Lĩnh vực<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control">
				            			<option value="">-- Vui lòng chọn --</option>
				            		</select>
				            	</div>
				            	<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control">
				            			<option value="">-- Vui lòng chọn --</option>
				            		</select>
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-3 control-label">Cấp bậc<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control">
				            			<option value="">-- Vui lòng chọn --</option>
				            		</select>
				            	</div>
				            	<label class="col-sm-3 control-label">Mức lương</label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control">
				            			<option value="">-- Vui lòng chọn --</option>
				            		</select>
				            	</div>
				            </div>
				            <div class="form-group">
				            	<label class="col-sm-3 control-label">Mô tả</label>
				            	<div class="col-sm-9">
									<textarea class="form-control" id="myTextarea" rows="5" maxlength="5000"></textarea>
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
								<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						</form>
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
						</div>
						<form action="" method="POST" role="form" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-9">
				            		<input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Ví dụ: Kinh doanh quốc tế">
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Ví dụ: Đại học Kinh Tế Tp.Hồ Chí Minh">
				            	</div>
				            	<label class="col-sm-3 control-label">Bằng cấp<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control" required="required">
				            			<option value="">- Vui lòng chọn -</option>
				            			<option value="">Tiểu học/THCS</option>
				            			<option value="">Tiểu học/THCS</option>
				            			<option value="">Tiểu học/THCS</option>
				            			<option value="">Tiểu học/THCS</option>
				            			<option value="">Tiểu học/THCS</option>
				            		</select>
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-3">
				            		<input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Ví dụ: 09/2008">
				            	</div>
				            	<label class="col-sm-3 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		<input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Ví dụ: 04/2012">
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<select name="" id="input" class="form-control" required="required">
				            			<option value="">- Vui lòng chọn -</option>
				            		</select>
				            	</div>
								<label class="col-sm-3 control-label">Chuyên ngành<abbr>*</abbr></label>
				            	<div class="col-sm-3">
				            		<input type="text" name="" id="input" class="form-control" value="" required="required" >
				            	</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									<textarea class="form-control" id="myTextarea" rows="5" maxlength="5000"></textarea>
									<em class="text-gray-light"><span class="countdown">5000</span> ký tự có thể nhập thêm</em>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
									<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
									<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
								</div>
							</div>
						</form>
					</div><!-- rows -->
				</div><!-- boxed -->
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kỹ năng</h2>
						</div>
						<label>Thêm kỹ năng nghề nghiệp đề nhận được những đề nghị công việc phù hợp hơn</label>
						<div class="box">
							<div id="tags-edit">
								<span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
                                <span class="tag-xs" title="Developer">
	                                <span class="tag-name">Developer</span>
	                                	<a class="ic-close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
	                                <input class="input-tag-name" type="hidden" name="" data-tag-name="Developer">
                                </span>
							</div>
						</div>
						<div class="add-new-tag">
							<div class="row">
								<div class="col-sm-10">
									<input type="text" name="" id="key-skills" class="form-control input-sm" value="" placeholder="Hãy điền thông tin về lĩnh vực chuyên môn của bạn">
								</div>
								<button type="button" class="btn btn-default col-sm-2 btn-sm" id="btn-add-tag">Thêm</button>
							</div>
							<div class="clearfix push-top-sm">
								<a class="text-blue pull-left what-is-this-skill-section clickable" data-toggle="popover"  data-content="<p>Ngay bây giờ bạn có thể làm giàu hồ sơ của mình bằng cách <strong>thêm các kỹ năng nghề nghiệp</strong>.</p> Kỹ năng sẽ giúp chúng tôi rất nhiều trong việc <strong>đề xuất việc làm phù hợp nhất với bạn</strong> (dựa vào giải thuật về <strong>Điểm số phù hợp</strong> sẽ được cập nhật trong thời gian tới).">Thêm kỹ năng là gì?</a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" class="btn btn-lg bg-gray-light">Hủy</button>
								<button type="submit" class="btn btn-lg bg-orange">Lưu</button>
								<span>(<span class="text-red">*</span>) Thông tin bắt buộc</span>
							</div>
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
	</section>
	<aside id="sidebar" class="col-sm-3 pull-right">
				<div class="col-sm-12 card-item alert-warning">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-orange"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-orange"></i>
	                    	<i class="fa fa-user fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Hồ Sơ/Mục Tiêu Nghề Nghiệp</h4>
	                </div>
	                <div class="col-sm-2 box-label warning"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-info">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-blue"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-blue"></i>
	                    	<i class="fa fa-bank fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Kinh Nghiệm Làm Việc</h4>
	                </div>
	                <div class="col-sm-2 box-label primary"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-success">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-green"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-green"></i>
	                    	<i class="fa fa-graduation-cap fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Học Vấn Và Bằng Cấp</h4>
	                </div>
	                <div class="col-sm-2 box-label success"><strong>10%</strong></div>
	            </div> 
	            <div class="col-sm-12 card-item alert-danger">
					<div class="col-sm-1 col-xs-1">
	                	<div class="row">
	                        <a href="#" class="card-button bg-red"><i class="glyphicon glyphicon-plus"></i></a>
	                    </div>
	                </div>
	                <div class="col-sm-2 col-xs-2 box-sm">
	                	<span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-red"></i>
	                    	<i class="fa fa-info fa-stack-1x text-white"></i>
	                    </span>
	                </div>
	                <div class="col-sm-7 col-xs-9 box-sm">
						<h4>Thông Tin Tham Khảo</h4>
	                </div>
	                <div class="col-sm-2 box-label danger"><strong>10%</strong></div>
	            </div> 
				<div class="widget row">
					<h3>Cẩm nang nghề nghiệp</h3>
					<ul>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/example.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">Làm sếp khó hay dễ?</a>
								<p>Bạn đang mong chờ môt "cú hích", một sự thay đổi</p>
							</div>
						</li>
					</ul>
				</div>
		</aside>
	</section>

<?php include('footer.php'); ?>