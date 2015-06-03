<div class="report-resums">
						<div class="heading-image">
							<h2 class="text-blue">{{ HTML::image('assets/ntd/images/report-resume.png') }}Báo cáo xem hồ sơ</h2>
						</div>
						<div class="filter">
							<div>
							<span>Số lương hồ sơ còn lại: <span class="text-orange" id="remain">{{ $order->remain }}</span></span>
							<span class="pull-right">
								Ngày bắt đầu sử dụng: <span class="text-orange" id="start_date">{{ $order->created_date }}</span> 
								- Ngày hết hạn sử dụng: <span class="text-orange" id="end_date">{{ $order->ended_date }}</span>
							</span>
							</div>
						</div>
						<table class="table table-blue-bordered table-bordered">
							<thead>
								<tr>
									<th class="col-sm-6 text-align-center">Ngày Sử Dụng</th>
									<th class="col-sm-6 text-align-center">Số lượng hồ sơ Sử Dụng</th>
								</tr>
							</thead>
							<tbody class="text-align-center" id="result">
								@if(count($detail))
								@foreach($detail as $v)
								<tr>
									<td>{{ $v->day }}-{{ $v->month }}-{{ $v->year }}</td>
									<td>{{ $v->post_count }}</td>
								</tr>
								@endforeach
								@else 
									<tr>
										<td colspan="2">Không có dữ liệu</td>
									</tr>
								@endif
								
							</tbody>
						</table>
							<a class="text-blue decoration italic">{{ HTML::image('assets/ntd/images/excel.png') }}Chuyển danh sách sang file excel</a>
					</div>