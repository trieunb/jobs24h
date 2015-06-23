<div id="sidebar" class="sidebar responsive">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="{{ HTML::active(['admin.settings.*']) }}">
						<a href="{{ URL::route('admin.dashboard') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Quản lý chung
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
										Cài đặt 01
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Cài đặt 02
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Cài đặt 03
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Cài đặt 04
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
										Menu Cấp 3
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>
												Menu cấp 4
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="{{ HTML::active(['admin.users.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Quản trị viên </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin.users.index']) }}">
								<a href="{{ URL::route('admin.users.index') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin.users.create']) }}">
								<a href="{{ URL::route('admin.users.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Thêm mới
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="{{ HTML::active(['admin.jobseekers.*', 'admin.resumes.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Người tìm việc </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ URL::route('admin.jobseekers.index') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ URL::route('admin.jobseekers.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin.resumes.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Hồ sơ
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="{{ URL::route('admin.resumes.index') }}">
											<i class="menu-icon fa fa-plus purple"></i>
											Danh sách
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="{{ URL::route('admin.resumes.create') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Thêm hồ sơ
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="{{ HTML::active(['admin.employers.*', 'admin.jobs.*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Nhà tuyển dụng </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ URL::route('admin.employers.index') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ URL::route('admin.employers.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Thêm mới
								</a>
								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin.jobs.*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Tin tuyển dụng
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="{{ URL::route('admin.jobs.index') }}">
											<i class="menu-icon fa fa-plus purple"></i>
											Danh sách
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="{{ URL::route('admin.jobs.create') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Thêm tin tuyển dụng
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
						</ul>
					</li> <!-- end ntd -->

					<!--start training-->
					<li class="{{ HTML::active(['admin/training/*','admin/training/*']) }}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Đào tạo </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{ HTML::active(['admin/training/']) }}">
								<a href="{{ URL::to('admin/training/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Chương trình đào tạo
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{ HTML::active(['admin/training/post/*']) }}">
								<a href="{{ URL::to('admin/training/post') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Tin tức 
								</a>
								<b class="arrow"></b>
							</li>

							<li class="{{ HTML::active(['admin/training/document/*']) }}">
								<a href="{{ URL::to('admin/training/document') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Tài liệu
								</a>
								<b class="arrow"></b>
							</li>


							<li class="{{ HTML::active(['admin/training/people/*']) }}">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
										Giảng viên và học viên
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="{{ HTML::active(['admin/training/people/*']) }}">
										<a href="{{ URL::to('admin/training/people/1') }}">
											<i class="menu-icon fa fa-plus purple"></i>
											Giảng viên
										</a>

										<b class="arrow"></b>
									</li>

									<li class="{{ HTML::active(['admin/training/people/*']) }}">
										<a href="{{ URL::to('admin/training/people/2') }}">
											<i class="menu-icon fa fa-eye pink"></i>
											Học viên
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
						</ul>
					</li><!--end- traning-->



				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>