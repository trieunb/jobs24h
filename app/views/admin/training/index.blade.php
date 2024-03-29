@extends('layouts.admin')
@section('content')
	<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									VNJOBS - ĐÀO TẠO
									
								</div>
								<div class="row">
									<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												
												<i class="ace-icon fa fa-bank"></i>
											</div>

											<div class="infobox-data">
												<a href="{{URL::to('admin/training/all-couser')}}">
													<div class="infobox-content">Tổng số khóa học</div>
													<span class="infobox-data-number">{{ $total_khoahoc }}</span>
												</a>
											</div>

											<!-- <div class="stat stat-success">8%</div> -->
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-file-pdf-o"></i>
											</div>

											<div class="infobox-data">
												<a href="{{URL::to('admin/training/document')}}">
													<div class="infobox-content">Tổng số tài liệu</div>
													<span class="infobox-data-number">{{ $total_doc }}</span>
												</a>
											</div>

											<!-- <div class="badge badge-success">
												+32%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div> -->
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<a href="{{URL::to('admin/training/people/1')}}">
													<div class="infobox-content">Tổng số giảng viên</div>
													<span class="infobox-data-number">{{ $total_gv }}</span>
												</a>
											</div>
											<!-- <div class="stat stat-important">4%</div> -->
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-child"></i>
											</div>

											<div class="infobox-data">
												
												<div class="infobox-content">Tổng số học viên</div>
												<span class="infobox-data-number">{{ $total_hv }}</span>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-calendar-o"></i>
											</div>

											<div class="infobox-data">
												<a href="{{URL::to('admin/training/people/2')}}">
													<div class="infobox-content">Học viên đăng ký mới</div>
													<span class="infobox-data-number">{{$total_hv_new}}</span>
												</a>
											</div>

											<!-- <div class="badge badge-success">
												7.2%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div> -->
										</div>

										

										<div class="space-6"></div>

										<!-- <div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="61" data-size="39" style="height: 39px; width: 39px; line-height: 38px;">
													<span class="percent">61</span>%
												<canvas height="39" width="39"></canvas></div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Task</div>
												<div class="infobox-content">Completion</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Earnings</div>
												<div class="infobox-content">$32,000</div>
											</div>
										</div>

										<div class="infobox infobox-grey infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-download"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Downloads</div>
												<div class="infobox-content">1,205</div>
											</div>
										</div> -->
									</div> <!-- end .col-sm-12 -->
									
								</div>
@stop

