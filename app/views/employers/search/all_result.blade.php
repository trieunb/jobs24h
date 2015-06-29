<div id="result" class="@if(isset($result)) visible @else invisible @endif">
						@if(isset($result))
						<div class="col-xs-12 search-info">
							<div class="title-image">
								{{ HTML::image('assets/ntd/images/search-list.png') }}
							</div>
							<div class="info-text">
								<span>Tìm thấy {{ $result->getTotal() }} hồ sơ theo yêu cầu tìm kiếm.</span>
							</div>
							<div class="info-text">
								<span>Ngành nghề <strong>@if($input['category'] == 'all') Bất Kỳ @else {{ $cats[$input['category']] }} @endif</strong> 
								| Địa điểm: <strong>@if($input['location'] == 'all') Bất Kỳ @else {{ $locas[$input['location']] }} @endif</strong></span>
							</div>
						</div>
						<div class="pull-right">&nbsp;
							{{ $result->links() }}
						</div>
						<table class="table table-blue-bordered table-bordered table-result">
							<thead>
								<tr>
									<th class="col-sm-4">Ứng viên</th>
									<th class="col-sm-1">Kinh nghiệm</th>
									<th class="col-sm-1">Mức lương</th>
									<th class="col-sm-2">Nơi làm việc</th>
									<th class="col-sm-2">Cập nhật</th>
								</tr>
							</thead>
							<tbody>
								@if(count($result))
								@foreach($result as $resume)
								<tr>
									<td>
										<a href="{{ URL::route('employers.search.resumeinfo', $resume->id) }}" target="_blank">{{ $resume->tieude_cv }}</a>
										<div class="js-info">
											<i class="fa fa-eye"></i> {{ $resume->views }}
											<i class="fa fa-download"></i> {{ $resume->downloaded }}
											<!--<i class="fa fa-bookmark"></i> 100%-->
										</div>
										@if($resume->file_name)
										<div class="js-download">
											<i class="fa fa-paperclip"></i>
											Hồ sơ này bao gồm 1 CV đính kèm
										</div>
										@endif
										<div class="js-level">
											Cấp bậc: <strong>{{ @$levs[$resume->capbachientai] }}</strong>
										</div>
									</td>
									<td>
										{{ $resume->namkinhnghiem }} năm
									</td>
									<td>
										@if($resume->mucluong == 0)
										Thương lượng
										@else 
										${{ $resume->mucluong }}
										@endif
									</td>
									<td>
										@foreach($resume->location as $v)
										{{ $v->province->province_name }}<br>
										@endforeach
									</td>
									<td>
										{{ $resume->getUpdateAt() }}
									</td>
								</tr>	
								@endforeach
								@else
								<tr>
									<td colspan="5">Không tìm thấy hồ sơ nào với yêu cầu của bạn</td>
								</tr>
								@endif
							</tbody>
						</table>
						<div class="pull-right">&nbsp;
							{{ $result->links() }}
						</div>

						@endif
					</div>