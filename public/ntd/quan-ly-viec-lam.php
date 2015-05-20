<?php include "includes/header.php"; ?>
						<div class="col-xs-12 main-content">
							<div class="col-xs-3 sidebar">
								<h3 class="sidebar-title">Tuyển dụng</h3>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Đang hiển thị</a>
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Sắp hết hạn trong 7 ngày</a>
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Danh sách chờ</a>
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Tạm ngưng nhận hồ sơ</a>
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Hết hạn đăng tuyển</a>
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										<a href="#">Tất cả việc làm</a>
									</span>
								</div>
							</div>
							<div class="col-xs-9 primary">
								<div class="panel panel-default sub-panel">
									<div class="panel-heading">
										<h2>Danh sách vị trí chờ đăng tuyển</h2>
									</div>
									<div class="panel-body">
										<table class="table table-hover table-stripped">
											<thead>
												<tr>
													<th>&nbsp;</th>
													<th>Chức danh</th>
													<th>Mã số</th>
													<th>Ngành</th>
													<th>Nơi làm việc</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="checkbox">
															<input type="checkbox" value="">
															<label>
																<span></span>
															</label>
														</div>
													</td>
													<td>Nhân viên kinh doanh</td>
													<td>53468</td>
													<td>-Bán hàng<br>-Dịch vụ<br>-Marketing</td>
													<td>-Hà Nội<br>-Hồ Chí Minh</td>
												</tr>
											</tbody>
										</table>
										<button type="button" class="btn btn-default">Đăng tuyển</button>
										<button type="button" class="btn btn-default">Ngừng đăng</button>
										<button type="button" class="btn btn-default">Đăng lại</button>
										<button type="button" class="btn btn-default">Sao chép</button>
										<button type="button" class="btn btn-default">Xóa</button>
										<div class="clearfix"></div>
										<ul class="pagination pull-right">
											<li><a href="#">&laquo;</a></li>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">&raquo;</a></li>
										</ul>
									</div>
								</div>

								<div class="panel panel-default sub-panel">
									<div class="panel-heading">
										<h2>Tìm tuyển dụng của tôi</h2>
									</div>
									<div class="panel-body">
										<form action="" method="POST" class="form-horizontal" role="form">
											<div class="form-group">
												<label for="inputKeyword" class="col-sm-2 control-label">Từ khóa:</label>
												<div class="col-sm-10">
													<input type="text" name="keyword" id="inputKeyword" class="form-control" value="" required="required" pattern="" title="">
												</div>
											</div>
											<div class="form-group">
												<label for="inputKeyword" class="col-sm-2 control-label">Ngành nghề:</label>
												<div class="col-sm-10">
													<select name="" id="input" class="form-control" multiple="multiple">
														<option value="">Bán hàng</option>
														<option value="">Bán hàng kĩ thuật</option>
														<option value="">Bán lẻ / bán sỉ</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="inputNoilamviec" class="col-sm-2 control-label">Nơi làm việc:</label>
												<div class="col-sm-10">
													<select name="noilamviec" id="inputNoilamviec" class="form-control" required="required">
														<option value="">Tất cả</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1">
													<div class="checkbox">
														<input type="checkbox" id="s1" value="">
														<label for="s1">
															<span></span>
								
														</label>
													</div>
												</div>
												<label for="input" class="col-sm-3 control-label">Ngày đăng:</label>
												<div class="col-sm-3">
													<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
												<div class="col-sm-3">
													<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-1">
													<div class="checkbox">
														<input type="checkbox" id="s2" value="">
														<label for="s2">
															<span></span>
								
														</label>
													</div>
												</div>
												<label for="input" class="col-sm-3 control-label">Ngày hết hạn:</label>
												<div class="col-sm-3">
													<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
												<div class="col-sm-3">
													<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
												</div>
												<div class="col-sm-1">
													<i class="glyphicon glyphicon-calendar"></i>
												</div>
											</div>
												<div class="form-group">
													<div class="col-sm-10 col-sm-offset-2">
														<button type="submit" class="btn btn-primary">Tìm</button>
													</div>
												</div>
										</form>
									</div>
								</div>

							</div> <!-- primary -->
						</div> <!-- main-content -->
					<?php include "includes/footer.php" ?>